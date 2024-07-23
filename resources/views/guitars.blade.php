<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@include('layouts.header2',['brands' => $brands, 'products'=>$products]);

<!DOCTYPE HTML>
<html>
<head>
<title>Watches an E-Commerce online Shopping Category Flat Bootstrap Responsive Website Template| Men :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/simpleCart.min.js"> </script>
</head>

<style>
    .product-img {
        width: 100%; /* Kapsayıcı genişliğine uyar */
        max-width: 200px; /* Maksimum genişlik */
        height: auto; /* Orantılı yüksekliği ayarlar */
        object-fit: cover; /* Görselin kutuya sığmasını sağlar, gerekirse keser */
    }

    .product-img-fixed {
        width: 200px; /* Sabit genişlik */
        height: 300px; /* Sabit yükseklik */
        object-fit: cover; /* Görselin kutuya sığmasını sağlar, gerekirse keser */
    }
</style>

<body>

   <div class="men">
    <div class="container">
        <div class="col-md-4 sidebar_men">

                        <!-- FİLTRELEME FORMU BAŞLANGIÇ -->

            <h3>Filter</h3>
            <form action="{{route('filter_guitar')}}" method="GET">
                <h3>Brands</h3>
                <ul class="product-categories color">
                    @foreach ($brands as $brand)
                    <li class="cat-item cat-item-42">
                        <label>
                            <input type="checkbox" name="brands[]" value="{{ $brand->name }}">
                            {{ $brand->name }}
                        </label>
                    </li>
                @endforeach
                </ul>

                <h3>Types</h3>
                <ul class="product-categories color">
                    <li class="cat-item cat-item-42">
                        <label>
                            <input type="radio" name="type" value="Electric Guitar">
                            Electric
                        </label>
                    </li>
                    <li class="cat-item cat-item-42">
                        <label>
                            <input type="radio" name="type" value="Acoustic Guitar">
                            Acoustic
                        </label>
                    </li>
                </ul>

                <h3>Symmetry</h3>
                <ul class="product-categories color">
                    <li class="cat-item cat-item-42">
                        <label>
                            <input type="radio" name="symmetry" value="Right-Handed">
                            Right Handed
                        </label>
                    </li>
                    <li class="cat-item cat-item-42">
                        <label>
                            <input type="radio" name="symmetry" value="Left-Handed">
                            Left Handed
                        </label>
                    </li>
                </ul>

                <h3>Colors</h3>
                <ul class="product-categories color">
                    @foreach (['Green', 'Blue', 'Red', 'Gray','Black','White','Brown','Yellow','Orange'] as $color)
                        <li class="cat-item cat-item-42">
                            <label>
                                <input type="radio" name="colors[]" value="{{ $color }}">
                                {{ $color }}
                            </label>
                        </li>
                    @endforeach
                </ul>


                <h3>Price</h3>
                <ul class="product-categories">
                    @foreach (['0-500', '500-1000', '1000-5000', '5000-15000', '15000-50000'] as $price)
                        <li class="cat-item cat-item-42">
                            <label>
                                <input type="radio" name="price" value="{{ $price }}">
                                {{ $price }}$
                            </label>
                        </li>
                    @endforeach
                </ul>

                <input type="hidden" name="page" value="guitar">

                <button type="submit" class="btn btn-primary">Filter & Search</button>
            </form>

            <!-- FİLTRELEME FORMU BİTİŞ -->

        </div>
    	<div class="col-md-8 mens_right">
    		<div class="dreamcrub">
			   	<ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        Men / Women&nbsp;
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
		            <label>Sort By</label>
		            <select>
		                            <option value="">
		                    Position                </option>
		                            <option value="">
		                    Name                </option>
		                            <option value="">
		                    Price                </option>
		            </select>
		            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
                   </div>
    		     </div>
    	        <ul class="women_pagenation dc_paginationA dc_paginationA06">
			     <li><a href="#" class="previous">Page : </a></li>
			     <li class="active"><a href="#">1</a></li>
			     <li><a href="#">2</a></li>
		  	    </ul>
                <div class="clearfix"></div>
		        </div>
    		<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="pages">
        	 <div class="limiter visible-desktop">
               <label>Show</label>
                  <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> per page
               </div>
       	   </div>
					<div class="clearfix"></div>
					<ul>

                        <!-- ÜRÜN -->

                @foreach ($products as $product)


                <li class="simpleCart_shelfItem">
                    <a class="cbp-vm-image" href="{{ route('product.show', $product->model) }}">
                        <div class="view view-first">
                            <div class="inner_content clearfix">
                                <div class="product_image">
                                    <div class="mask1"><img src="{{ asset('storage/' . $product->main_image) }}" alt="image" class="product-img-fixed"></div>
                                    <div class="mask">
                                        <div class="info">Quick View</div>
                                    </div>
                                    <div class="product_container">
                                        <h4>{{ $product->model }}</h4>
                                        <p>{{ $product->brand }}</p>
                                        @if ($product->sale)
                                            <div class="price mount item_price" style="text-decoration: line-through;">${{ $product->price }}</div>
                                            <div class="sale-price" style="color: red; font-weight: bold;">SALE: ${{ $product->sale }}</div>
                                        @else
                                            <div class="price mount item_price">${{ $product->price }}</div>
                                        @endif

                                        <!-- ADD TO CART FORM İŞLEMLERİ -->
                                            @auth
                                            <form action="{{route('cart_add')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button class="button item_add cbp-vm-icon cbp-vm-add" type="submit">Add to cart<button>
                                            </form>
                                            @endauth
                                            @guest

                                            <form action="{{route('login_page')}}" method="get">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button class="button item_add cbp-vm-icon cbp-vm-add" type="submit">Add to cart<button>
                                            </form>
                                            @endguest

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>

                        <!-- ÜRÜN -->
                        @endforeach

					</ul>
				</div>
                <div class="pagination">
                    {{ $products->links() }}
                </div>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>


    	</div>
    </div>
   </div>
   @extends('layouts.footer');
</body>
</html>
