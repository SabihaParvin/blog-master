@extends('frontend.master')

@section('content')

<div class="container bg-white pt-5">

    <div class="row blog-item px-3 pb-5">

        <div class="col-md-5">
            <img class="img-fluid mb-4 mb-md-0" src="{{url('/uploads/'.$post->image)}}" alt=" Image">
        </div>
        <div class="col-md-7">
            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">{{$post->title}}</h3>
            <div class="d-flex mb-3">
                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i>{{$post->created_at->format('d-m-Y')}}</small>
                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> Comment</small>
            </div>
            <p>
                {{$post->content}}
            </p>

            <h6>Posted by {{$post->user->name}}</h6>

            <a href="{{route('comment.add',$post->id)}}" class="btn btn-link p-0">Comment</a>



        </div>
    </div>
    <div class="mt-4">
        <h4>Comments</h4>
        @foreach($post->comments as $comment)
        <div class="card mb-">
            <div class="card-body">
                <p>{{ $comment->text }}</p>
                <small class="text-muted">Commented by: {{ $comment->user->name }}</small>
                <small class="text-muted">Date: {{ $comment->created_at->format('d-m-Y') }}</small>
            <div>
                @auth
                    @if($comment->user_id === auth()->user()->id)
                <a href="{{route('website.comment.edit',$comment->id)}}" class="btn btn-link p-0">Edit</a>
                <a href="{{route('website.comment.delete',$comment->id)}}" class="btn btn-link p-0">Delete</a>
                @endif
                @endauth
            </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection