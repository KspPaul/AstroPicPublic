@include('Includes/topView')
<!DOCTYPE html>
<html>
<body>
<br>
<br>
<br>
<P class="TitleText">{{$post->Title}}</P>
<div class="row justify-content-center">
  <div class="col-md-5 text-center my-auto">
<p class="blocktext" ><a href="{{url('user/'.$Puser->id)}}" class="btn btn-dark btn-sm">User: {{$Puser->name}}</a>

@if($isSame)
  <button type="button" class="btn btn-danger btn-sm"   data-toggle="modal" data-target="#sure">delete post</button>
@endif


<div class="modal fade" id="sure" tabindex="-1" role="dialog" aria-labelledby="sure" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">You are about to delete this post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>There is no way to recover it after you have deleted it.</p>
      </div>
      <div class="modal-footer">
      <a href= "{{url('deleteF/'.$post->id)}}" class="btn btn-danger">delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="card-body">
@php
          $Parsedown = new Parsedown();
          $Parsedown->setSafeMode(true);
          echo $Parsedown->text($post->Text); 
                  
@endphp
</div>

</div>
</div>
<br>




<div class="row justify-content-center">
  <div class="col-md-5 text-center my-auto">
@auth
  <form   action="{{ url('Forum/comment/'.$post->id)}}" method="POST" class="form-horizontal"  enctype="multipart/form-data" >
                {{ csrf_field() }}
                    <fieldset>
                        <legend class="text-center header">Comment section</legend>

                        <div class="form-group">                            <div class="col-md-12">
                                <textarea class="form-control" id="comment" name="comment" placeholder="Enter your comment here" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
  </form>
@endauth
@guest 
<div class="alert alert-danger">
  <strong>Warning!</strong> You have to login first before commenting! 
        <br>
        <a href="{{ route('login') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Register</a>
</div>
@endguest



@foreach($comments as $comment)
<div class="card">
  <div class="card-header">
  <a class="nav-link active" href="{{url('user/'.$comment->userID)}}">{{$comment->userName}}</a>
   @if($comment->userID == \Auth::id())
  <a href="{{url('deleteComment/F/'.$comment->ID)}}" class="btn btn-danger btn-sm">delete</a>
  @endif
  </div>
  
  <div class="card-body">
    <p class="card-text">
       @php
          $Parsedown = new Parsedown();
          $Parsedown->setSafeMode(true);
          echo $Parsedown->text($comment->text);                 
      @endphp
    </p>
  </div>
  <div class="card-footer text-muted">
  Created at: {{$comment->created_at}}
  </div>
</div>
@endforeach


</div>
</div>
</body>
</html>