@extends('layouts.master')
@section('head')
    
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style_home.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="login.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
    i.fas.fa-search {
        text-align: center;
        align-items: center;
        margin-top: 1rem;
    }
</style>

<body>
    @endsection

@section('container')
    <form class="form-horizontal" method="post" action="">
        @csrf
        <div style="padding: 2rem; margin-top: 8rem" class="container">
            <div class="row cart-body">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!-- REVIEW ORDER -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order
                            <div class="pull-right">
                                <small><a class="afix-1" href="{{ route('cart.index') }}">Edit Cart</a></small>
                            </div>
                        </div>
                        <div class="panel-body">
                            @foreach ($cart as $item)
                            @if ($item->user_id == Auth::id())
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img width="40%" class="img-responsive"
                                            src="{{ asset('assets/images/' . $item->product->thumbnail) }}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <input type="hidden" value="{{ $item->product->id }}" name="product_id[]">
                                        <div class="col-xs-12">{{ $item->product->title }}</div>
                                        <input type="hidden" value="{{ $item->product->title}}" name="product_name[]">
                                        <input type="hidden" name="price[]"
                                            value="{{ ($item->product->price) - ($item->product->price * $item->product->sale / 100) }}">
                                        <div class="col-xs-12">
                                            <small>Quantity:<span>{{ $item->quantity }}</span></small>
                                        </div>
                                        <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>
                                            <span>$</span>
                                            {{
                                                (($item->product->price) - ($item->product->price * $item->product->sale / 100)) * $item->quantity
                                            }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="form-group"><hr /></div>
                                @endif
                            @endforeach
                            <div class="form-group">
                                <div class="col-xs-12">zz
                                    <strong>Subtotal</strong>
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach ($cart as $value)
                                        @php
                                            $subtotal += $value->product->price * $value->quantity;
                                        @endphp
                                    @endforeach
                                    <div class="pull-right"><span>$</span><span>{{ $subtotal }}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span>25$</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <input type="hidden" name="total" value="{{ $subtotal + 25 }}">
                                    <div class="pull-right"><span>$</span><span>{{ $subtotal + 25 }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- REVIEW ORDER END -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!-- SHIPPING METHOD -->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control"
                                        value="{{ Auth::user()->first_name }}" required />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control"
                                        value="{{ Auth::user()->last_name }}" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}"
                                        required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control"
                                        value="{{ Auth::user()->address }}" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone" class="form-control"
                                        value="{{ Auth::user()->phone }}" required /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="email" name="email" class="form-control"
                                        value="{{ Auth::user()->email }}" /></div>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" method="post" action="">
                        <!-- SHIPPING METHOD END -->
                        <!-- CREDIT CART PAYMENT -->
                        <button class="btn"
                            style="background-color: rgb(59, 130, 108); color: aliceblue; padding: 1vw;" type="submit"
                            class="glyphicon glyphicon-shopping-cart">Order now</button>
                    </form>
                </div>
            </div>
            <div class="row cart-footer"></div>
        </div>
    </form>
@endsection
</body>
