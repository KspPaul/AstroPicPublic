@include('Includes/topView')
<!DOCTYPE html>
<html>
<body>
<br>
<br>
<br>
<P class="TitleText">Forum</P>
<P class="blocktext">This is the Forum. Here you can talk 
about anything related to astrophotography, but please 
make sure to post into the right sub thread.</P>




<div class="row justify-content-center">
  <div class="col-md-5 text-center my-auto">

@foreach($threads as $thread)

<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">{{$thread->name}}</h5>
    <p class="card-text">{{$thread->info}}</p>
    <a href="{{url('Forum/'.$thread->id)}}" class="btn btn-dark">View Threads</a>
  </div>
  <div class="card-footer text-muted">
    {{$thread->SubThreadCount}} Threads
  </div>
</div>




@endforeach

</div>
</div>

<body>
</html>