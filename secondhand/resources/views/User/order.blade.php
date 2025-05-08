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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}s">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="login.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @section('container')
      
           
<div class="container">
    <div class="row">
        <div class="col-xl-8">
            @foreach ($data as $value)
           
            <div class="card-order border shadow-none">
                <div class="card-order-body">
                    <div class="d-flex align-items-start border-bottom pb-3">
                        <div class="me-4">
                            <img src="{{ asset('assets/images/' . $value->product->thumbnail) }}" alt="" class="avatar-lg rounded">
                        </div>
                        <div class="flex-grow-1 align-self-center overflow-hidden">
                            <div>
                                <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">{{ $value->product->title }}</a></h5>
                            </div>
                        </div>
                        <form action="{{ route('cart.delete', ['id' => $value->id]) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn text-muted px-1 " onclick="confirmation(event)" data-confirm-delete="true" style="border: none; background-color: transparent; cursor: pointer;">
                                <i style="font-size: 20px" class="mdi mdi-trash-can-outline"></i>
                            </button>
                        </form>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Price</p>
                                    @if ($value->product->sale > 0)
                                   
                                       <span class="text-muted me-2 text-decoration-line-through">${{$value->product->price }}</span>
                                        <span>${{ $value->product->price-(($value->product->sale*$value->product->price)/100)}}</span>
                                        @else
                                            
                                        <h4 style="color: rgb(25, 114, 114)0, 181, 181)" class="mb-0 mt-2"><span class="text-muted me-2">{{$value->product->price}}$</span></h4>
                                    @endif
                                    
                              
                                  
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Quantity</p>
                                    <div class="d-inline-flex">
                                       
                            
                                <form action="{{ route('cart.update', ['id' => $value->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                
                                    <input style="position: relative ; z-index: 2;" type="number" class="form-control text-center border border-secondary" name="quantity" value="{{ $value->quantity }}" min="1" max="100" aria-label="Example text with button addon" aria-describedby="button-addon1" onchange="this.form.submit()">
                                </form>
                                
                          

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-3">
                                   
                                    <p class="text-muted mb-2">Total</p>
                                    <h5>$ {{$value->quantity*$value->product->price}} </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
                       
            <!-- end card-order -->
        @endforeach
        
   

            <div class="row my-4">
                <div class="col-sm-6">
                    <a style="z-index: 11" href="{{route('User.product')}}" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                </div> <!-- end col -->
                <div class="col-sm-6">
                    <div class="text-sm-end mt-2 mt-sm-0">
                        <a style="z-index: 11" href="{{route('checkout.index')}}" class="btn btn-success">
                            <i class="mdi mdi-cart-outline me-1"></i>Checkout </a>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>

        <div class="col-xl-4">
            <div class="mt-5 mt-lg-0">
                <div class="card-order border shadow-none">
                    <div class="card-order-header bg-transparent border-bottom py-3 px-4">
                        <h5 class="font-size-16 mb-0">Order Summary <span class="float-end">#MN0124</span></h5>
                    </div>
                    <div class="card-order-body p-4 pt-2">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Sub Total :</td>
                                      <td class="text-end">
                                        @php
                                            $subtotal = 0;
                                        @endphp

                                        @foreach ($data as $value)
                                            @php
                                                $subtotal += $value->product->price * $value->quantity;
                                            @endphp
                                        @endforeach

                                       $ {{ $subtotal }}
                                    </td>

                                    </tr>
    
                                    <tr>
                                        <td>Shipping Charge :</td>
                                        <td class="text-end">$ 25</td>
                                    </tr>
                                   
                                    <tr class="bg-light">
                                        <th>Total :</th>
                                        <td class="text-end">
                                            <span class="fw-bold">
                                               $ {{$subtotal+25}}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    
</div>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
<script>
   window.onload = function () {
    var deleteButtons = document.querySelectorAll('.delete-btn');

    if (Swal && deleteButtons.length > 0) {
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                var form = this.closest('.delete-form');
                if (!form) {
                    console.error('Parent form not found.');
                    return;
                }

                var title = 'Delete Product!';
                var text = 'Are you sure you want to delete?';

                var swalConfirmed = false;

                console.log('Before Swal.fire');

                Swal.fire({
                    title: title,
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete now!'
                }).then((result) => {
                    console.log('After Swal.fire');
                    if (result.isConfirmed) {
                        swalConfirmed = true;

                        // Submit the form when confirmed
                        form.submit();
                    }
                });
            });
        });
    } else {
        console.error('Swal or delete buttons not found.');
    }
};

</script>
