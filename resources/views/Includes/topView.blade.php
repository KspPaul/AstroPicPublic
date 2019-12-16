<!DOCTYPE html>
<html>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/gallery.css" rel="stylesheet">

@import url("https://fonts.googleapis.com/css?family=Josefin+Sans");


<style>

.navbar-inverse{
   border:10px  solid #343a40;
}

</style>


</head>
<body>

<nav class="navbar-inverse navbar-expand-lg fixed-top navbar-dark bg-dark">
	<div class="container-fluid">
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
 <div class="collapse navbar-collapse" id="navbarCollapse">
  <ul class="navbar-nav">
   <li class="nav-item">
  <a class="nav-link" href="{{url('/')}}"> home <i class="fa fa-btn fa-home"></i></a>

  </li>
  
  @auth
  <li class="nav-item">
      <a class="nav-link" href="{{url('user/'.$user->id)}}"> Account <i class="fa fa-btn fa-user"></i> </a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="{{url('/h/home')}}"> Following <i class="fa fa-btn fa-users"></i></a>
   </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{url('upload/')}}"> upload <i class="fa fa-btn fa-upload"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('settings')}}"> settings <i class="fa fa-btn fa-cog"></i></a>
  </li>
  <li class="nav-item">
   
      <a class="nav-link" href="{{url('Forum/post')}}"> new Forum Post <i class="fa fa-btn fa-plus"></i></a>
   
   </li>

@endauth
  
   <li class="nav-item">
      <a class="nav-link" href="{{url('Forum')}}"> Forum <i class="fa fa-btn fa-comments"> </i></a>
   </li>

   <li class="nav-item">
      <a class="nav-link" href="{{url('Gallery')}}"> Gallery <i class="fa fa-btn fa-image"> </i> </a>
   </li>
  
  @auth
  <li class="nav-item">
      <a class="nav-link" data-toggle="modal" data-target="#logout"> logout <i class="fa fa-btn fa-sign-out"></i></a>
    </li>
  @endauth
  @guest
    <li class="nav-item">
      <a class="nav-link" href="{{route('register')}}"> Register <i class="fa fa-btn fa-user-plus"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}"> Login  <i class="fa fa-btn fa-sign-in"></i></a>
    </li>
  @endguest
  
  </ul>






  <form   action="{{ url('search')}}" method="POST" class="form-horizontal"  enctype="multipart/form-data" >
	{{ csrf_field() }}      
<div class="input-group">
        <input type="text" class="form-control" id="search" placeholder="Search for users" name="search" required>
        <div class="input-group-btn">
        <button type="submit" class="btn btn-dark">
                <i class="fa fa-btn fa-search"></i> search
            </button>
        </div>
      </div>
    </form>

    </div>
 </div>
		</div>
</nav>
  @auth


  <div class="modal fade" id="logout" tabindex="5" role="dialog" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title center">You are about to  logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
      <a href= "{{route('logout')}}" class="btn btn-dark">logout</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  @endauth


</body>
