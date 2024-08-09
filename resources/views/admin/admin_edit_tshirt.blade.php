<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Head kısmı burada -->
</head>

<body>
  @include('admin.admin_header')
  @include('admin.admin_nav')
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Edit Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
              <form action="{{ route('update_tshirt', isset($tshirt) ? ['id' => $tshirt->id] : []) }}" method="POST" enctype="multipart/form-data" class="tm-edit-product-form" id="productForm">
                @csrf
                @method('PUT') <!-- PUT metodunu kullanarak güncelleme yapıyoruz -->

                <div class="form-group mb-3">
                  <label for="name">Product Name</label>
                  <input id="name" name="name" type="text" class="form-control validate" value="{{ $tshirt->name }}" required>
                </div>
                <div class="form-group mb-3">
                  <label for="brand">Brand</label>
                  <select class="custom-select" id="brand" name="brand" required>
                    <option value="">Select brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->name}}" {{ $brand->name == $tshirt->brand ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="description">Product Description</label>
                  <textarea class="form-control validate" id="description" name="description" rows="3" required>{{ $tshirt->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="base_price">Base Price (USD)</label>
                  <input id="base_price" name="base_price" type="number" class="form-control validate" value="{{ $tshirt->base_price }}" required>
                </div>
                <!-- Variations Section -->
                <div class="form-group mb-3">
                  <label for="variations">Product Variations</label>
                  <table class="table table-bordered variation-table" id="variationsTable">
                    <thead>
                      <tr>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Stock</th>
                        <th>Additional Price</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tshirt->variants as $index => $variation)
                        <tr class="variation-row">
                            <td>
                              <select name="size[]" class="form-control" required>
                                @foreach (['XS', 'S', 'M', 'L', 'XL'] as $size)
                                  <option value="{{ $size }}" {{ $size == $variation->size ? 'selected' : '' }}>{{ $size }}</option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select name="color[]" class="form-control" required>
                                @foreach (['White', 'Black', 'Red', 'Blue', 'Grey'] as $color)
                                  <option value="{{ $color }}" {{ $color == $variation->color ? 'selected' : '' }}>{{ $color }}</option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <input name="stock[]" type="number" class="form-control" value="{{ $variation->stock->quantity ?? '' }}" max="100" min="0" required>
                            </td>
                            <td>
                              <input name="additional_price[]" type="number" class="form-control" value="{{ $variation->additional_price }}" step="0.01" min="0">
                            </td>

                        <!-- görsel form kısmı -->
                            <td>
                                <td>
                                    <input name="photo[]" type="file" class="form-control-file" accept=".png, .jpg, .jpeg">
                                    @if ($variation->image_path)
                                      <img src="{{ asset('storage/' . $variation->image_path) }}" alt="Image" style="width: 100px;">
                                      <input type="hidden" name="existing_photo[{{ $index }}]" value="{{ $variation->image_path }}">
                                    @else
                                      <input type="hidden" name="existing_photo[{{ $index }}]" value="">
                                    @endif
                                  </td>
                        <!-- görsel form kısmı -->

                            <td>
                              <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">Remove</button>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <button type="button" class="btn btn-secondary" onclick="addVariation()">Add Variation</button>
                </div>

                <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Product</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        Copyright &copy; <b>2024</b> All rights reserved.
      </p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    const sizes = ["XS", "S", "M", "L", "XL"];
    const colors = ["White", "Black", "Red", "Blue", "Grey"];

    function addVariation() {
      const tableBody = document.getElementById('variationsTable').getElementsByTagName('tbody')[0];
      const row = document.createElement('tr');
      row.className = 'variation-row';

      row.innerHTML = `
        <td>
          <select name="size[]" class="form-control">
            ${sizes.map(size => `<option value="${size}">${size}</option>`).join('')}
          </select>
        </td>
        <td>
          <select name="color[]" class="form-control">
            ${colors.map(color => `<option value="${color}">${color}</option>`).join('')}
          </select>
        </td>
        <td>
          <input name="stock[]" type="number" class="form-control" max="100" min="0">
        </td>
        <td>
          <input name="additional_price[]" type="number" class="form-control" step="0.01" min="0">
        </td>
        <td>
          <input name="photo[]" type="file" class="form-control-file" accept=".png, .jpg, .jpeg">
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">Remove</button>
        </td>
      `;

      tableBody.appendChild(row);
    }

    function removeVariation(button) {
      const row = button.closest('tr');
      row.remove();
    }
  </script>
</body>

</html>
