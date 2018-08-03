@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="hidden col-md-6 col-md-offset-3">
            <form action="{{ URL::to('/') }}/addPost" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="panel panel-success">
                    <div class="panel-heading">New Status</div>
                    <div class="panel-body">
                        <textarea required name="content" id="" class="form-control" rows="3"></textarea><br>
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="panel-footer">
                        <button>Post</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-md-offset-3">
            @foreach($posts as $post)
                @include('layouts.paritals.posts',['post'=>$post])
            @endforeach
        </div>
    </div>
</div>
@endsection
