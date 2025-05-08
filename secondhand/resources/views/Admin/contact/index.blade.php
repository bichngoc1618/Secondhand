@extends('layouts.masteradm')

@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <div class="col-xs-12">
        <div class="box">
            <h1 class="box-title text-center">Contact List</h1>
            <div class="box-header">
               
              
                
            </div>
                
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover text-center">
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Feedback</th>
                        <th>Delete</th>
                    </tr>
                    @forelse ($contact as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->feedback }}</td>
                       
                       
                        <td>
                            <form action="{{route('contact.destroy',$item)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this contact?')"><i class="fas fa-trash-alt"></i></button>
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
    {{ $contact->appends(request()->query())->links() }}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  

</div>
@endsection
