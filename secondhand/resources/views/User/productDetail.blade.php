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
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
@section('container')
          
  <!-- content -->
  <section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
          
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset('assets')}}/images/{{$product->thumbnail}}" />
           
          </div>
         
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
              {{$product->title}}
            </h4>
            <div class="d-flex flex-row my-3">
              
              </div>
              
            </div>
  
            <div class="mb-3">
              @php
              $productPrice = $product->price ?? 0;
              $discount = $product->sale ?? 0;
              $discountedPrice = $productPrice - ($productPrice * $discount / 100);
              $finalPrice = max($discountedPrice, 0);
          @endphp
          
          @if ($product->sale > 0)
              <span class="text-decoration-line-through">${{ $productPrice }}</span>
              <span>${{ $discountedPrice }}</span>
            
                  
              @else
                  
              <span class="h5">{{$product->price}}</span>
          @endif
          

              
            
            </div>
  
            <p>
             {{$product->description}}
            </p>
 
            <hr />
  
         
           
            <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <label class="">Quantity</label>
            <br>
            <br>
             
            <div class="input-group row" style="width: 160px;height: 3vw;">
              <button class="col-md-4 btn btn-white border border-secondary px-3" type="button" id="decrementButton" data-mdb-ripple-color="dark">
                  <i class="fas fa-minus"></i>
              </button>
              <input style="height: 3vw;" type="text" class="col-md-4 form-control text-center border border-secondary px-3" id="quantityInput" name="quantity" value="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
              <button class="col-md-4 btn btn-white border border-secondary px-3" type="button" id="incrementButton" data-mdb-ripple-color="dark">
                  <i class="fas fa-plus"></i>
              </button>
          </div>
          <br>

            <input type="hidden" name="id" value="{{$product->id}}">
            <button style="z-index: 2" type="submit" class="btn btn-success  shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </button>
          </form>
           
           
          </div>
        </main>
      </div>
    </div>
  </section>


  
  <div class="container bootdey">
    <div class="col-md-12 bootstrap snippets">
        <div class="panel">
            <div class="panel-body">
                <!-- Form -->
                <form action="{{ route('reviewprd.store', $reviews->first()->Product->title) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <textarea name="comment" class="form-control" rows="2" placeholder="What are you thinking?"></textarea>
                    <br>
                    <div class="mar-top clearfix">
                        <button class="btn btn-success" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
                    </div>
                </form>
                <br>
                <br>
                <!-- End Form -->
            </div>
        </div>

        <div class="panel">
            <div class="panel-body">
           
    <!-- Feed -->
@if (!$reviews->isEmpty())
@foreach ($reviews as $item)
    @if ($item->product && $item->product->id == $product->id)
        <div class="media-block">
            <a class="media-left" href="#">
                <img style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"
                    class="img-circle img-sm" alt="Profile Picture"
                    src="{{asset('assets')}}/images/{{$item->User->avatar}}">
            </a>
            <div class="media-body">
                <div class="mar-btm">
                    <a href="#" class="btn-link text-semibold media-heading box-inline">
                        {{$item->User->name}}
                    </a>
                </div>
                <p>{{$item->comment}}</p>
                <hr>
            </div>
        </div>
    @endif
@endforeach
@else
<h4>There are no reviews yet</h4>
@endif

                
                
          
                <!-- End Feed -->
            </div>
        </div>
    </div>
</div>






  <!-- content -->
  
  <section class="section__container seller__container" id="seller">
    <div class="conatainer">
    <div style="margin: 2.7rem" class="section__header">
      <h2 class="section__title">Refer to the product
      </h2>
      <div class="section__btn">
        <a href="{{route('User.product')}}" class="btn">Check All</a>
      </div>
    </div>
    <div class="product"  id="filterable-cards">
   
      @foreach ($products as $item)
      @if ($item->status=='Popular' || $item->status='Hot')
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
            margin-top: -0.5rem;"  class="add" action="{{ route('cart.store') }}" method="POST">
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
    </div>
    
    </div>
  </div>
  </section>
  
 

 
   
        <!-- Facebook -->
     
  
  
 