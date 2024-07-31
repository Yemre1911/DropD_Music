@include('layouts.header2', ['brands' => $brands, 'products' => $products]);
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
    .close {
        background-color: #ff0000; /* Kırmızı arka plan rengi */
        color: white; /* Beyaz yazı rengi */
        border: none;
        padding: 10px 20px; /* Buton boyutunu artırmak için padding */
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px; /* Yazı boyutunu artırma */
    }

    .close:hover {
        background-color: #ff1a1a; /* Hover durumu için daha koyu kırmızı */
    }
</style>
   <div class="account-in">
   	 <div class="container">
		  <div class="check_box">
		<div class="col-md-9 cart-items">
            @php
                $totalPrice=0;
            @endphp
            @auth
        @if ($cart)
            <h1>My Shopping Bag ({{ $cart->items->count() }})</h1>

            @foreach ($cart->items as $item)

            @php
                $totalPrice += $item->product->price * $item->quantity;
            @endphp
                <div class="cart-header">
                    <<div class="close" data-item-id="{{ $item->id }}"> &#10006; </div>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <a class="cbp-vm-image" href="{{ route('product.show', $item->product->model) }}">
                            <img src="{{ asset('storage/' . $item->product->main_image) }}" class="img-responsive" alt=""/>
                        </div>
                        <div class="cart-item-info">
                            <h3><a href="#">{{ $item->product->name }}</a><span>Model No: {{ $item->product->model }}</span></h3>
                            <ul class="qty">
                                <li><p>Qty : {{ $item->quantity }}</p></li>
                            </ul>
                            <div class="delivery">
                                <p>Price : ${{ $item->product->price }}</p>
                                @if ($item->product->stock == 0)
                                <p class="color" style="color: red; font-weight: bold;">Out of Stock</p>
                                @endif
                                <span>Delivered in 2-3 business days</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach

        @else
            <h1>My Shopping Bag (0)</h1>
        @endif
    @endauth

    <script>
        $(document).ready(function() {
            $('.close').on('click', function() {
                var itemId = $(this).data('item-id');
                $.ajax({
                    url: '/cart/remove',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: itemId
                    },
                    success: function(response) {
                        location.reload(); // Sayfayı yenileyerek güncellenmiş sepeti göster
                    }
                });
            });
        });
    </script>

        </head>
        <body>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="continue">Log out</a>

            <script>
                document.querySelector('.continue').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            </script>

			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1">${{$totalPrice}}</span>
				 <span>Discount</span>
				 <span class="total1">---</span>
			 </div>
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>
			   <li class="last_price"><span>${{$totalPrice}}</span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="clearfix"></div>
			 <a class="order" href="{{route('payment_page')}}">Place Order</a>
			 <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
			 </div>
			</div>
			<div class="clearfix"></div>
	     </div>
	  </div>
   </div>
   <div class="map">
	   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
   </div>
   <div class="footer">
   	 <div class="container">
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
</body>
</html>
