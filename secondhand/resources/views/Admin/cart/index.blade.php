@extends('layouts.masteradm')

@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <div class="col-xs-12">
        <div class="box">
            <h1 class="box-title text-center">Cart List</h1>
            <div class="box-header">
                <form style="margin-right: 20rem"  action="{{ route('ordersearch') }}" method="POST" autocomplete="off" style="margin-bottom: 2rem" class="box-tools">
                    {{ csrf_field() }}
                    <div class="input-group input-group-sm hidden-xs" style="width: 15vw">
                        <input style="" type="text" name="query" id="searchInput" class="form-control pull-right" placeholder="Email">
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
                        <th>Phone</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Detail</th>
                        <th>Delete</th>
                    </tr>
                    @forelse ($order as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->first_name}} {{$item->last_name}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->city }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <form action="{{ route('update.orderStatus', $item->id) }}" method="post">
                                @csrf
                                <div>
                                    <select name="status" onchange="this.form.submit()">
                                        @foreach (\App\Models\Order::getStatusOptions() as $value => $label)
                                            <option value="{{ $value }}" {{ $item->status == $value ? 'selected' : '' }}> {{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Không cần button nữa -->
                            </form>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="{{route('order.edit',$item)}}"><i class="far fa-eye"></i>
                        </a></td>
                        <td>
                            <form action="{{ route('admin.orders.delete', ['order' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this order?')"><i class="fas fa-trash-alt"></i></button>
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
    {{ $order->appends(request()->query())->links() }}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').keyup(function () {
                var query = $(this).val();
                if (query !== "") {
                    $.ajax({
                        url: "{{route('ordersearchajax')}}",
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
