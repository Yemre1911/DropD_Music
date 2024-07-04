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
                    <h4><a href="#">{{$brand->name}}</a></h4>
                    <p>{{$brand->info}}</p>
                </div>
                <div class="right-side col-xs-12 col-sm-4">
                <a href="#" class="btn btn1 btn-primary btn-normal btn-inline " target="_self">View Products</a>
                </div>
                <div class="clearfix"> </div>
            </div>

         @endforeach
         <div class="pagination">
            {{ $brands->links() }}
        </div>

		</div>
		<div class="col-md-3 tabs">
	      <h3 class="m_1">Related Products</h3>
	      <ul class="product">
	      	<li class="product_img"><img src="images/m5.jpg" class="img-responsive" alt=""/></li>
	      	<li class="product_desc">
	      		<h4><a href="#">quod mazim</a></h4>
	      		<p class="single_price">$66.30</p>
	      		<a href="#" class="link-cart">Add to Wishlist</a>
	      	    <a href="#" class="link-cart">Add to Cart</a>
	        </li>
	      	<div class="clearfix"> </div>
	      </ul>
	      <ul class="product">
	      	<li class="product_img"><img src="images/m6.jpg" class="img-responsive" alt=""/></li>
	      	<li class="product_desc">
	      		<h4><a href="#">quod mazim</a></h4>
	      		<p class="single_price">$66.30</p>
	      		<a href="#" class="link-cart">Add to Wishlist</a>
	      	    <a href="#" class="link-cart">Add to Cart</a>
	        </li>
	      	<div class="clearfix"> </div>
	      </ul>
	      <ul class="product">
	      	<li class="product_img"><img src="images/m2.jpg" class="img-responsive" alt=""/></li>
	      	<li class="product_desc">
	      		<h4><a href="#">quod mazim</a></h4>
	      		<p class="single_price">$66.30</p>
	      		<a href="#" class="link-cart">Add to Wishlist</a>
	      	    <a href="#" class="link-cart">Add to Cart</a>
	        </li>
	      	<div class="clearfix"> </div>
	      </ul>
	      <ul class="product">
	      	<li class="product_img"><img src="images/m3.jpg" class="img-responsive" alt=""/></li>
	      	<li class="product_desc">
	      		<h4><a href="#">quod mazim</a></h4>
	      		<p class="single_price">$66.30</p>
	      		<a href="#" class="link-cart">Add to Wishlist</a>
	      	    <a href="#" class="link-cart">Add to Cart</a>
	        </li>
	      	<div class="clearfix"> </div>
	      </ul>
        </div>
     <div class="clearfix"> </div>
	</div>
   </div>
   @extends('layouts.footer');

</body>
</html>
