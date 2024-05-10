@extends('admin.master')

@section('content')

<h1>Edit your user</h1>

<form action="{{route('users.update',$users->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="container bg-light col-md-5 pd-4 py-3 card shadow">
        <div class="form-group">
            <label>Name</label>
            <input value="{{$users->name}}" type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input value="{{$users->phone_no}}" type="integer" class="form-control" id="exampleInputphone1" name="phone" placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="{{$users->email}}" type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="address" class="form-control" id="exampleInputaddress1" name="address" placeholder="address">
        </div>
        <div class="form-group">
            <label for="image">Upload Image </label>
            <input name="image" type="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection