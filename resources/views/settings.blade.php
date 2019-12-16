@include('Includes/topView')
<!DOCTYPE html>


<style>

.img{
    height:300px
    width:auto;/*maintain aspect ratio*/
    width: 300px;
}

</style>

<html>
<body>


<br>
<br>
<br>

@auth


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
            <form   action="{{ url('settings')}}" method="POST" class="form-horizontal"  enctype="multipart/form-data" >
                {{ csrf_field() }}
                    <fieldset>
                        <h2 class="text-center header">Settings</h2>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-12">
                                <textarea class="form-control" id="descripition" name="description" placeholder="{{$loadedUser->description}}" rows="7"></textarea>
                            <br>    
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            <div class="btn btn-dark btn-sm ">
                            <span>Select Profile</span>
                            <input id="imgInp" type="file" name="profile" />
                            </div>
                        
                                <br>
                                <br>
                                <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                            
                                    
                                <br>
                                <br>        
                               <img id="blah" class="rounded-circle img"
                                @if($loadedUser->ProfilePic != '/')src="{{url('uploads/ProfilePic/'.$loadedUser->ProfilePic)}}"@endif 
                                @if($loadedUser->ProfilePic == '/')src="https://via.placeholder.com/250"@endif 

                                alt="your image" />
                            
                            </div>
                        </div>




                        
                    </fieldset>
                </form>
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