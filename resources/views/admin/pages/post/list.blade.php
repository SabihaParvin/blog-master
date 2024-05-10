@extends('admin.master')
@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <h4>Post list</h4>
            <h5><a class="btn-sm btn-success" href="{{route('post.form') }}">Add Post</a></h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Content </th>
                        <th scope="col">Date</th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $key => $post)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at}}</td>
                        <td>
                            <img style="border-radius: 300px;" width="20%" src="{{url('/uploads/'.$post->image)}}" alt="image">
                        </td>
                        <td>
                            
                            <a class="btn-sm btn-danger" href="{{route('post.delete',$post->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           

        </div>
    </div>
</div>

@endsection