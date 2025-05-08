@extends('layouts.masteradm')

@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <div class="col-xs-12">
        <div class="box">
            <h1 class="box-title text-center">Your Order</h1>
            <div class="box-header">
               
            </div>
                
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover text-center">
                    <tr>
                      
                        <th>Consignee Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Detail</th>
                      
                    </tr>
                    @forelse ($order as $item)
                        @if ($item->user_id == Auth::id())
                            <tr>
                               
                                <td>{{ $item->first_name}} {{$item->last_name}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <form action="{{ route('update.orderStatus', $item->id) }}" method="post">
                                        @csrf
                                        <div>
                                            <select name="status" disabled>
                                                @foreach (\App\Models\Order::getStatusOptions() as $value => $label)
                                                    <option value="{{ $value }}" {{ $item->status == $value ? 'selected' : '' }}> {{ $label }}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        <!-- Không cần button nữa -->
                                    </form>
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td><a href="{{route('order.edit',$item)}}"><i class="far fa-eye"></i></a></td>
                                
                            </tr>
                        @endif
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
