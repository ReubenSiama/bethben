<div class="panel panel-default" style="font-size: 0.8em;">
    <div class="panel-heading">
        {{ $post->user->name }}
    </div>
    <div class="panel-body text-justify">
        @if($post->file != null)
        <center>
            <img class="img img-thumbnail" style="height:100%; width:100%;" src="data:image/png;base64,{{ $post->file }}" alt="" >
        </center>
        @endif
        <br>
        {!! $post->content !!}<br>
            <p class="pull-right">Posted By: <b>{{ $post->user->name }} at <small>{{ $post->created_at->format('d-m-Y') }}</small></b></p>
    </div>
    <div class="panel-footer">
        <form action="{{ URL::to('/') }}/like" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn btn-success btn-xs" style="border-radius:0px;"><span class="glyphicon glyphicon-thumbs-up"></span></button>
            Likes: {{ count($post->like) }}
        </form>
        <hr>
        <form method="POST" action="{{ URL::to('/') }}/addComment">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $post->id }}">
            <div class="form-group clearfix">
                <div class="col-md-10">
                    <textarea name="content" id="" class="form-control" cols="30" rows="2" style="border-radius:0" placeholder="Your comments goes here"></textarea>
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Comment" class="btn btn-success btn-xs" style="border-radius:0px;">
                </div>
            </div>
        </form>
        <hr>
        <b>Comments:</b>
        <br>
        <ul class="list-group">
        @foreach($post->comment->sortBy('created_at',  SORT_REGULAR,  true) as $comment)
            @include('layouts.paritals.comments',['comment'=>$comment])
        @endforeach
        </ul>
    </div>
</div>
<hr>
