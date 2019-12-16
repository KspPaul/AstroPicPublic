@include('Includes/topView')
<!--@include('Includes/Sidebar') -->
<!DOCTYPE html>


<style>
.img{
    max-height:230px;
    max-width: 230px;

}

</style>

<html>
<link rel="stylesheet" type="text/css" href="css/BootUp.css">

<body>


<br>
<br>

<P class="TitleText"> {{$userName}}
<br>
<img id="blah" class="rounded-circle img"

@if($loadedUser->ProfilePic != '/')src="{{url('uploads/ProfilePic/'.$loadedUser->ProfilePic)}}"@endif 
@if($loadedUser->ProfilePic == '/')src="https://via.placeholder.com/250"@endif 


alt="your image" />
</P>


<P class="blocktext">{{$loadedUser->description}} </P>

<!-- add user Data -->
<div class="container">
    <div class="row justify-content-center">
    <button type="button" class="btn btn-dark btn-lg border" data-toggle="modal" data-target="#FollowerModel">Follower: {{count($Follower)}} </button>
    <button type="button" class="btn btn-dark btn-lg border"   data-toggle="modal" data-target="#FollowingModel">Subscribed: {{count($Following)}}</button>
    </div>
</div>



<div class="modal fade" id="FollowerModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Follower</h5>
      </div>
      <div class="modal-body">
        <div class="panel panel-primary" id="result_panel">
    <div class="panel-body">
        <ul class="list-group">
        @foreach ($Follower as $p)

        <a href="{{url('user/'.$p->MID)}}" class="list-group-item list-group-item-action">{{$p->MName}}</a>
        @endforeach
        </ul>
    </div>
</div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="FollowingModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Following</h5>
      </div>
      <div class="modal-body">
        <div class="panel panel-primary" id="result_panel">
    <div class="panel-body">
        <ul class="list-group">
        @foreach ($Following as $p)

        <a href="{{url('user/'.$p->FID)}}" class="list-group-item list-group-item-action">{{$p->FName}}</a>
        @endforeach
        </ul>
    </div>
</div>
      </div>
    </div>
  </div>
</div>



@auth
@if($checkN != 1)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-4">
            @if($checkN == 2)
            <form action="{{url('follow/'.$id)}}">
            <button class="btn btn-primary btn-success" type="submit">subscribe</button>
            </form>
            @endif
            @if($checkN == 3)
            <form action="{{url('unfollow/'.$id)}}">
            <button class="btn btn-primary btn-success" type="submit">unsubscribe</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endif

@endauth



<br>
<br>

<!--@include('Includes/ImageBox') -->
@include('Includes/SmallImageBox')
</body>
</html>