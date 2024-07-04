

@include('layouts.header',['brands' => $brands, 'products'=>$products]);
   <div class="main">
    <div class="container">
    	<ul class="content-home">
           <li class="col-sm-4">
              <a href="single.html" class="item-link" title="">
                <div class="bannerBox">
                   <img src="images/ELECTRO.png" class="item-img" title="" alt="" width="100%" height="100%">
                   <div class="item-html">
                      <h3>Electro<span>Guitars</span></h3>
                      <p>Legendary Electro Guitar Models</p>
                      <button>Go!</button>
                   </div>
                </div>
              </a>
           </li>
           <li class="col-sm-4">
              <a href="single.html" class="item-link" title="">
                <div class="bannerBox">
                   <img src="images/ACOUSTIC.png" class="item-img" title="" alt="" width="100%" height="100%">
                   <div class="item-html">
                      <h3>Acoustic<span>Guitars</span></h3>
                      <p>Every Kind Of Acoustic Guitars</p>
                      <button>Go!</button>
                   </div>
                </div>
              </a>
           </li>
           <li class="col-sm-4">
              <a href="single.html" class="item-link" title="">
                <div class="bannerBox">
                   <img src="images/AMFI.png" class="item-img" title="" alt="" width="100%" height="100%">
                   <div class="item-html">
                      <h3>Amplifiers<span>The Bests</span></h3>
                      <p>A Class Qualified Amplifiers</p>
                      <button>Go!</button>
                   </div>
                </div>
              </a>
           </li>
           <div class="clearfix"> </div>
       </ul>
    </div>
    <div class="middle_content">
    	<div class="container">
    		<h2>Lets   Rock ' N   Roll</h2>
    		<p>At DropD, we see music not just as sound, but as a lifestyle, a form of expression. Our guitars and amplifiers are the most powerful reflections of this lifestyle. Each of our instruments is crafted with precision and designed to capture the pure essence of music. For us, quality is not just an attribute, but a standard. The notes that resonate from our guitars and the flawless sound delivered by our amplifiers are the most reliable companions on your musical journey. At DropD, we believe in the power of music and take pride in delivering this power to you. Because we are here to help you live and feel music to its fullest.</p>
    	</div>
    </div>

    <!--  MARKALAR KISMI   -->>

   	<div class="content_middle_bottom">
   		<div class="header-left" id="home">
		      <section>
				<ul class="lb-album" >
                    @php
                    $sayac=0;
                    @endphp
                    @foreach ($brands as $brand)
                        @php
                            if ($sayac==8) {
                                break;
                            }
                        @endphp
                            <li>
                                <img src="{{ asset('storage/' . $brand->img) }}" class="img-responsive" alt="image01"/>
                            </li>
                        @php
                            $sayac++
                        @endphp
                    @endforeach

					<div class="clearfix"></div>
				</ul>
			</section>
		</div>
	  </div>

          <!--  MARKALAR KISMI   -->>

   </div>
@extends('layouts.footer');
</body>
</html>
