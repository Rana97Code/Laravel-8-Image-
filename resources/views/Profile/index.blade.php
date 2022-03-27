@extends('profile.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD with Image Upload Example from scratch - web-tuts.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('profile.create') }}"> Create New profile</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($profile as $profilem)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/Images/{{ $profilem->image }}" width="100px"></td>
            <td>{{ $profilem->name }}</td>
            
            <td>
                <form action="{{ route('profile.destroy',$profilem->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('profile.show',$profilem->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('profile.edit',$profilem->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $profile->links() !!}
        
@endsection