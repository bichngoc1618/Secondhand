
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
            <h1>Reset Password</h1>
                <span style="font-weight: 500;">
                  When you buy a recycled product, you don't just buy a product - you buy a future
                </span>
        </div>
        <form class="form" action="{{ route('password.reset', ['token' => $token]) }}" method="POST">
           
               @csrf
                <label for="password">Password...</label>
                <input type="password" placeholder=" "autocomplete="off" name="password">
             
                <label for="password">Confirm Password...</label>
              
                <input type="password" placeholder=" " autocomplete="off" name="password_confirmation">
        
            
         
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



         