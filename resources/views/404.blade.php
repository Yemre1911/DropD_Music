@include('layouts.header2',['brands' => $brands, 'products'=>$products]);


   <div class="container">
   	  <div class="page-not-found">
	    <h1>404</h1>
	    <a class="b-home" href="{{route('anasayfa')}}">back to Home</a>
      </div>
   </div>
   @extends('layouts.footer');
