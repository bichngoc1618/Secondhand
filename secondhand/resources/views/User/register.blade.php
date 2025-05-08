
@extends('layouts.master')
@section('container')
    

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Document</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

  
  
  <link rel="stylesheet" href="{{ asset('assets/css/style_home.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<br><br>

    <div class="loginContainer">
        <div class="logo">
            <h1>Register</h1>
                <span style="font-weight: 500;">
                  When you buy a recycled product, you don't just buy a product - you buy a future
                </span>
        </div>
        <form class="form" action="" method="POST">   @csrf
       
          <div class="group">
            <i class="fa-regular fa-user"></i>
            <input type="text" placeholder=" " id="name" autocomplete="off" name="name" value="{{ old('name') }}" placeholder="">
            <label for="name">Username...</label>
            @error('name')
                <span class="alert-danger">{{ $message }}</span>
            @enderror
        </div>
          <div class="group">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder=" " id="name" autocomplete="off" name="email" value="{{ old('email') }}" placeholder="">
            <label for="name">Email...</label>
            @error('email')
            <span class="alert-danger">{{ $message }}</span>
            @enderror
        </div>

            <div class="group">
                <i class="fa-solid fa-lock"></i>
                <input style="height: 3rem; z-index: 22222;" type="password" placeholder=" " id="password"  autocomplete="off" name="password" required>
                <label for="password">Password...</label>
            </div>
            
            <div class="group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder=" " id="pass2" autocomplete="off" required>
              
                <label for="password">Confirm Password...</label>
            </div>
            
           <div style="margin-top: 1rem;">
            
            <span style="font-size: 1.1rem; font-weight: 400; margin: 1rem;">Do you already have an account?
            </span>
            <a href="{{route('login')}}">
             Login now
            </a>
           </div>
        
            
         
            
            
         
            <div class="loginBtn">
                <button onclick="return checkform()"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
           
        </form>

    </div>
    <script>
        function changeTypePassword(){
            document.getElementById('password').type = document.getElementById('password').type == 'text' ? 'password' : 'text';
            
        }
        function changeTypePass2(){
            document.getElementById('pass2').type = document.getElementById('pass2').type == 'text' ? 'password' : 'text';
            
        }
    </script>



         