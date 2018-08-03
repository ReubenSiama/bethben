<li class="list-group-item clearfix">
    <div class="col-md-2 col-xs-4 pull-left">
        <center>
            @if($comment->user->profile_image == null)
                <img style="height:50px; width:50px; border-radius:50%;" src="{{ URL::to('/') }}/users/default.png" alt="" class="img img-responsive img-thumbnail">
            @else
                <img style="height:50px; width:50px; border-radius:50%;" src="data:image/png;base64, {{ $comment->user->profile_image }}" alt="" class="img img-responsive img-thumbnail">
            @endif
            {{ $comment->user->name }}
        </center>
    </div>
    <div class="col-md-10 col-xs-8 pull-right" style="background-color: #bfe2f2; padding:8px; border-radius:2px;">
        {{ $comment->content }}<br>
        <p class="pull-right">- {{ $comment->created_at->diffForHumans() }}</p>
    </div>
        <br><br><br>
</li>