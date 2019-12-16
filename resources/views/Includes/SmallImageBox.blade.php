
<head>
    <link href="/css/SmallBox.css" rel="stylesheet">
</head>


@if(count($picture) == 0)

<div class="row justify-content-center">
  <div class="col-md-5 text-center my-auto">
        <span class="fa-stack fa-4x">
            <i class="fa fa-btn fa-times"></i>
          </span>
          <h4 class="service-heading">No Pics found</h4>
          <p>Sorry we couldn't find any pictures</p>
          <br>
  </div>
 </div>

@endif
<div class="container">
    <div class="row justify-content-center">

@foreach ($picture as $p)

    
        <a class="link" href="{{url('image/'.$p->imageNumber)}}">
            <div class="gallery rounded" style="background:url({{url('uploads/images/'.$p->imageNumber)}}); background-size: cover;">
                <a class="link" href="{{url('image/'.$p->imageNumber)}}">

                    <div class="edit rounded">
                        <p class="text-light center htitle">{{ $p->imageName }}</p>
                        <p class="text over center"><i class="fa fa-camera"></i>: {{$p->telescope}} </p>
                        <hr>
                        <p class="text over center"><i class="fa fa-binoculars"></i>: {{$p->object}}</p>
                        <hr>
                        <p class="text over center"><i class="fa fa-calendar"></i>: {{$p->created_at}}</p>
                        <hr>
                        <p class="text over center">
                        <i class="fa fa-info"></i>: {{substr($p->longInfo, 0, 150)}} @if(strlen($p->longInfo) > 150) . . . @endif
                        </p>
                    </div>
                </a>

            </div>
    

@endforeach
</div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
{{ $picture->links() }}
</div>
</div>


</body>

</html>