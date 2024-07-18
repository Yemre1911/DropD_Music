@include('layouts.header2', ['brands' => $brands, 'products' => $products]);


<style>
    .account-in {
        background-color: #6f6f6f58; /* Daha açık gri bir renk için #f0f0f0 veya istediğiniz gri tonunu kullanabilirsiniz */
        padding: 20px; /* İsteğe bağlı: İçeriğin kenarlardan biraz uzak durmasını sağlar */
    }
</style>

<div class="account-in">
   	  <div class="container">
   	     <form action="{{route('register')}}" method="POST">
            @csrf

		   <div class="register-top-grid">
			<h2>PERSONAL INFORMATION</h2>
			 <div>
				<span>First Name<label>*</label></span>
				<input type="text" name="first_name" id="first_name" required>
			 </div>
			 <div>
				<span>Last Name<label>*</label></span>
				<input type="text" name="last_name" id="last_name" required>
			 </div>
			 <div>
				 <span>Email Address<label>*</label></span>
				 <input type="email" name="email" id="email" required>
			 </div>
             <div>
                <span>Phone<label>*</label></span>
                <input type="text" name="phone" id="phone" required>
            </div>
             <div>
                <span>Country<label>*</label></span>
                <input type="text" name="country" id="country" required>
            </div>
            <div>
                <span>City<label>*</label></span>
                <input type="text" name="city" id="city" required>
            </div>
            <div>
                <span>Address<label>*</label></span>
                <input type="text" name="address" id="address" required>
            </div>

			 <div class="clearfix"> </div>

			 </div>
		     <div class="register-bottom-grid">
				    <h2>LOGIN INFORMATION</h2>
					 <div>
						<span>Password<label>*</label></span>
						<input type="password" name="password" id="password" required>
					 </div>
					 <div>
						<span>Confirm Password<label>*</label></span>
						<input type="password" name="password_confirmation" id="password_comfirmation" required>
					 </div>
					 <div class="clearfix"> </div>
			 </div>
             <div class="register-but">
                <input type="submit" value="submit">
            </div>

			   <div class="clearfix"> </div>
		  </form>

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
