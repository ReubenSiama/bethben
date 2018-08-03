@extends('layouts.app')

@section('content')
<form action="{{ URL::to('/') }}/updateProfile" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading">{{ Auth::user()->name }}</div>
            <div class="panel-body">
                <center>
                    @if(Auth::user()->profile_image == null)
                    <img src="{{ URL::to('/') }}/users/default.png" style="height:200px; width:200px; border-radius: 50%;" alt="">
                    @else
                    <img src="data:image/png;base64,{{ Auth::user()->profile_image }}" style="height:200px; width:200px; border-radius: 50%;" alt="">
                    @endif
                    <br><br>
                    <input type="file" name="image" id="profilePicture" class="form-control">
                </center>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                    <div class="col-md-8">
                        <input id="contact" type="contact" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ Auth::user()->contact }}" required>

                        @if ($errors->has('contact'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" value="Save" class="btn btn-success" style="border-radius:0px;">
            </div>
        </div>
    </div>
</form>
@endsection