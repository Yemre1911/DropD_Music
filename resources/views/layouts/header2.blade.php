<style>
    .menu {
        margin-top: -20px;
    }
    </style>

<style>
    .logo {
        margin-top: -20px;
        margin-left:-100px;
    }
    </style>





<!DOCTYPE HTML>
<html>
<head>
    <title>Drop-D Guitar & Amplifier Online Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
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
<body>
    <style>
        .men_banner a {
            color: rgba(218, 0, 0, 0.767) !important;
            font-weight: bold !important;

        }
    </style>

<div class="men_banner">
    <div class="container">
        <div class="header_top">
            @auth
           <div class="header_top_left">
           <div class="box_11"><a href="{{route('cart_page')}}">
            <h4>
                <p>Cart:
                    @if(Auth::user() && Auth::user()->cart)
                        {{ Auth::user()->cart->items->count() }} items
                    @else
                        0 items
                    @endif
                </p>
                <img src="images/bag.png" alt=""/>
                <div class="clearfix"> </div>
            </h4>          </a></div>
         <div class="clearfix"> </div>
      </div>
      @endauth



      <div class="header_top_right">
          <div class="lang_list">
           <select tabindex="4" class="dropdown">
               <option value="" class="label" value="">$ Us</option>
               <option value="1">Dollar</option>
               <option value="2">Euro</option>
           </select>
        </div>
        @guest
        <ul class="header_user_info">
         <a class="login" href="{{route('login_page')}}">
           <i class="user"> </i>
           <li class="user_desc">My Account</li>
         </a>
         <div class="clearfix"> </div>
        </ul>
        @endguest

        @auth
        <ul class="header_user_info">
            <a class="login" href="{{route('cart_page')}}">
              <i class="user"> </i>
              <li class="user_desc">Welcome {{Auth::user()->first_name}}</li>
            </a>
            <div class="clearfix"> </div>
           </ul>
        @endauth
       <!-- start search-->
           <div class="search-box">
              <div id="sb-search" class="sb-search">
                 <form>
                    <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                    <input class="sb-search-submit" type="submit" value="">
                    <span class="sb-icon-search"> </span>
                 </form>
               </div>
            </div>
            <!----search-scripts---->
            <script src="js/classie1.js"></script>
            <script src="js/uisearch.js"></script>
              <script>
                new UISearch( document.getElementById( 'sb-search' ) );
              </script>
               <!----//search-scripts---->
               <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
   </div>
   <style>
    .megamenu a {
        color: rgb(0, 0, 0) !important;
        font-weight: bold !important;
        background-color: rgba(255, 255, 255, 0.7);
        padding: 10px;
        border-radius: 5px;
        margin: 5px;
    }


    .megamenu a:hover {
        color: red !important;
    }


    </style>

    <div class="header_bottom">
          <div class="logo">
                <h1><a href="{{ route('anasayfa') }}"><span class="m_1">D</span>rop-D</a></h1>
            </div>
  <div class="menu">
    <ul class="megamenu skyblue">
       <li class="active grid"><a class="color2" href="{{route('guitars_page')}}">Guitars</a>
           <div class="megapanel">
               <div class="row">
                   <div class="col1">
                       <div class="h_nav">
                        <h4>Electric</h4>
                        <ul>
                            @php
                            $electricGuitars = $products->where('type', 'Electric Guitar')->sortByDesc('id')->take(5);
                            @endphp
                            @foreach ($electricGuitars as $product)
                                <li><a href="{{ route('product.show', $product->model) }}">{{$product->model}}</a></li>
                           @endforeach

                       </ul>
                       </div>
                   </div>
                   <div class="col1">
                       <div class="h_nav">
                        <h4>Acoustic</h4>
                        <ul>     <!-- KATEGORİLER  -->
                            @php
                            $acousticGuitars = $products->where('type', 'Acoustic Guitar')->sortByDesc('id')->take(5);
                            @endphp
                            @foreach ($acousticGuitars as $product)
                                <li><a href="{{ route('product.show', $product->model) }}">{{$product->model}}</a></li>
                           @endforeach
                           </ul>
                       </div>
                   </div>
                   <div class="col2">
                       <div class="h_nav">
                           <h4>Trends</h4>
                           @php
                            $trends = $products->where('type', 'Electric Guitar')->sortByDesc('id')->take(3);
                            @endphp
                            @foreach ($trends as $trend)
                           <ul>
                               <li class>
                                   <div class="p_left">
                                     <img src="{{ url('storage/' . $trend->main_image) }}" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="{{ route('product.show', $trend->model) }}">{{$trend->model}}t</a></h4>
                                       <span class="price">${{$trend->price}}</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                           </ul>
                           @endforeach
                       </div>
                   </div>
                 </div>
               </div>
       </li>
       <li><a class="color4" href="{{route('amps_page')}}">Amps</a>
        <div class="megapanel">
            <div class="row">
                <div class="col1">
                    <div class="h_nav">
                        <h4>Tube</h4>
                        <ul>     <!-- KATEGORİLER  -->
                         @php
                         $amps1 = $products->where('type', 'Amplifier')->sortByDesc('id')->take(5);
                         @endphp
                         @foreach ($amps1 as $product)
                             <li><a href="{{ route('product.show', $product->model) }}">{{$product->model}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col1">
                    <div class="h_nav">
                        <h4>Solid-State</h4>
                        <ul>     <!-- KATEGORİLER  -->
                         @php
                         $amps2 = $products->where('type', 'Amplifier')->sortByDesc('id')->take(5);
                         @endphp
                         @foreach ($amps2 as $product)
                             <li><a href="{{ route('product.show', $product->model) }}">{{$product->model}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col2">
                    <div class="h_nav">
                        <h4>Trends</h4>
                        @php
                            $trends = $products->where('type', 'Amplifier')->sortByDesc('id')->take(3);
                            @endphp
                            @foreach ($trends as $trend)
                           <ul>
                               <li class>
                                   <div class="p_left">
                                     <img src="{{ url('storage/' . $trend->main_image) }}" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="{{ route('product.show', $trend->model) }}">{{$trend->model}}t</a></h4>
                                       <span class="price">${{$trend->price}}</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                           </ul>
                           @endforeach
                    </div>
                </div>
              </div>
            </div>
        </li>
           <li><a class="color10" href="{{route('brands_page')}}">Brands</a></li>
           <li><a class="color3" href="{{route('sale_page')}}">Sale</a></li>
           <li><a class="color7" href="404.html">News</a></li>
           <div class="clearfix"> </div>
       </ul>
       </div>
       <div class="clearfix"> </div>
   </div>
 </div>
</div>
