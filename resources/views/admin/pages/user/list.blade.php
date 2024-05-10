@extends('admin.master')
@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <h4>User list</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone </th>
                        <th scope="col">Role</th>
                        <th scope="col">Image </th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_no }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <img style="border-radius: 300px;" width="20%" src="{{url('/uploads/'.$user->image)}}" alt="image">
                        </td>
                        <td>{{ $user->Address}}</td>
                        <td>
                        <a class="btn-sm btn-warning" href="{{route('users.edit',$user->id)}}">Edit</a>
                            <a class="btn-sm btn-danger" href="{{route('users.delete',$user->id)}}">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           

        </div>
    </div>
</div>

@endsection