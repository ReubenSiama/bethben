<div class="panel panel-default" style="font-size: 0.8em;max-height:550px; overflow-y:hidden;">
    <div class="panel-heading">
        {{ $post->user->name }}
        @if(Request::is('myPosts'))
        <div class="btn-group pull-right">
            <a href="{{ URL::to('/myPosts') }}/edit/{{ $post->id }}" class="btn btn-success btn-xs">Edit</a>
            <button data-toggle="modal" data-target="#delete{{ $post->id }}" class="btn btn-danger btn-xs">Delete</button>
        </div>
        @endif
    </div>
    <div class="panel-body text-justify" style="max-height:300px; overflow-y:hidden">
        @if($post->file != null)
        <center>
            <img class="img img-thumbnail" style="height:100px; width:100px;" src="data:image/png;base64,{{ $post->file }}" alt="" >
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
        <center>
            <a href="{{ URL::to('/home') }}/view/{{ $post->id }}" class="btn btn-success btn-sm form-control" style="border-radius:0px; background-color:#e2c57a; border:none; color:black;">View Details</a>
        </center>
    </div>
</div>
<hr>

<!-- Modal -->
<div id="delete{{ $post->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <form action="{{ URL::to('/') }}/delete" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $post->id }}">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-radius:0px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger pull-left">Yes</button>  
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
            
        </form>
    </div>
</div>