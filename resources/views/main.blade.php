@include('Includes/topView')
<!DOCTYPE html>
<html>

<body>

<br>
<br>
<br>
<P class="TitleText"> Following </P>
<P class="blocktext">All Pictures of the people you are following </P>


@if($picture != null)
@include('Includes/ImageBox')
@endif
</body>
</html>