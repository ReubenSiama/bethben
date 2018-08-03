<!DOCTYPE html>
<html lang="en">
<head>
  <title>BethBen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" style="border-radius:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">BethBen</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/home">Home</a></li>
        <li class="{{ Request::is('myPosts') ? 'active' : '' }}"><a href="/myPosts">Posts</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="{{ Request::is('myProfile') ? 'active' : '' }}"><a href="/myProfile"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
@yield('content')

</body>
</html>
