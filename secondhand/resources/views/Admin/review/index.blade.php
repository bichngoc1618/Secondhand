@extends('layouts.masteradm')

@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <div class="col-xs-12">
        <div class="box">
            <h1 class="box-title text-center">Review List</h1>
            <div class="box-header">
                <form style="margin-right: 20rem"  action="reviewsearch" method="POST" autocomplete="off" style="margin-bottom: 2rem" class="box-tools">
                    {{ csrf_field() }}
                    <div class="input-group input-group-sm hidden-xs" style="width: 15vw">
                        <input style="" type="text" name="query" id="searchInput" class="form-control pull-right" placeholder="Product name">
                        <div class="input-group-btn">
                            <button style="margin-top: 3vw" type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                       
                    </div>
                    <div style="position: absolute" id="search_ajax"></div>
                </form>
              
                
            </div>
                
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover text-center">
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Product</th>
                        <th>Review</th>
                        <th>Display</th>
                        <th>Delete</th>
                    </tr>
                    @forelse ($review as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name}}</td>
                        <td>{{ $item->user->email}}</td>
                        <td>{{ $item->product->title}}</td>
                        <td>{{ $item->comment }}</td>
                        <td>
                            <form action="{{ route('update.ReviewDisplay', $item->id) }}" method="post">
                                @csrf
                                <div>
                                    <select name="display" onchange="this.form.submit()">
                                        @foreach (\App\Models\reviews::getDisplayOptions() as $value => $label)
                                            <option value="{{ $value }}" {{ $item->display == $value ? 'selected' : '' }}> {{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Không cần button nữa -->
                            </form>
                        </td>
                       
                        <td>
                            <form action="{{route('review.destroy',$item)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this review?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            
                            
                        </td>
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="7">Not found</td>
                    </tr>
                    @endforelse
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    {{ $review->appends(request()->query())->links() }}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').keyup(function () {
                var query = $(this).val();
                if (query !== "") {
                    $.ajax({
                        url: "{{route('reviewsearchajax')}}",
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

</div>
@endsection
