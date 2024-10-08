<!DOCTYPE html>
<html>
<head>
    <title>Drop-D Guitar & Amplifier Online Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/component.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/megamenu.css') }}" rel='stylesheet' type='text/css' media="all" />
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .flexslider {
            max-width: 600px; /* Slider'ın maksimum genişliği */
            margin: 0 auto; /* Ortalamak için */
        }
        .flexslider .slides img {
            width: 100%; /* Görselin genişliği slider genişliğine uyar */
            height: auto; /* Orantılı yüksekliği ayarlar */
            max-height: 400px; /* Görselin maksimum yüksekliği */
            object-fit: cover; /* Görselin kutuya sığmasını sağlar, gerekirse keser */
        }
    </style>

    <script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/megamenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easydropdown.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simpleCart.min.js') }}"></script>
    <script src="{{ asset('js/classie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/cbpViewModeSwitch.js') }}" type="text/javascript"></script>
    <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
</head>
<body>

@include('layouts.header2', ['brands' => $brands, 'products' => $products])

<div class="men">
    <div class="container">
        <div class="col-md-9 single_top">
            <div class="single_left">
                <div class="labout span_1_of_a1">
                    <div class="flexslider">
                        <ul class="slides">
                            @if($main_product->main_image)
                                <li data-thumb="{{ asset('storage/' . $main_product->main_image) }}">
                                    <img src="{{ asset('storage/' . $main_product->main_image) }}" />
                                </li>
                            @endif
                            @if($main_product->image1)
                                <li data-thumb="{{ asset('storage/' . $main_product->image1) }}">
                                    <img src="{{ asset('storage/' . $main_product->image1) }}" />
                                </li>
                            @endif
                            @if($main_product->image2)
                                <li data-thumb="{{ asset('storage/' . $main_product->image2) }}">
                                    <img src="{{ asset('storage/' . $main_product->image2) }}" />
                                </li>
                            @endif
                            @if($main_product->image3)
                                <li data-thumb="{{ asset('storage/' . $main_product->image3) }}">
                                    <img src="{{ asset('storage/' . $main_product->image3) }}" />
                                </li>
                            @endif
                            @if($main_product->image4)
                                <li data-thumb="{{ asset('storage/' . $main_product->image4) }}">
                                    <img src="{{ asset('storage/' . $main_product->image4) }}" />
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
		<div class="cont1 span_2_of_a1 simpleCart_shelfItem">
				<h1>{{$main_product->model}}</h1>
				<p class="availability">Availability:
                    @if ($main_product->stock > 0)
                    <span class="color">In stock</span>
                    @else
                    <span class="color" style="color: red; font-weight: bold;">Out of Sotck</span>
                    @endif
                </p>
                @if ($main_product->sale)
                <div class="price_single">
                    <span class="reducedfrom">${{$main_product->price}}</span>
                    <span class="amount item_price actual">${{$main_product->sale}}</span><a href="#">click for offer</a>
                  </div>
                @else
                <div class="price_single">
                    <span class="amount item_price actual">${{$main_product->price}}</span><a href="#">click for offer</a>
                  </div>
                @endif

				<h2 class="quick">Quick Overview:</h2>
				<p class="quick_desc">{{$main_product->features}}</p>

                <h2 class="quick">Product Code:  {{$main_product->product_code}}</h2>
			    <div class="wish-list">
				 	<ul>
				 		<li class="wish"><a href="#">Add to Wishlist</a></li>
				 	    <li class="compare"><a href="#">Add to Compare</a></li>
				 	</ul>
				 </div>

				<div class="quantity_box">
					<ul class="product-qty">
					   <span>Quantity:</span>
					   <select>
						 <option>1</option>
						 <option>2</option>
						 <option>3</option>
						 <option>4</option>
						 <option>5</option>
						 <option>6</option>
					   </select>
				    </ul>
				    <ul class="single_social">
						<li><a href="#"><i class="fb1"> </i> </a></li>
						<li><a href="#"><i class="tw1"> </i> </a></li>
						<li><a href="#"><i class="g1"> </i> </a></li>
						<li><a href="#"><i class="linked"> </i> </a></li>
		   		    </ul>
		   		    <div class="clearfix"></div>
	   		    </div>
                @auth
                <form action="{{route('cart_add')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $main_product->id }}">
                    <button class="button item_add cbp-vm-icon cbp-vm-add" type="submit">Add to cart<button>
                </form>
                @endauth

                @guest
                <a href="{{route('login_page')}}" class="btn btn-primary btn-normal btn-inline btn_form button item_add item_1" target="_self">Add to cart</a>
                @endguest

			</div>
		    <div class="clearfix"> </div>
		</div>

		</div>

		<div class="col-md-3 tabs">
	      <h3 class="m_1">Related Products</h3>
          @php
              $relateds = $products->where('brand', $main_product->brand)->sortByDesc('id')->take(8);
          @endphp
            @foreach ($relateds as $related)

            <ul class="product">
                <li class="product_img"><img src="{{ asset ('storage/'. $related->main_image) }}" class="img-responsive" alt=""/></li>
                <li class="product_desc">
                    <h4><a href="{{ route('product.show', $related->model) }}">{{$related->model}}</a></h4>
                    <p class="single_price">${{$related->price}}</p>
                </li>
                <div class="clearfix"> </div>
            </ul>
            <br><br>
          @endforeach

        </div>
     <div class="clearfix"> </div>
	</div>
   </div>

  <div class="footer">
   	 <div class="container">
         <!-- COMMENT SECTİON -->

         <div class="comments-section">
            <h2>Yorumlar</h2> <br>
            @foreach($main_product->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->first_name }}:</strong> {{ $comment->comment }}</p>
                <small>{{ $comment->created_at->format('d.m.Y H:i') }}</small>
            </div>
            <br><br>
            @endforeach

            @auth
            <form action="{{ url('products/' . $main_product->id . '/comments') }}" method="POST">
                @csrf
                <div class="form-group">
                    <br><br>
                    <label for="comment">Yorum Yap:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Yorum Ekle</button>
            </form>
            @endauth

            @guest
                <br> <br>
                <p>Yorum yapmak için <a href="{{ route('login_page') }}"> Buradan giriş yapmalısınız</a>!</p>
            @endguest
        </div>

        <!-- COMMENT SECTİON -->
   	 	<div class="newsletter">
			<h3>Newsletter</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
			<form>
			  <input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
			  <input type="submit" value="SUBSCRIBE">
			</form>
		</div>
   		<div class="cssmenu">
		   <ul>
			<li class="active"><a href="#">Privacy</a></li>
			<li><a href="#">Terms</a></li>
			<li><a href="#">Shop</a></li>
			<li><a href="#">About</a></li>
			<li><a href="contact.html">Contact</a></li>
		  </ul>
		</div>
		<ul class="social">
			<li><a href=""> <i class="instagram"> </i> </a></li>
			<li><a href=""><i class="fb"> </i> </a></li>
			<li><a href=""><i class="tw"> </i> </a></li>
	    </ul>
	    <div class="clearfix"></div>
	    <div class="copy">
           <p> &copy; 2015 Watches. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
	    </div>
   	</div>
   </div>
<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
      });
    });
    </script>

    </body>
    </html>
