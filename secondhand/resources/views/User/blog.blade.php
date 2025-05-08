@extends('layouts.master')
@section('head')
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="login.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  @section('container')
    
   <!--banner-->
   <div class="content">
    <div class="d-flex tip">
        <div class="flex-fill img">
            <img src="{{asset('assets')}}/images/blog.png" style="width: 50vw;">
        </div>
        <div class="flex-fill ct_tip">
            <h2>RECYCLE TIPS</h2>
            <span><img src="{{asset('assets')}}/images/plain.png" style="width: 10vw;">Love recycling - Love the Earth<img src="{{asset('assets')}}/images/plain2.png" style="width: 10vw;"></span>
        </div>
    </div>
 
           <!--Great recycling tips-->
    <section class="section__container trending__container" id="trending">
      <div class="section__header">
        <h2 class="section__title">Great recycling tips</h2>
       
      </div>
      <div class="trending__grid">
        <div class="trending__card">
          <a href="https://www.unsustainablemagazine.com/how-to-recycle-old-clothes/">
          <img src="{{asset('assets')}}/images/blog1_tip.jpg" alt="trending" /></a>
         <a href="https://www.unsustainablemagazine.com/how-to-recycle-old-clothes/"><h3>How to Recycle Old Clothes</h3></a> 
        </div>

        <div class="trending__card">
          <a href="https://www.dcceew.gov.au/environment/protection/waste/consumers">
          <img src="{{asset('assets')}}/images/blog_tip2.jpg" alt="trending" /></a>
         <a href="https://www.dcceew.gov.au/environment/protection/waste/consumers"><h3>Tips for recycling at home</h3></a> 
        </div>
        <div class="trending__card">
          <a href="https://www.greencars.com/expert-insights/pro-tips-for-home-recycling">
          <img src="{{asset('assets')}}/images/blog_tip3.jpg" alt="trending" /></a>
         <a href="https://www.greencars.com/expert-insights/pro-tips-for-home-recycling"><h3>Pro Tips for Home Recycling</h3></a> 
        </div>
        <div class="trending__card">
          <a href="https://www.home-storage-solutions-101.com/uses-for-old-socks.html">
          <img src="{{asset('assets')}}/images/blog_tip4.jpg" alt="trending" /></a>
         <a href="https://www.home-storage-solutions-101.com/uses-for-old-socks.html"><h3>15 Uses For Old Socks</h3></a> 
        </div>
        <div class="trending__card">
          <a href="https://www.unsustainablemagazine.com/how-to-recycle-old-clothes/">
          <img src="https://i.pinimg.com/564x/be/42/9a/be429a5f3b3955f1c15d228024e06d6e.jpg" alt="trending" /></a>
         <a href="https://www.unsustainablemagazine.com/how-to-recycle-old-clothes/"><h3>How to Recycle Old Clothes</h3></a> 
        </div>
      </div>
    </section>

    <section class="section__container destination__container" id="destination">
      <div class="section__header">
        <h2 class="section__title">Unique recycled products
        </h2>
       
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="column">
            <img src="{{asset('assets')}}/images/blog_Topê.jpg" />
            <img src="{{asset('assets')}}/images/blog_topâ.jpg" />
            <img src="{{asset('assets')}}/images/blog_top4.jpg" />
            <img src="{{asset('assets')}}/images/blog_Top1.jpg" />
            <img src="{{asset('assets')}}/images/blog_top11.jpg" />
          </div>
          <div class="column">
            <img src="{{asset('assets')}}/images/blog_top9.jpg">
            <img src="{{asset('assets')}}/images/blog_Top8.jpg">
            <img src="{{asset('assets')}}/images/blog_top6.jpg">
            <img src="{{asset('assets')}}/images/bl_top10.jpg">
          </div>
          <div class="column">
            <img src="{{asset('assets')}}/images/bl_top14.jpg" />
            <img src="{{asset('assets')}}/images/bl_top15.jpg" />
            <img src="{{asset('assets')}}/images/bl_top19.jpg">
            <img src="{{asset('assets')}}/images/blog_Topê.jpg" />
          </div>
          <div class="column">
            <img src="{{asset('assets')}}/images/bl_top14.jpg" />
            <img src="{{asset('assets')}}/images/bl_top15.jpg" />
            <img src="{{asset('assets')}}/images/bl_top19.jpg">
            <img src="{{asset('assets')}}/images/blog_Topê.jpg" />
          </div>
        </div>
      </div>
      <div class="extra">
        <div class="container-fluid">
          <div class="row">
            <div class="column">
              <img src="{{asset('assets')}}/images/blog_Topê.jpg" />
              <img src="{{asset('assets')}}/images/blog_topâ.jpg" />
              <img src="{{asset('assets')}}/images/blog_top4.jpg" />
              <img src="{{asset('assets')}}/images/blog_Top1.jpg" />
              <img src="{{asset('assets')}}/images/blog_top11.jpg" />
            </div>
            <div class="column">
              <img src="{{asset('assets')}}/images/blog_Topê.jpg" />
              <img src="{{asset('assets')}}/images/blog_topâ.jpg" />
              <img src="{{asset('assets')}}/images/blog_top4.jpg" />
              <img src="{{asset('assets')}}/images/blog_Top1.jpg" />
              <img src="{{asset('assets')}}/images/blog_top11.jpg" />
            </div>
            <div class="column">
              <img src="{{asset('assets')}}/images/blog_top9.jpg">
              <img src="{{asset('assets')}}/images/blog_Top8.jpg">
              <img src="{{asset('assets')}}/images/blog_top6.jpg">
              <img src="{{asset('assets')}}/images/bl_top10.jpg">
            </div>
            <div class="column">
              <img src="{{asset('assets')}}/images/bl_top14.jpg" />
              <img src="{{asset('assets')}}/images/bl_top15.jpg" />
              <img src="{{asset('assets')}}/images/bl_top19.jpg">
              <img src="{{asset('assets')}}/images/bl_top10.jpg">
              <img src="{{asset('assets')}}/images/blog_top5.jpg">
            </div>
          </div>
        </div>
      </div>
      <input type="checkbox" class="check_image" id="btn" />
      <label for="btn" class="btn1"></label>
        </div>
        </section>
    

    <section class="section__container seller__container" id="seller">
      <div class="section__header">
        <h2 class="section__title">Refer to the product
        </h2>
        <div class="section__btn">
          <a href="product.html" class="btn">Check All</a>
        </div>
      </div>
      <div data-aos="fade-up" data-aos-delay="200s" class="product">
        <a href="product_detail.html" style="text-decoration: none;">
          <div class="card">
            <div class="img">
             <div class="status">sale</div>
             <img src="{{asset('assets')}}/images/product1.png">
            </div>
             <div class="name">
               <p>Desk night lamp</p>
             </div>
             <div class="price">
              <div>12.00$</div>
              <div class="add">
               <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
             </div>
             </div>
           </div>
        </a>
        <a href="product_detail.html" style="text-decoration: none;">
        <div class="card">
          <div class="img">
            <div class="status">sale</div>
           <img src="{{asset('assets')}}/images/product5.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00$</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>
         </a>
         <a href="product_detail.html" style="text-decoration: none;">
         <div class="card">
          <div class="img">  <div class="status">sale</div>
          <div class="status">sale</div>
           <img src="{{asset('assets')}}/images/product4.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00$</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>
         </a>
         <a href="product_detail.html" style="text-decoration: none;">
         <div class="card">
          <div class="img">  <div class="status">sale</div>
    
           <img src="{{asset('assets')}}/images/product1.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
             <div>12.00$</div>
         
              <div class="add">
                <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
              </div>
          </div>
           </div>
           </a>
           <a href="product_detail.html" style="text-decoration: none;">
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product2.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00$</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>
         </a>
         <a href="product_detail.html" style="text-decoration: none;">
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product3.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>
         </a>
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product3.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product3.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product3.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product3.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>  
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product3.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>  
         <div class="card">
          <div class="img">
           <img src="{{asset('assets')}}/images/product3.png">
          </div>
           <div class="name">
             <p>Desk night lamp</p>
           </div>
           <div class="price">
            <div>12.00</div>
            <div class="add">
              <a href="javascript:void(0)"><button class="addcard">Add to cart</button></i></a>
            </div>
           </div>
         </div>  
      
                  
      </div>
      </div>
      
      </div>
    </section>

 

 
</html>
