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




      <div class="container-fluid px-4 my-5">
        <div class="row">
          <!-- Sidebar -->
          <div class="col-lg-2 col-md-4 mb-4">
            <div class="sidebar-categories sticky-top" style="top: 100px; z-index: 1;">
              <h4 class="sidebar-title mb-4 fw-bolder text-dark"><i class="fas fa-list-ul text-success me-2"></i> Categories</h4>
              <div class="list-group shadow-sm rounded-3 border-0">
                @php
                  // Assigning dynamic FontAwesome icons based on category name
                  $icons = [
                      'Recycled Plastics' => 'fas fa-recycle',
                      'Eco Friendly Paper' => 'fas fa-leaf',
                      'Organic Fabric' => 'fas fa-tshirt',
                      'Green Electronics' => 'fas fa-plug',
                  ];
                @endphp
                @foreach ($categories as $index => $item)
                @php
                    $iconClass = $icons[$item->name] ?? 'fas fa-seedling';
                @endphp
                <a href="{{ route('product', ['categoryId' => $item->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 border-bottom px-2">
                    <i class="{{ $iconClass }} text-success fa-lg me-2" style="width: 20px; text-align: center;"></i>
                    <span class="fw-bold text-dark" style="font-size: 0.9rem;">{{ $item->name }}</span>
                </a>
                @endforeach
              </div>
            </div>
          </div>
         
          <!-- Product List -->
          <div class="col-lg-10 col-md-8">
          <!-- Filter Buttons -->
          <div class="d-flex justify-content-center flex-wrap mb-4" id="filter-buttons">
            <button class="btn filter-pill me-2 mb-2 active" data-filter="all">Show All</button>
            <button class="btn filter-pill mx-2 mb-2" data-filter="Hot Sale">Hot Sale</button>
            <button class="btn filter-pill mx-2 mb-2" data-filter="Popular">Popular</button>
            <button class="btn filter-pill mx-2 mb-2" data-filter="Hot">Hot</button>
            <button class="btn filter-pill ms-2 mb-2" data-filter="Featured">Featured</button>
          </div>
      <div  class="product"  id="filterable-cards" >
        @foreach ($product as $item)
  
    <a href="{{ route('User.detail', $item->title) }}" style="text-decoration: none;">


      <div class="card" data-name="{{$item->status}}">
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
          <span style="color: rgb(152, 160, 152)" class="text-decoration-line-through">${{ $productPrice }}</span>
          <span>${{ $discountedPrice }}</span>
      </div>
        
              
          @else
              
          <div>{{$item->price}}$</div>
      @endif
      
      <form class="add" action="{{ route('cart.store') }}" method="POST">
        @csrf
      <button type="submit" class="addcard"> <i class="fas fa-shopping-cart"></i> Add to cart</button>
      <input type="hidden" name="quantity" value="1">
      <input type="hidden" name="id" value="{{$item->id}}">
      </form>
    
    
        </div>
      </div>
   </a>
   
       @endforeach
        
      </div> <!-- End Product Grid -->
      </div> <!-- End col-lg-9 -->
      </div> <!-- End row -->
      </div> <!-- End container -->



    
   <div>
    {{ $product->appends(request()->query())->links() }}


    </div>     
 
</html>
