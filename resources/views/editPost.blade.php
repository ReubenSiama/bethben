@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ URL::to('/') }}/updatePost" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="panel panel-success">
                    <div class="panel-heading">Edit Status ( {{ count($post->like) }} likes)</div>
                    <div class="panel-body">
                        <textarea required name="content" id="" class="form-control" rows="10">{{ $post->content }}</textarea><br>
                        <img class="img img-thumbnail" style="height:100%; width:100%;" src="data:image/png;base64,{{ $post->file }}" alt="" >
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="panel-footer">
                        <button>Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
