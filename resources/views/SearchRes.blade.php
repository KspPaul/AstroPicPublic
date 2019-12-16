@include('Includes/topView')
<!DOCTYPE html>
<html>

<body>

<br>
<br>
<br>
<P class="TitleText">Search Results for {{$Search}}</P>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">



                <div class="container">
                <h2>All Results </h2>
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                    <ul class="list-group" id="myList">
                @foreach ($allUsers as $users)
                
                  <li class="list-group" >
                  
                    <a href="{{url('user/'.$users->id)}}" class="list-group-item list-group-item-action">{{$users->name}}</a>
                  
                  </li>
                @endforeach
                    </ul>  
                </div>
        </div>
    </div>


</div>



<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>