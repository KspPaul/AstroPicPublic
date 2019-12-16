@include('Includes/topView')
<!DOCTYPE html>
<html>
<body>

<br>
<br>
<br>
@auth
<P class="TitleText">Create a Forum post</P>
<P class="blocktext"> Here you can select a Forum and Post in it</P>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
<form   action="{{ url('postForum')}}" method="POST" class="form-horizontal"  enctype="multipart/form-data" >
{{ csrf_field() }}
  
  
  <div class="form-group">
    <label for="Title" class="col-sm-3 control-label">Title: </label>

    <div class="col-sm-06">
        <input type="text" name="name" id="picture-name" class="form-control" required>
    </div>


  <div class="form-group">
    <label for="picture-object">Please select a Thread to post in</label>
    <select class="form-control" name="Thread" id="picture-object">
      @foreach($MainThreads as $MT)
      <option>{{$MT->name}}</option>
      @endforeach
    </select>
  </div>


  <div class="form-group">
    <label for="text">Text</label>
    <textarea class="form-control" name="Text" id="text" rows="3" required></textarea>
  </div>
</form>



<div class="container">
    <div class="row justify-content-center">
            <button type="submit" class="btn btn-dark">
                <i class="fa fa-btn fa-plus"></i>Add thread
            </button>
        </div>
    </div>

</div>
</div>
</div>
@endauth
@guest


<div class="alert alert-danger">
  <strong>Warning!</strong> You have to login first before uploading a image! 
        <br>
        <a href="{{ route('login') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Register</a>
</div>


@endguest



</body>
</html>