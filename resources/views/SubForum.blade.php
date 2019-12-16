@include('Includes/topView')
<!DOCTYPE html>
<html>
<body>


<br>
<br>
<br>

<P class="TitleText">{{$thread->name}}</P>
<P class="blocktext"> {{$thread->info}}</P>


<br>
<br>
<div class="row justify-content-center">
  <div class="col-md-5 text-center my-auto">
@foreach($subThreads as $thread)



<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">{{$thread->Title}}</h5>
    <p class="card-text">{{substr($thread->Text, 0, 150)}} @if(strlen($thread->Text) > 150) . . .@endif</p>
    <a href="{{url('SubThread/'.$thread->id)}}" class="btn btn-dark">View Thread</a>
  </div>
  <div class="card-footer text-muted">
  Created at: {{$thread->created_at}}
  </div>
</div>


@endforeach
</div>
</div>
<div class="row justify-content-center">
  <div class="text-center my-auto">
{{ $subThreads->links() }}
</div>
</div>

<body>
</html>