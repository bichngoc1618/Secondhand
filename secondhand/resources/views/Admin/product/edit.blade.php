@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="add-box">
            <h2>Edit Product</h2>
            @if (session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <form method="POST" action="{{route('product.update', $product)}}" enctype="multipart/form-data" id="myForm">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
              <div class="name-box d-flex">
           
                 <div>
                    <input type="text" name="title" required value="{{$product->title}}">
                    
                    @error('title')
                <div class="alert alert-danger"> {{$message}}</div> <br>
                         
                     @enderror
                     <label>Product name</label>
                 </div>
                 
              </div>
              <div class="form-row">
                <div class="input-data">
                    <select name="categories_id" required >
                        @foreach($category as $category)
                        <option value="{{ $category->id }}" {{ $product->categories_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                    </select>

                    <div class="underline">
                   <label for="">Category</label>
                    </div>
                   
                </div>
                
                <div class="input-data">
                   <input type="text" required name="price" value="{{ $product->price }}" >
                   <div class="underline"></div>
                   <label for="">Price</label>
                @error('price')
                <div class="alert alert-danger"> {{$message}}</div> <br>
                         
                     @enderror
                </div>
             </div>
             <div class="form-row">
                <div class="input-data">
                   
                       
                        <select name="status" required>
                            @foreach(['Hot Sale', 'Featured', 'Hot', 'Popular'] as $statusOption)
                                <option value="{{ $statusOption }}" {{ $product->status == $statusOption ? 'selected' : '' }}>
                                    {{ $statusOption }}
                                </option>
                            @endforeach
                        </select>
                        
                           
                       
                    </select>
                   <div class="underline"></div>
                   <label for="">Status</label>
                </div>
                <div class="input-data">
                   <input type="text" required name="sale" value="{{$product->sale}}">
                   <div class="underline"></div>
                   <label for="">Sale</label>
                </div>
             </div>
             
             
             
              <div class="name-box">
                <p id="fileName"></p>
                <img id="previewImage" src="{{ $product->thumbnail ? asset('assets/images/' . $product->thumbnail) : '#' }}" alt="Preview" >
                <input type="file" name="image" id="imageFile" required onchange="displayImage()">
                  
                  
              </div>
              <div class="name-box">
                  <textarea name="describe">{{$product->description}}</textarea>
                  @error('disreption')
                <div class="alert alert-danger"> {{$message}}</div> <br>
                         
                     @enderror
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