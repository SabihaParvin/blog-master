@extends('admin.master')
@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <h4>Comment list</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Post</th>
                        <th scope="col">Text </th>
                        <th scope="col">Date</th>
                        <th scope="col">Last Updated </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $key => $comment)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->post->title }}</td>
                        <td>{{ $comment->text }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>{{ $comment->updated_at }}</td>
                        <td>
                            <a class="btn-sm btn-danger" href="{{route('comment.delete',$comment->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           

        </div>
    </div>
</div>

@endsection