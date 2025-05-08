@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="add-box">
            <h2>Add Categories</h2>
            @if (session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data" id="myForm">
                @csrf
              <div class="name-box">
           
                  <input type="text" name="name" required placeholder=" @error('name')
                 {{$message}}
                      
                  @enderror">
                  <label>Categories name</label>
                 
              </div>
              <div class="name-box">
                <p id="fileName"></p>
                  <img id="previewImage" src="#" alt="Preview">
                  <input type="file" name="image" id="imageFile" required onchange="displayImage()" required>
                  
                  
              </div>
              <div class="name-box">
                  <textarea name="describe" placeholder=" @error('describe')
                  {{$message}}
                       
                   @enderror"></textarea>
                  <label>Describe</label>
              </div>
          
              <a href="#" onclick="submitForm()">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  Submit
              </a>
          </form>
          
          </div>
    </section>
</div>


@endsection