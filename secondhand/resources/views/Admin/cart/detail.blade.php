@extends('layouts.masteradm')

@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <div class="col-xs-12">
        <div class="box">
            <h1 class="box-title text-center">Order Details</h1>
            <div class="box-header">
               
            </div>
                
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover text-center">
                    <tr>
                        <th>STT</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    @php
                        $totalQuantity = 0;
                        $totalPrice = 0;
                    @endphp
                    @forelse ($order->order_detail as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> <img src="{{ asset('assets/images/' . $item->product->thumbnail) }}" alt="Image"></td>
                        <td>{{ $item->product_name}} {{$item->last_name}}</td>
                        <td>{{ $item->quantity}}</td>
                        <td>{{ $item->price }}</td>
                        @php
                            $totalQuantity += $item->quantity;
                            $totalPrice += $item->price;
                        @endphp
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Not found</td>
                    </tr>
                    @endforelse

                    @if ($order->order_detail->isNotEmpty())
                        <tr>
                           
                            <td colspan="2"><strong>Total Quantity:</strong> {{ $totalQuantity }}</td>
                            <td colspan="2"><strong>Total Price:</strong> {{ $totalPrice }}</td>
                        </tr>
                    @endif
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

@endsection
