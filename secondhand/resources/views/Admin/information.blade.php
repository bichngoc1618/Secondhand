@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="add-box">
            <h2>Add Product</h2>
            @if (session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif
          
        <form method="POST" action="{{route('Admin.update', $user)}}" enctype="multipart/form-data" id="myForm">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="name" value="{{ old('name') ?: $user->name }}">
                   <div class="underline"></div>
                   <label for="">Username</label>
                </div>
                <div class="input-data">
                    <input type="text" name="role" value="{{ $user ->role->name }}" readonly>  
                      
                <div class="underline"></div>
               <label for="">Role</label>
               </div>
             </div>
             <div class="form-row">
                <div class="input-data">
                    <input type="text" required name="firstname" value="{{ old('name') ?: $user->first_name}}">
                   <div class="underline"></div>
                   <label for="">First name</label>
                </div>
                <div class="input-data">
                    <input type="text" name="lastname" value="{{ $user->last_name }}">  
                <div class="underline"></div>
               <label for="">Last Name</label>
               </div>
             </div>
            <div class="form-row">
             <div style="width: 65vw" class="input-data">
                <input type="text" name="email" value="{{ $user->email}}">             
            <div class="underline"></div>
           <label for="">Email</label>
           </div>
         </div>
            
            <div class="input-data">
                <p id="fileName"></p>
                <img id="previewImage" src="{{ $user->avatar ? asset('assets/images/' . $user->avatar) : '#' }}" alt="Preview" >
                <input type="file" name="image" id="imageFile" required onchange="displayImage()">
              </div>
         <div class="form-row">
            <div class="input-data">
                <input type="text" required name="city" value="{{ old('name') ?: $user ->city }}">
                <div class="underline"></div>
                <label for="">City</label>
            </div>
            <div class="input-data">
               <input type="text" required name="address" value="{{$user->address }}">
               <div class="underline"></div>
               <label for="">Addresss</label>
            </div>
            <div class="input-data">
                <input type="text" required name="phone" value="{{$user->phone }}">
                <div class="underline"></div>
                <label for="">Phone</label>
             </div>
         </div>
         
         
      
          <a href="#" onclick="submitForm()">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Update
          </a>
      </form>
          </div>
    </section>
</div>


@endsection