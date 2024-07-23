@include('layouts.header2',['brands' => $brands, 'products'=>$products]);
<style>
.brand-img {
    width: 100%;  /* %100 genişlikte olmasını sağlar */
    max-width: 200px;  /* Maksimum genişliği belirler */
    height: auto;  /* Orantılı olarak yüksekliği ayarlar */
    object-fit: cover;  /* Görselin kutuya sığmasını sağlar, keserek */
    display: block;  /* Görselin bir blok eleman olmasını sağlar */
    margin: 0 auto;  /* Ortalar */
}
</style>
<body>

   <div class="men">
   	<div class="container">
      <div class="col-md-9 single_top">
      	 <h1 class="page-heading product-listing">
			Brands
		    <span class="heading-counter">There are {{$brands->total()}} brands</span>
         </h1>


         <div class="product-count">
            Showing {{ $brands->firstItem() }} - {{ $brands->lastItem() }} of {{ $brands->total() }} items
        </div>


         @foreach ($brands as $brand)

            <div class="brand_box">
                <div class="left-side col-xs-12 col-sm-3">
                    <img src="{{ asset('storage/' . $brand->img) }}" alt=""  class="brand-img"/>
                </div>
                <div class="middle-side col-xs-12 col-sm-5">
                    <h4>{{$brand->name}}</h4>
                    <p>{{$brand->info}}</p>
                </div>
                <div class="right-side col-xs-12 col-sm-4">
                    <form action="{{route('filter_guitar')}}" method="GET">
                        <input type="hidden" name="page" value="brand">
                        <input type="hidden" name="brands[]" value="{{ $brand->name }}">
                        <button type="submit" class="btn btn1 btn-primary btn-normal btn-inline ">View Products</button>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>

         @endforeach
         <div class="pagination">
            {{ $brands->links() }}
        </div>

		</div>

        <!-- TRENDS -->
        <style>
            .img-responsive {
                width: 100%;  /* %100 genişlikte olmasını sağlar */
                max-width: 150px;  /* Maksimum genişliği belirler */
                height: auto;  /* Orantılı olarak yüksekliği ayarlar */
                object-fit: cover;  /* Görselin kutuya sığmasını sağlar, keserek */
                display: block;  /* Görselin bir blok eleman olmasını sağlar */
                margin: 0 auto;  /* Ortalar */
            }
            .product {
                list-style-type: none;  /* Madde işaretlerini kaldırır */
                padding: 0;
                margin: 0 0 20px 0;  /* Alt kısma boşluk ekler */
            }
            .product li {
                float: left;  /* Elemanları sola hizalar */
                margin-right: 10px;  /* Sağ tarafa boşluk ekler */
            }
            .product_desc {
                float: left;  /* Metni sola hizalar */
                max-width: calc(100% - 160px);  /* Görselin genişliğini hesaba katar */
            }
            .clearfix {
                clear: both;  /* Float elemanlarının etkisini kaldırır */
            }
        </style>
        <div class="col-md-3 tabs">
            <h3 class="m_1">Trend Products</h3>
              @php
              $trends = $products->sortByDesc('id')->take(8);
              @endphp
              @foreach ($trends as $trend)
            <ul class="product">
              <li class="left-side col-xs-12 col-sm-3"><img src="{{ url('storage/' . $trend->main_image) }}" class="img-responsive" alt=""/></li>
              <li class="product_desc">
                  <h4><a href="{{ route('product.show', $trend->model) }}">{{$trend->model}}</a></h4>
                  <p class="single_price">${{$trend->price}}</p>
              </li>
              <br><br><br>
              <div class="clearfix"> </div>
            </ul>
            @endforeach
          </div>

          <!-- TRENDS -->

     <div class="clearfix"> </div>
	</div>
   </div>
   @extends('layouts.footer');

</body>
</html>
