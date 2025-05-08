@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="add-box">
            <h2>Add Product</h2>
            @if(session('error'))
            <br>
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data" id="myForm">
                @csrf
              <div class="name-box d-flex">
           
                 <div>
                    <input type="text" name="title" required >
                     @error('title')
                <div class="alert alert-danger"> {{$message}}</div> <br>
                         
                     @enderror
                     <label>Product name</label>
                 </div>
                 
              </div>
              <div class="form-row">
                <div class="input-data">
                    <select name="categories_id" required>
                        @foreach($category as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $product->categories_id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                    
                    </select>

                    <div class="underline">
                   <label for="">Category</label>
                    </div>
                </div>
                <div class="input-data">
                   <input type="text" required name="price">
                   @error('price')
                <div class="alert alert-danger"> {{$message}}</div> <br>
                         
                     @enderror
                   <div class="underline"></div>
                   <label for="">Price</label>
                </div>
             </div>
             <div class="form-row">
                <div class="input-data">
                    <select name="status" required>
                            <option value="Popular" selected>Popular</option>
                            <option value="Hot Sale">Hot Sale</option>
                            <option value="">Hot</option>
                            <option value="">Featured</option>
                         
                    </select>
                   <div class="underline"></div>
                   <label for="">Status</label>
                </div>
                <div class="input-data">
                   <input type="text" required name="sale" value="0">
                   <div class="underline"></div>
                   <label for="">Sale</label>
                </div>
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
                  <label>Description</label>
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