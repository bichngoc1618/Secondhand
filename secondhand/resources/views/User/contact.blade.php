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
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  @section('container')
           <div class="content">
            <div class="d-flex tip">
                <div class="flex-fill img">
                    <img src="{{asset('assets')}}/images/bn_ct.png"style="width: 50vw;">
                </div>
                <div class="flex-fill ct_tip">
                    <h2>CONTACT US</h2>
                    <span><img src="{{asset('assets')}}/images/plain.png" style="width: 10vw;">Love recycling - Love the Earth<img src="{{asset('assets')}}/images/plain2.png" style="width: 10vw;"></span>
                </div>
            </div>
          
	<div class="container">
        
       
		<main class="row">
			
			<!--  *******   Left Section (Column) Starts   *******  -->

			<section class="col left">
				
				<!--  *******   Title Starts   *******  -->

				<div class="contactTitle">
					<h2>Get In Touch</h2>
					<p>Contact us today to answer your questions.</p>
				</div>

				<!--  *******   Title Ends   *******  -->

				<!--  *******   Contact Info Starts   *******  -->

				<div class="contactInfo">
					
					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-phone"></i>
						</div>
						<div class="details">
							<span>Fast support</span>
						</div>
					</div>

					<div class="iconGroup">
						<div class="icon">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<span>Enthusiastic advice
                            </span>
						</div>
					</div>

					

				</div>

				<!--  *******   Contact Info Ends   *******  -->

				<!--  *******   Social Media Starts   *******  -->


				<!--  *******   Social Media Ends   *******  -->

			</section>

			<!--  *******   Left Section (Column) Ends   *******  -->

			<!--  *******   Right Section (Column) Starts   *******  -->

			<section class="col right">
				
				<!--  *******   Form Starts   *******  -->

				<form class="messageForm" action="{{route('contact.store')}}" method= POST>
					@csrf
					<div class="inputGroup halfWidth">
						<input type="text" required="required" name="name" value="{{Auth::user()->name}}">
						<label>Your Name</label>
					</div>

					<div class="inputGroup halfWidth">
						<input type="email" name="email" required="required" value="{{Auth::user()->email}}">
						<label>Email</label>
					</div>

					<div class="inputGroup fullWidth">
						<input type="text" name="subject" required="required">
						<label>Subject</label>
					</div>

					<div class="inputGroup fullWidth">
						<textarea name="feedback" required="required" placeholder="Say Something"></textarea>
					</div>

					<div class="inputGroup fullWidth">
						<button type="submit">Send Message</button>
					</div>

				</form>

				<!--  *******   Form Ends   *******  -->
			</section>

			<!--  *******   Right Section (Column) Ends   *******  -->

		</main>
	</div>
   
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7332975515583!2d108.24978007327914!3d15.97529824194928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1700665249392!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>




     
        </html>
      