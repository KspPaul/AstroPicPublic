@include('Includes/topView')
<!DOCTYPE html>
<html>

<body>
@Auth

@if($user->location != 'toAdd')

    <a class="weatherwidget-io" href="https://forecast7.com/en/40d71n74d01/new-york/" data-label_1="{{$userData->location}} " data-label_2="WEATHER" data-theme="pure" >NEW YORK WEATHER</a>
    <script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>
@endif
@else

<div class="alert alert-danger">
  <strong>Warning!</strong> You haven't set a location yet
</div>

@endelse
@endAuth
</body>
</html>