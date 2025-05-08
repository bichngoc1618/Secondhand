@extends('layouts.masteradm')

@section('container')
<div class="content-wrapper">
    <!-- Main content -->

      <div class="col-xs-12">
        <div style="background: transparent" class="box">
          <h1 class="box-title text-center">Product Management</h1>
          <div class="box-header">

            <form style="margin-right: 20rem" action="{{ route('prdsearch') }}" method="POST" autocomplete="off" style="margin-bottom: 2rem" class="box-tools">
              {{ csrf_field() }}
              <div class="input-group input-group-sm hidden-xs" style="width: 15vw">
                <input style="" type="text" name="query" id="searchInput" class="form-control pull-right" placeholder="Search">
               
                <div class="input-group-btn">
                  <button  style="margin-top: 3vw"  type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
              <div style="position: absolute" id="search_ajax"></div>
            </form>

            <div class="col-md-4">
              <a style="margin-top: 4rem" href="{{ route('product.create') }}" class="btn btn-sm btn-success">Add Product</a>
          </div>
     
          </div>
        
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover text-center">
            <tr>
              <th>STT</th>
              <th>Category</th>
              <th>Product name</th>
              <th>Price</th>
              <th>Image</th>
              <th>Describe</th>
              <th>Status</th>
              <th>Sale</th>
            </tr>
            @forelse ($product as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->price }}</td>
                <td>
                  @if ($item->thumbnail)
                  <img src="{{ asset('assets/images/' . $item->thumbnail) }}" alt="Image">

                  @else
                      No Image
                  @endif
              </td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->sale }}</td>
                <td><a href="{{route('product.edit',$item)}}"><i class="fas fa-edit"></i></a></td>
                <td>
                <form action="{{route('product.destroy',$item)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fas fa-trash-alt"></i></button>
              </form>
                </form>
              </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Not found</td>
            </tr>
        @endforelse
        
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
</div>
{{ $product->appends(request()->query())->links() }}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script>
   
  $(document).ready(function () {
   $('#searchInput').keyup(function () {
       var query = $(this).val();

       if (query !== "") {
           $.ajax({
               url: "{{route('prdsearchajax')}}",
               method: "POST",
               data: { query: query, _token: $('meta[name="csrf-token"]').attr('content') },
               success: function (data) {
                   $('#search_ajax').fadeIn();
                   $('#search_ajax').html(data.html); 
               },
               error: function (xhr, status, error) {
                   console.error(xhr.responseText);
                 
               }
           });
       }
   });

   $(document).on('click', '.li_search_ajax', function () {
       $('#searchInput').val($(this).text());
       $('#search_ajax').fadeOut();
   });
});

</script>
@endsection