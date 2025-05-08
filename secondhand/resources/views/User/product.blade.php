@extends('layouts.master')
@section('head')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
@section('container')
    
@endsection

      
   <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active c-item text-center ">
            <img src="{{asset('assets')}}/images/bn_prd.webp" class="d-block w-100 c-img" alt="Slide 1">
            <div class="carousel-caption top-0 mt-4">
              <p class="text-light   fs-3 mt-5">Thousands of attractive products</p>
              <h1 class="display-1 fw-bolder text-light  ">ReEarth</h1>

            </div>
          </div>
          <div class="carousel-item c-item">
            <img src="{{asset('assets')}}/images/bn_prd2.jpg" class="d-block w-100 c-img" alt="Slide 2">
            <div class="carousel-caption top-0 mt-4">
              <p class="text-light   fs-3 mt-5">Thousands of attractive products</p>
              <h1 class="display-1 fw-bolder text-light  ">ReEarth</h1>

            </div>
          </div>
          <div class="carousel-item c-item">
            <img src="{{asset('assets')}}/images/bn_prd3.jpg" class="d-block w-100 c-img" alt="Slide 3">
            <div class="carousel-caption top-0 mt-4">
              <p class="text-light   fs-3 mt-5">Thousands of attractive products</p>
              <h1 class="display-1 fw-bolder text-light  ">ReEarth</h1>


            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>




      <div class="conatainer d-flex">
        <div class="categories flex-fill">
          <ul>
           <li>
             <div href="#" class="cate">
               <img src="{{asset('assets')}}/images/entend.png">
               <span>CATEGORIES</span>
             </div>
             </li>
             @foreach ($categories as $item)
             <li>
                 <a href="{{ route('product', ['categoryId' => $item->id]) }}">
                     <i>
                         <img width="8%" src="{{ asset('assets/images/' . $item->images) }}">
                     </i>
                     <span>{{ $item->name }}</span>
                 </a>
             </li>
         @endforeach
         
     
          </ul>
         </div>
         
         <div  class="cotainer flex-fill">
         <!-- products Filter Buttons Section -->
      <div class="row mt-5 filter" id="filter-buttons">
        <div style="z-index: 2" class="col-12">
          <button class="btn mb-2 me-1 active" data-filter="all">Show all</button>
          <button class="btn mb-2 mx-1" data-filter="Hot Sale">Hot Sale</button>
          <button class="btn mb-2 mx-1" data-filter="Popular">Popular</button>
          <button class="btn mb-2 mx-1" data-filter="Hot">Hot</button>
          <button class="btn mb-2 mx-1" data-filter="Featured">Featured</button>
        
        </div>
      </div>
      <div  class="product"  id="filterable-cards" >
        @foreach ($product as $item)
  
    <a href="{{ route('User.detail', $item->title) }}" style="text-decoration: none;">


      <div class="card" data-name="{{$item->status}}">
       <div class="img">
         <div class="d-flex">
           <div class="status flex-fill">{{$item->status}}</div>
           <div class="sale flex-fill">{{$item->sale}}%</div>
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
          <span style="color: rgb(152, 160, 152)" class="text-decoration-line-through">${{ $productPrice }}</span>
          <span>${{ $discountedPrice }}</span>
      </div>
        
              
          @else
              
          <div>{{$item->price}}$</div>
      @endif
      
      <form  style="    height: 0.5rem;
      padding: 0;
      margin-top: -0.35rem;"  class="add" action="{{ route('cart.store') }}" method="POST">
        @csrf
   
      <button style="font-size: 1vw" type="submit" class="addcard"> <i class="fas fa-shopping-cart"></i> Add to cart</button></i>
      <input type="hidden" name="quantity" value="1">
      <input type="hidden" name="id" value="{{$item->id}}">
      </form>
    
    
        </div>
      </div>
   </a>
   
       @endforeach
        
      </div>
    </div>
      </div>



    
   <div>
    {{ $product->appends(request()->query())->links() }}


    </div>     
 
</html>
