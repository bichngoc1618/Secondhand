@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="add-box">
            <h2>Add Cooperation Unit</h2>
            @if(session('error'))
            <br>
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
            <form method="POST" action="{{route('cooperation.store')}}" enctype="multipart/form-data" id="myForm">
                @csrf
              <div class="name-box d-flex">
           
                 <div>
                    <input type="text" name="name" required placeholder=" @error('name')
                    {{$message}}
                         
                     @enderror">
                     <label>Name</label>
                 </div>
                 
              </div>
              <div class="name-box">
                
                    <select name="visible">
                        @foreach($cooperationOptions as $visible)
                            <option value="{{ $visible }}">
                                {{ ucfirst($visible) }}
                            </option>
                        @endforeach
                    </select>
                    
                    <div class="underline">
                   <label for="">Status</label>
                    </div>
               <br>
              <div class="name-box">
                <p id="fileName"></p>
                  <img id="previewImage" src="#" alt="Preview">
                  <input type="file" name="image" id="imageFile" required onchange="displayImage()" required>
                 
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