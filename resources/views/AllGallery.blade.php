@include('Includes/topView')
<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.img-container{
  position:relative;
  display:inline-block;
}
.img-container .overlay{
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background:#000814;
  opacity:0;
  transition:opacity 500ms ease-in-out;
}

.img-container:hover .overlay{
  opacity:1;
}
.overlay span{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  color:#fff;
}

.img{
    width:  300px;
    height: 300px;
    background-position: 10% 10%;
    background-repeat:   no-repeat;
    background-size:     cover;
}
</style>
<html>


<body>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">

@foreach ( $Tags as $tag)
  <div class="img-container">
  <img  class= "img" src="{{$tag->ExPic}}">
  <div href="google.com" class="overlay">
    <a href="{{url('Tag/'.$tag->Tag)}}" class="overlay">
    <span >{{$tag->Tag}}</span>
    </a>
  </div>
</div>  
@endforeach


</div>
</div>
</div>
</body>
</html>