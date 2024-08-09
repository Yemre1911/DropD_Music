<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tshirt;
use App\Models\TshirtVariant;
use App\Models\Stock;
use Illuminate\Support\Facades\Log;


class TshirtController extends Controller
{
    public function store(Request $request)
    {
        Log::info('store fonksiyonuna girildi');

        try {
            Log::info('Validasyon başlıyor');

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'description' => 'required|string',
                'base_price' => 'required|numeric',
                'size' => 'required|array',
                'color' => 'required|array',
                'stock' => 'required|array',
                'additional_price' => 'sometimes|array',
                'photo.*' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            ]);

            Log::info('Validasyon tamamlandı ');
            Log::info($validatedData);

            // Tshirt verisini kaydet
            $tshirt = Tshirt::create([
                'name' => $validatedData['name'],
                'brand' => $validatedData['brand'],
                'description' => $validatedData['description'],
                'base_price' => $validatedData['base_price'],
            ]);
            Log::info($tshirt);
            if ($tshirt) {
                Log::info('Tişört oluşturuldu', ['tshirt_id' => $tshirt->id]);
            } else {
                Log::error('Tişört oluşturulamadı');
                return back()->withErrors('Tişört oluşturulamadı. Lütfen tekrar deneyin.');
            }

            // Varyantları ve stokları kaydet
            foreach ($validatedData['size'] as $index => $size) {
                Log::info('Varyant kaydı başlıyor', ['index' => $index]);

                // Fotoğraf yükleme işlemi
                $imagePath = null;
                if ($request->hasFile('photo')) {
                    $imagePath = $validatedData['photo'][$index]->store('images', 'public');
                    Log::info('Fotoğraf yüklendi', ['path' => $imagePath]);
                }

                $variant = TshirtVariant::create([
                    'tshirt_id' => $tshirt->id,
                    'size' => $size,
                    'color' => $validatedData['color'][$index],
                    'additional_price' => $validatedData['additional_price'][$index],
                    'image_path' => $imagePath,
                ]);

                if ($variant) {
                    Log::info('Varyant oluşturuldu', ['variant_id' => $variant->id]);
                } else {
                    Log::error('Varyant oluşturulamadı', ['index' => $index]);
                    continue;
                }

                // Stok kaydı
                $stock = Stock::create([
                    'variant_id' => $variant->id,
                    'quantity' => $validatedData['stock'][$index],
                ]);

                if ($stock) {
                    Log::info('Stok kaydedildi', ['variant_id' => $variant->id, 'quantity' => $validatedData['stock'][$index]]);
                } else {
                    Log::error('Stok kaydedilemedi', ['variant_id' => $variant->id, 'quantity' => $validatedData['stock'][$index]]);
                }
            }

            return redirect()->route('admin_index')->with('success', 'T-shirt başarıyla eklendi');
        } catch (\Exception $e) {
            Log::error('Hata oluştu: ' . $e->getMessage());
            return back()->withErrors('Bir hata oluştu. Lütfen tekrar deneyin.');
        }
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        Log::info('update fonksiyonuna girildi');
        try {
            Log::info('Validasyon başlıyor');

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'description' => 'required|string',
                'base_price' => 'required|numeric',
                'size' => 'required|array',
                'color' => 'required|array',
                'stock' => 'required|array',
                'additional_price' => 'sometimes|array',
                'photo.*' => 'required|file|mimes:jpeg,png,jpg|max:2048',
                'existing_photo.*' => 'sometimes|string',
            ]);

            Log::info('Validasyon tamamlandı');
            Log::info($validatedData);

            $tshirt = Tshirt::findOrFail($id);
            $tshirt->update([
                'name' => $validatedData['name'],
                'brand' => $validatedData['brand'],
                'description' => $validatedData['description'],
                'base_price' => $validatedData['base_price'],
            ]);
            Log::info($tshirt);

            $existingVariants = TshirtVariant::where('tshirt_id', $tshirt->id)->pluck('id')->toArray();
            $updatedVariantIds = [];

            foreach ($validatedData['size'] as $index => $size) {
                if (!isset($request->variant_id[$index])) {
                    $imagePath = null;
                    if ($request->hasFile('photo.' . $index)) {
                        $imagePath = $request->file('photo.' . $index)->store('images', 'public');
                        Log::info('Fotoğraf yüklendi', ['path' => $imagePath]);
                    }

                    $variant = TshirtVariant::create([
                        'tshirt_id' => $tshirt->id,
                        'size' => $size,
                        'color' => $validatedData['color'][$index],
                        'additional_price' => $validatedData['additional_price'][$index] ?? null,
                        'image_path' => $imagePath,
                    ]);

                    $stock = Stock::create([
                        'variant_id' => $variant->id,
                        'quantity' => $validatedData['stock'][$index],
                    ]);

                    Log::info('Yeni varyant ve stok oluşturuldu', ['variant_id' => $variant->id]);
                } else {
                    $variant = TshirtVariant::find($request->variant_id[$index]);

                    if ($variant) {
                        Log::info('Varyant güncellemesi başlıyor', ['index' => $index]);

                        $imagePath = $request->input('existing_photo.' . $index);
                        if ($request->hasFile('photo.' . $index)) {
                            $imagePath = $request->file('photo.' . $index)->store('images', 'public');
                            Log::info('Yeni fotoğraf yüklendi', ['path' => $imagePath]);
                        }

                        $variant->update([
                            'size' => $size,
                            'color' => $validatedData['color'][$index],
                            'additional_price' => $validatedData['additional_price'][$index] ?? $variant->additional_price,
                            'image_path' => $imagePath,
                        ]);

                        $stock = Stock::where('variant_id', $variant->id)->first();
                        if ($stock) {
                            $stock->update([
                                'quantity' => $validatedData['stock'][$index],
                            ]);
                            Log::info('Stok güncellendi', ['variant_id' => $variant->id, 'quantity' => $validatedData['stock'][$index]]);
                        } else {
                            Log::error('Stok bulunamadı', ['variant_id' => $variant->id]);
                        }

                        $updatedVariantIds[] = $variant->id;
                    } else {
                        Log::error('Varyant bulunamadı', ['index' => $index]);
                    }
                }
            }

            $variantsToDelete = array_diff($existingVariants, $updatedVariantIds);
            if ($variantsToDelete) {
                TshirtVariant::whereIn('id', $variantsToDelete)->delete();
                Log::info('Silinen varyantlar', ['variant_ids' => $variantsToDelete]);
            }

            return redirect()->route('admin_index')->with('success', 'T-shirt başarıyla güncellendi');
        } catch (\Exception $e) {
            Log::error('Hata oluştu: ' . $e->getMessage());
            return back()->withErrors('Bir hata oluştu. Lütfen tekrar deneyin.');
        }
    }
}
