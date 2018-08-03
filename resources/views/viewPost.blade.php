@extends('layouts.app')

@section('content')

<div class="col-md-6 col-md-offset-3">
    @include('layouts.paritals.post',['post'=>$post])
</div>

@endsection