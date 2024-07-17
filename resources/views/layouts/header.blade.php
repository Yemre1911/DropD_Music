<style>
    .menu {
        margin-top: -20px; /* İstediğiniz kadar yukarı kaydırabilirsiniz */
    }
    </style>

<style>
    .logo {
        margin-top: -20px; /* İstediğiniz kadar yukarı kaydırabilirsiniz */
        margin-left:-100px;
    }
    </style>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
        /* Menü bağlantılarını siyah yapmak için */
        .banner a {
            color: rgba(218, 0, 0, 0.767) !important; /* Rengi siyah yapar */
            font-weight: bold !important;
           /* background-color: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 5px;
            margin: 5px;*/
        }
    </style>


<div class="banner">
    <div class="container">
        <div class="header_top">
           <div class="header_top_left">
           <div class="box_11"><a href="checkout.html">
         <h4><p>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
         </a></div>
         <p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
         <div class="clearfix"> </div>
      </div>
      <div class="header_top_right">
        <ul class="header_user_info">
         <a class="login" href="login.html">
           <i class="user"> </i>
           <li class="user_desc">My Account</li>
         </a>
         <div class="clearfix"> </div>
        </ul>
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

 <div class="header_bottom">




  <div class="logo">
     <h1><a href="{{route('anasayfa')}}"><span class="m_1">D</span>rop-D</a></h1>
  </div>

  <style>
    /* Menü bağlantılarını siyah yapmak için */
    .megamenu a {
        color: rgb(0, 0, 0) !important; /* Rengi siyah yapar */
        font-weight: bold !important;
        background-color: rgba(255, 255, 255, 0.7); /* Beyaz arka plan ve %70 opaklık */
        padding: 10px;
        border-radius: 5px;
        margin: 5px;
    }

    /* Menü öğelerinin üzerine gelindiğinde (hover) rengini değiştirmek isterseniz */
    .megamenu a:hover {
        color: red !important; /* İstediğiniz renk */
    }


    </style>

     <div class="menu">
    <ul class="megamenu skyblue">
       <li><a class="color2" href="{{route('guitars_page')}}">Guitars</a>
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
                                    <li><a href="men.html">{{$product->model}}</a></li>
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
                                <li><a href="men.html">{{$product->model}}</a></li>
                           @endforeach
                           </ul>
                       </div>
                   </div>
                   <div class="col2">
                       <div class="h_nav">
                           <h4>Trends</h4>
                           <ul>
                               <li class>
                                   <div class="p_left">
                                     <img src="images/p1.jpg" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="#">Denim shirt</a></h4>
                                       <span class="item-cat"><small><a href="#">watches</a></small></span>
                                       <span class="price">29.99 $</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                               <li>
                                   <div class="p_left">
                                     <img src="images/p2.jpg" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="#">Denim shirt</a></h4>
                                       <span class="item-cat"><small><a href="#">watches</a></small></span>
                                       <span class="price">29.99 $</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                               <li>
                                   <div class="p_left">
                                     <img src="images/p3.jpg" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="#">Denim shirt</a></h4>
                                       <span class="item-cat"><small><a href="#">watches</a></small></span>
                                       <span class="price">29.99 $</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                           </ul>
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
                                <li><a href="men.html">{{$product->model}}</a></li>
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
                                <li><a href="men.html">{{$product->model}}</a></li>
                           @endforeach
                           </ul>
                       </div>
                   </div>
                   <div class="col2">
                       <div class="h_nav">
                           <h4>Trends</h4>
                           <ul>
                               <li class>
                                   <div class="p_left">
                                     <img src="images/p1.jpg" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="#">Denim shirt</a></h4>
                                       <span class="item-cat"><small><a href="#">watches</a></small></span>
                                       <span class="price">29.99 $</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                               <li>
                                   <div class="p_left">
                                     <img src="images/p2.jpg" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="#">Denim shirt</a></h4>
                                       <span class="item-cat"><small><a href="#">watches</a></small></span>
                                       <span class="price">29.99 $</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                               <li>
                                   <div class="p_left">
                                     <img src="images/p3.jpg" class="img-responsive" alt=""/>
                                   </div>
                                   <div class="p_right">
                                       <h4><a href="#">Denim shirt</a></h4>
                                       <span class="item-cat"><small><a href="#">watches</a></small></span>
                                       <span class="price">29.99 $</span>
                                   </div>
                                   <div class="clearfix"> </div>
                               </li>
                           </ul>
                       </div>
                   </div>
                 </div>
               </div>
           </li>
           <li><a class="color10" href="{{route('brands_page')}}">Brands</a></li>
           <li class="active grid"><a class="color3" href="{{route('sale_page')}}">Sale</a></li>
           <li><a class="color7" href="404.html">News</a></li>
           <div class="clearfix"> </div>
       </ul>
       </div>
       <div class="clearfix"> </div>
       </div>
   </div>
</div>









