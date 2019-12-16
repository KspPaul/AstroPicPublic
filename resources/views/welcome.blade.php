@include('Includes/topView')
<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="css/Welcome.css">
<body>

  <!-- Services -->
  <section class="page-section" id="services">
  <div class="bg">
  
  <br>
  <br>
  <br>
    <div class="container color" >
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="section-heading text-uppercase color  font-weight-bold">  Astrobucket</h1>
          <p class="section-subheading  color">Your place for Astrophography</p>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-btn fa-image"></i>
          </span>
          <h4 class="service-heading"><strong>No Compression</strong></h4>
          <p style="font-size:15px;">We store your pictures without compressing them, so that you can enjoy them 
          in their whole glory</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-btn fa-comment"></i>
          </span>
          <h4 class="service-heading"><strong>Community</strong></h4>
          <p style="font-size:15px;">With a Forum and the ability to comment, it is easy to connect with other people</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-btn fa-database"></i>
          </span>
          <h4 class="service-heading"><strong>Web Security</strong></h4>
          <p style="font-size:15px;">With state-of-the-art technology we ensure you that your data is safe</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-btn fa-info"></i>
          </span>
          <h4 class="service-heading"><strong>Information Storage</strong></h4>
          <p style="font-size:15px;">Store all the Image Information you need about your images</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-btn fa-search"></i>
          </span>
          <h4 class="service-heading"><strong>Astrometry</strong></h4>
          <p style="font-size:15px;">With the help of Astrometry.net we detect all Deep-sky object in 
          your picture</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-btn fa-thumbs-up"></i>
          </span>
          <h4 class="service-heading"><strong>Continual improvement</strong></h4>
          <p style="font-size:15px;">By Continual improvement we make Astrobucket better each day</p>
        </div>
      </div>     
    </div>


@guest
        <div class="col-lg-12 text-center">
                  <a class="btn btn-secondary btn-xl text-uppercase js-scroll-trigger" href="{{url('login')}}">Sign In</a>
        </div>
@endguest
  </section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>