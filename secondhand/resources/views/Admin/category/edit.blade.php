@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="add-box">
            <h2>Update Categories</h2>
            @if (session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <form method="POST" action="{{route('category.update', $category)}}" enctype="multipart/form-data" id="myForm">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
              <div class="name-box @error('name')has-error
                  
              @enderror">
                  <input type="text" name="name" required value="{{ old('name') ?: $category->name }}"
                  placeholder="">
                  <label>Categories name</label>
                  @error('name')
                 <span class="help-block"> {{$message}}
                </span>
                   @enderror
              </div>
              <div class="name-box">
                <p id="fileName"></p>
                <img id="previewImage" src="{{ $category->images ? asset('assets/images/' . $category->images) : '#' }}" alt="Preview" style="max-width: 100%;">
                <input type="file" name="image" id="imageFile" required onchange="displayImage()">
                  
                  
                  
              </div>
              <div class="name-box">
                <textarea name="describe" required>{{$category->describe}}</textarea>

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