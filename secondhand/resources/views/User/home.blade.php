@extends('layouts.master')
@section('head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
   
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    
      
      
        
     
            <div class="slider">
            <!-- list Items -->
            <div class="list">
                <div class="item active">
                  <img src="{{asset('assets')}}/images/home2.jpg">
                    <div class="content">
                        <h2>ReEarth</h2>
                        <p>
                          "WHEN YOU BUY RECYCLED PRODUCTS YOU'RE NOT JUST PURCHASING A PRODUCT-YOU'RE BUYING A SUSTAINABLE FUTURE."
                        </p>
                    </div>
                </div>
                <div class="item">
                  <img src="{{asset('assets')}}/images/home3.jpg">
                    <div class="content">
                      <h2>ReEarth</h2>
                      <p>
                        "WHEN YOU BUY RECYCLED PRODUCTS YOU'RE NOT JUST PURCHASING A PRODUCT-YOU'RE BUYING A SUSTAINABLE FUTURE."
                      </p>
                    </div>
                </div>
                <div class="item">
                  <img src="{{asset('assets')}}/images/home9.jpg">
                    <div class="content">
                      <h2>ReEarth</h2>
                      <p>
                        "WHEN YOU BUY RECYCLED PRODUCTS YOU'RE NOT JUST PURCHASING A PRODUCT-YOU'RE BUYING A SUSTAINABLE FUTURE."
                      </p>
                    </div>
                </div>
                <div class="item">
                  <img src="{{asset('assets')}}/images/home8.jpg">
                    <div class="content">
                      <h2>ReEarth</h2>
                      <p>
                        "WHEN YOU BUY RECYCLED PRODUCTS YOU'RE NOT JUST PURCHASING A PRODUCT-YOU'RE BUYING A SUSTAINABLE FUTURE."
                      </p>
                    </div>
                </div>
                <div class="item">
                  <img src="{{asset('assets')}}/images/home4.jpg">
                    <div class="content">
                      <h2>ReEarth</h2>
                      <p>
                        "WHEN YOU BUY RECYCLED PRODUCTS YOU'RE NOT JUST PURCHASING A PRODUCT-YOU'RE BUYING A SUSTAINABLE FUTURE."
                      </p>
                    </div>
                </div>
            </div>
            <div class="arrows">
              <button id="prev"><</button>
              <button id="next">></button>
          </div>
          <!-- thumbnail -->
          <div class="thumbnail">
              <div class="item active">
                  <img src="{{asset('assets')}}/images/home2.jpg">
                  
              </div>
              <div class="item">
                <img src="{{asset('assets')}}/images/home3.jpg">
                  
              </div>
              <div class="item">
                  <img src="{{asset('assets')}}/images/home9.jpg">
                 
              </div>
              <div class="item">
                  <img src="{{asset('assets')}}/images/home8.jpg">
                  
              </div>
              <div class="item">
                  <img src="{{asset('assets')}}/images/home4.jpg">
                 
              </div>
          </div>
      </div>
  
       


     

        
<div class="container" id="see">
    <h2 class="unit" data-aos="fade-up" data-aos-dmelay="200">Cooperation unit</h2>
    <div class="row unit_ct">
      @foreach ($cooperation as $item)
      @if ($item->visible=='visible')
      <div data-aos="fade-up" data-aos-delay="400" class="col-3" ct1>
        <img src="{{asset('assets')}}/images/{{$item->logo}}" width="60%">
        <p>{{$item->name}}</p>
      </div>
      @endif
     
      @endforeach
    </div>

   
    <div class="categories">
     @foreach ($categories as $item)
     <div class="card" data-aos="fade-up" data-aos-delay="200s">
      @if ($item->images)
      <img src="{{ asset('assets/images/' . $item->images) }}" alt="Image">

      @else
          No Image
      @endif
      <div class="intro">
        <h2>{{$item->name}}</h2>
        <p>{{$item->describe}}</p>
        <a href="{{route('User.product')}}">READ MORE</a>
      </div>
  </div>
     @endforeach
       
   
  
    </div>
    <h2 class="pr_cate">Product Categories</h2>
</div>
 

<div class="about">
 <div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-6">
      <div class="earth" style="background: url('{{ asset('assets/images/earth.jpg') }}');"></div>

    </div>
    <div class="col-md-6 content">
      <h3 data-aos="fade-up" data-aos-delay="100">About us</h3>
      <p data-aos="fade-up" data-aos-delay="120">Reearth is a website specialized in providing recycled products.
         We view recycling not only as an action but also as a lifestyle and a way to demonstrate our 
         commitment to this planet. By collaborating with partners who share the same goals, 
         we aim to create a greater impact in protecting natural resources and reducing our environmental footprint. Join us at Reearth in our journey to protect the environment and create a brighter future for our planet.</p>
    </div>
 </div>
  </div>
 
</div>
</div>

<div class="cotainer">
   <h2 class="popular" data-aos="fade-up" data-aos-delay="200s">
    Popular product
  </h2>
  <div data-aos="fade-up" data-aos-delay="200s" class="product"  id="filterable-cards">
   
    @foreach ($product as $item)
    @if ($item->status=='Popular')
    <a href="{{ route('User.detail', $item->title) }}" style="text-decoration: none;">
      <div class="card">
       <div class="img">
         <div class="d-flex">
           <div class="status flex-fill">{{$item->status}}</div>
           @if ($item->sale>0)
           <div class="sale flex-fill">{{$item->sale}}%</div>
           @endif
         </div>
         @if ($item->thumbnail)
         <img src="{{ asset('assets/images/' . $item->thumbnail) }}" alt="Image">
         @else
             No Image
         @endif
       </div>
        <div class="name">
          <p>{{$item->title}}</p>
        </div>

        <div class="price">
          @php
          $productPrice = $item->price ?? 0;
          $discount = $item->sale ?? 0;
          $discountedPrice = $productPrice - ($productPrice * $discount / 100);
          $finalPrice = max($discountedPrice, 0);
          @endphp
            
            @if ($item->sale > 0)
            <div>
                <span style="color: rgb(128, 133, 128)" class="text-decoration-line-through">${{ $productPrice }}</span>
                <span>${{ $discountedPrice }}</span>
            </div>
              
                  
              @else
                  
              <div>{{$item->price}}$</div>
              @endif

        
       
          <form  style="    height: 0.5rem;
          padding: 0;
          margin-top: -0.4rem;"  class="add" action="{{ route('cart.store') }}" method="POST">
            @csrf
       
          <button style="font-size: 1vw" type="submit" class="addcard"> <i class="fas fa-shopping-cart"></i> Add to cart</button></i>
          <input type="hidden" name="quantity" value="1">
          <input type="hidden" name="id" value="{{$item->id}}">
          </form>
        
        </div>
      </div>
   </a>
    @endif
   
       @endforeach
  </div>
  @include('sweetalert::alert')

  
 <!--review-->
 
 <section class="testimonial-section d-flex align-items-center">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-md-6 testi-img">
              <div class="img-box">
                  <div class="img-box-inner">
                    @foreach($review as $index => $item)
                    @if ($item->display == 1 && $index == 0)
                        <img src="{{asset('assets')}}/images/{{$item->user->avatar}}" alt="testi img">
                        @break
                    @endif
                @endforeach
                
                      
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div id="myCarousel" class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel">
                  <div class="carousel-inner">
                      @foreach($review as $index => $item)
                          @if ($item->display == 1)
                              <div class="carousel-item testi-item {{ $index == 0 ? 'active' : '' }}" data-img="{{asset('assets')}}/images/{{$item->user->avatar}}">
                                  <p>{{ $item->comment }}</p>
                                  <h3>{{ $item->user->name }}-<span>{{ $item->product->title }}</span></h3>
                              </div>
                          @endif
                      @endforeach
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                      <img src="{{asset('assets')}}/images/left-arrow.png" alt="prev">
                      <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                      <img src="{{asset('assets')}}/images/right-arrow.png" alt="prev">
                      <span class="visually-hidden">Next</span>
                  </button>
              </div>
          </div>
      </div>
  </div>
</section>



<script src="js/bootstrap.bundle.min.js"></script>
<script>
  const myCarousel = document.getElementById('myCarousel')
  myCarousel.addEventListener('slid.bs.carousel', function () {
    const activeItem = this.querySelector(".active");
    document.querySelector(".testi-img img").src = activeItem.getAttribute("data-img");
    document.querySelector(".testi-img .circle").style.backgroundColor = activeItem.getAttribute("data-color");
  })
</script>


