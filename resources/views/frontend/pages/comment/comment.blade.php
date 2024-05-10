@extends('frontend.master')

@section('content')

<form action="{{ route('website.comment.update',$comment->id) }}" method="post">

    @csrf
    @method('put')
   
    <div class="form-group">
        <label for="text">Comment</label>
        <input value="{{$comment->text}}" type="text" class="form-control" id="text" name="text" placeholder="Add comment">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</form>
@endsection