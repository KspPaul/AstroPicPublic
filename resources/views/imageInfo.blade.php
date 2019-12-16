@include('Includes/topView')
<!DOCTYPE html>
<html>
<style>
img {
    max-width: 50%;
    max-height: 50%;
}
</style>
<body>
<br>
<br>
<br>
<P class="TitleText">{{$picture->imageName}}</P>
<p class="blocktext" ><a href="{{url('user/'.$postUser->id)}}" class="btn-dark btn-sm">{{$postUser->name}}</a>
</p>
<div class="text-center">
<div class="img">
<a href="{{url('uploads/images/'.$picture->imageNumber)}}">
<img src="{{url('uploads/images/'.$picture->imageNumber)}}" class="rounded">
</a>
</div>
</div>


@auth
<div class="text-center"> 
<form action="{{url('like/'.$picture->imageNumber)}}">
@if($x == true)
<button type="submit"class="btn btn-success">Unlike</button>
@endif
@if($x == false)
<button type="submit"class="btn btn-dark">Like</button>
@endif
</form>
@if($sameUser == true)
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#sure">delete image</button>


<div class="modal fade" id="sure" tabindex="-1" role="dialog" aria-labelledby="sure" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">You are about to delete this image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>There is no way to recover it after you have deleted it.</p>
      </div>
      <div class="modal-footer">
      <a href= "{{url('delete/'.$picture->imageNumber)}}" class="btn btn-danger">delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@endif
</div>
@endauth


<P class="blocktext">{{$picture->longInfo}}</P>


<div class="container">

<div class="center">
<ul class="list-group">
  <li class="list-group-item list-group-item-dark"><strong> <i class="fa fa-thumbs-up"></i></strong> {{$picture->Votes}}
  <li class="list-group-item list-group-item-dark"><strong>Uploaded:</strong>   {{$picture->created_at}}</li>
  <li class="list-group-item list-group-item-dark"><strong>Telescope:</strong> {{$picture->telescope}}</li>
  <li class="list-group-item list-group-item-dark"><strong>Object:</strong> {{$picture->object}}</li>

@if($picture->info != " ") 
  <li class="list-group-item list-group-item-dark"><strong>Additional Info:</strong> {{$picture->info}}</li>
@endif
  
  <li class="list-group-item list-group-item-dark"><strong>ISO , exposure:</strong> {{$picture->ISO}}, {{$picture->exposure}}s</li>
  @if($picture->ObjectsIN != "")<li class="list-group-item list-group-item-dark"><strong>Tags:</strong> {{$picture->ObjectsIN}} </li>
  @endif
  
</li>
  </ul>
  <br>

@if($picture->SubID != 0)

<P class="blocktext">Picture with overlay:</P>
<div class="text-center">
<div class="img">
<img src="{{'http://nova.astrometry.net/annotated_display/'.$picture->SubID}}"class="rounded">

<!--
<P class="blocktext">SkyPosition:</P>
<img src="{{'http://nova.astrometry.net/sky_plot/zoom1/'.$picture->SubID}}"class="rounded">
--></div>

</div>
@endif

@auth
  <form   action="{{ url($picture->id.'/comment')}}" method="POST" class="form-horizontal"  enctype="multipart/form-data" >
                {{ csrf_field() }}
                    <fieldset>
                        <legend class="text-center header">Comment section</legend>

                        <div class="form-group">                            <div class="col-md-12">
                                <textarea maxlength="2500" class="form-control" id="comment" name="comment" placeholder="Enter your comment here" rows="3"></textarea>
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
  <div class="card-header text-center">
  <a class="nav-link active" href="{{url('user/'.$comment->userID)}}">{{$comment->userName}}</a>

  @auth
  @if($comment->userID == \Auth::id())
  <a href="{{url('deleteComment/P/'.$comment->id)}}" class="btn btn-danger btn-sm">delete</a>
  @endif
  @endauth
  </div>
  <div class="card-body text-center ">
    <p class="card-text">@php
          $Parsedown = new Parsedown();
          $Parsedown->setSafeMode(true);
          echo $Parsedown->text($comment->comment); 
                  
      @endphp</p>
  </div>
  <div class="card-footer text-muted text-center">
  Created at: {{$comment->created_at}}
  </div>
</div>
@endforeach

</div>
</div>
</body>
</html>