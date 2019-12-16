@include('Includes/topView')
<!DOCTYPE html>
<html>
<body>

<br>
<br>
<br>
@auth
<P class="TitleText">Image Upload</P>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
<form   action="{{ url('upload')}}" method="POST" class="form-horizontal"  enctype="multipart/form-data" >
{{ csrf_field() }}
  
  
  <div class="form-group">
    <label for="picture-name" class="col-sm-3 control-label">Title: </label>

    <div class="col-sm-06">
        <input type="text" name="name" id="picture-name" class="form-control" value="{{ old('name') }}"required>
    </div>
 </div>
 

 <div class="form-group">
    <label for="picture-telescope" class="col-sm-3 control-label">Telescope & Camera: </label>

    <div class="col-sm-06">
        <input type="text" name="telescope" id="picture-telescope" class="form-control" required>
    </div>
 </div>

  <label for="picture-telescope" class="col-sm-7 control-label">Iso and exposure(empty if unknown): </label>
  <div class="form-row">
    <div class="col">
      <input type="text" id="iso" name="iso" class="form-control" placeholder="ISO value">
    </div>
    <div class="col">
      <input type="text" id="exp" name="exp" class="form-control" placeholder="exposure">
    </div>
  </div>

 <div class="form-group">
    <label for="picture-info" class="col-sm-3 control-label">Other Camera Information</label>

    <div class="col-sm-06">
        <input type="text" name="info" id="picture-info" class="form-control">
    </div>
 </div>


  <div class="form-group">
    <label for="picture-object">Please select an object</label>
    <select class="form-control" name="object" id="picture-object">
      <option>please select a object type</option>
      @foreach ($tags as $tag)
          <option>{{$tag->Tag}}</option>
      @endforeach
    </select>
  </div>


  <div class="form-group">
    <label for="picture-description">Description</label>
    <textarea class="form-control" name="description" id="picture-description" rows="3"  required></textarea>
  </div>
   
  <br>

<div class="row justify-content-center">
  <div class="col-md-5 text-center my-auto">

  
    <div class="file-field">
    <div class="btn btn-dark btn-sm float-left">
      <span>Select Image</span>
      <input id="imgInp" type="file" name="logo" required/>
    </div>
  </div>

  <br>
  <br>
  <br>
  <br>
  

    <div class="form-group">
        
            <button type="submit" id="submit" class="btn btn-danger">
                <i class="fa fa-btn fa-plus"></i>Upload picture
            </button>
        
        <br>
        <p>Image Preview: </p>
          <img id="blah" class="img-thumbnail" src="https://via.placeholder.com/150" alt="your image" />
    </div>
</div>
</div>
</form>

@endauth
@guest


<div class="alert alert-danger">
  <strong>Warning!</strong> You have to login first before uploading a image! 
        <br>
        <a href="{{ route('login') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Register</a>
</div>

</div>
</div>
</div>

@endguest

<script>
function readURL(input) {

  




  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>

</body>
</html>