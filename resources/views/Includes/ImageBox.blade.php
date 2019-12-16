

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
@foreach ($picture as $p)

<div class="container py-1">

    <div class="card">
      <div class="row ">
        <div class="col-md-4" style="background:url({{url('uploads/images/'.$p->imageNumber)}}); background-size: cover;">    
          </div>
          <div class="col-md-8 px-9">
            <div class="card-block px-3">
              <h4 class="card-title ">{{ $p->imageName }}</h4>{{substr($p->longInfo, 0, 150)}} @if(strlen($p->longInfo) > 150) . . . @endif
              <p class="card-text"></p>
          <ul class="list-group list-group">
            <li class="list-group-item">Telescope, Camera: {{$p->telescope}} </li>
            <li class="list-group-item">Object type: {{$p->object}} </li>
          </ul>
              <br>
              <a href= "{{url('image/'.$p->imageNumber)}}" class="btn btn-dark">More Info</a>
              <a href= "{{url('user/'.$p->user_ID)}}" class="btn btn-dark">User</a>
              <br>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endforeach
<div class="container">
    <div class="row justify-content-center">
{{ $picture->links() }}
</div>
</div>