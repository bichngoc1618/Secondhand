@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="add-box">
            <h2>Edit Cooperation Unit</h2>
            @if (session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <form method="POST" action="{{route('cooperation.update', $cooperation)}}" enctype="multipart/form-data" id="myForm">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$cooperation->id}}">
              <div class="name-box d-flex">
           
                 <div>
                    <input type="text" name="name" required value="{{$cooperation->name}}">
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
                   <label for="">Visible</label>
                    </div>
               
    
                 
             
             
              <div class="name-box">
                <p id="fileName"></p>
                <img id="previewImage" src="{{ $cooperation->logo ? asset('assets/images/' . $cooperation->logo) : '#' }}" alt="Preview" >
                <input type="file" name="image" id="imageFile" required onchange="displayImage()">
                  
                  
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