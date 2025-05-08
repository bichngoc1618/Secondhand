@extends('layouts.masteradm')
@section('container')
<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cooperation Unit</h3>
         

          <div class="box-tools">
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-custom success"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
          <div style="margin-right: 2rem" class="box-tools">
            <a href="{{ route('cooperation.create') }}" class="btn btn-sm btn-success">Add Category</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover text-center">
            <tr>
              <th>STT</th>
              <th>Name</th>
              <th>Logo</th>
              <th>Status</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
            @forelse ($cooperation as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                  @if ($item->logo)
                  <img src="{{ asset('assets/images/' . $item->logo) }}" alt="Image">

                  @else
                      No Image
                  @endif
                </td>
                 <td>{{ $item->visible }}</td>
                <td>
                    <form action="{{route('cooperation.destroy',$item)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                <td><a href="{{route('cooperation.edit',$item)}}"><i class="fas fa-edit"></i></a></td>
                
              
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
    
@endsection