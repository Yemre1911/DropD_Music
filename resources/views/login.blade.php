@include('layouts.header2', ['brands' => $brands, 'products' => $products]);

   <div class="account-in">
   	 <div class="container">
   	   <h3>LOGIN AND START ROLLING</h3>
		<div class="col-md-7 account-top">
		  <form action="{{route('login')}}" method="POST">
			<div>
                @csrf
				<span>Email*</span>
				<input type="email" name="email" id="email" required>
			</div>
			<div>
				<span class="pass">Password*</span>
				<input type="password" name="password" id="password" required>
			</div>
				<input type="submit" value="Login">
		   </form>
           <br> You Haven't Sign Up Yet?  <br><br>
           <a href="{{route('register_page')}}"><input type="submit" value="Sign Up"></a>
		</div>
		<div class="col-md-5 left-account ">
            @php
                $productCount=count($products);
                $rnd=rand(0,$productCount-1);
            @endphp
			<a href="{{route('product.show', $products[$rnd]->model)}}"><img class="img-responsive " src="{{ asset('storage/' . $products[$rnd]->main_image) }}" /></a>
			<div class="five-in">
			<h1>GO! </h1><span>check out!</span>
			</div>
			<a href="{{route('product.show', $products[$rnd]->model)}}" class="create">Check Out This Product!</a>
			<div class="clearfix"> </div>
		</div>
	    <div class="clearfix"> </div>
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
