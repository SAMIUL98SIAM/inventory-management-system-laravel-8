@extends('frontend.layouts.master')

@section('slider')
@include('frontend.layouts.slider')
@endsection

@section('content')
<div class="wrapper coloured">
    <section id="cta" class="clear">
      <!-- ################################################################################################ -->
      <div class="three_quarter first">
        <h2 class="uppercase nospace">Fusce quis feugiat urna dui leo egestas augue</h2>
        <p class="nospace">Aenean semper elementum tellus, ut placerat leo. Quisque vehicula, urna sit amet pulvinar dapibus.</p>
      </div>
      <div class="one_quarter"><a class="btn" href="#">Malesuada risus</a></div>
      <!-- ################################################################################################ -->
    </section>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row3">
    <main class="container clear center">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <article class="one_quarter first">
        <h2>Curabitur hendrerit nunc rhoncus</h2>
        <p class="btmspace-30">Nisi neque lacinia eros, ut facilisis erat est hendrerit neque. Duis eget accumsan duis efficitur.</p>
        <p class="nospace"><a class="btn" href="#">Eget fermentum</a></p>
      </article>
      <article class="one_quarter"><i class="icon circle btmspace-50 fa fa-life-ring"></i>
        <h4 class="font-x1"><a href="#">Phasellus eget pharetra</a></h4>
        <p>Sagittis dolor rutrum non etiam vestibulum nisi vulputate eros feugiat eu varius.</p>
      </article>
      <article class="one_quarter"><i class="icon circle btmspace-50 fa fa-legal"></i>
        <h4 class="font-x1"><a href="#">Sed et blandit elit</a></h4>
        <p>Donec eleifend mi dolor, eget commodo nibh venenatis sed vitae nisi malesuada.</p>
      </article>
      <article class="one_quarter"><i class="icon circle btmspace-50 fa fa-cogs"></i>
        <h4 class="font-x1"><a href="#">In rhoncus lectus nisi</a></h4>
        <p>Suspendisse potenti sed aliquam sagittis placerat morbi varius est finibus.</p>
      </article>
      <!-- ################################################################################################ -->
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <section class="container clear">
      <!-- ################################################################################################ -->
      <div class="one_third first"><a href="#"><img src="{{asset('/frontend/images/demo/500x700.png')}}" alt=""></a></div>
      <div class="two_third">
        <p class="nospace btmspace-15 capitalise">Aenean nisl tortor vehicula sit amet fermentum vitae elementum.</p>
        <h2 class="uppercase btmspace-50">Curabitur mattis nisl quis<br>
          <em class="font-x3">molestie pretium sed</em></h2>
        <p>Nam iaculis ex justo, auctor sodales velit eleifend eu. Donec tincidunt venenatis metus, vel cursus erat suscipit in. Maecenas ultricies enim laoreet accumsan ultricies. Nullam ac sapien dui. Cras sollicitudin ligula eu gravida aliquet. Donec eget ex congue, aliquam justo ut, ullamcorper sem. Aenean non ipsum vitae risus posuere iaculis.</p>
        <p class="btmspace-30">Nam a tempus sem. Suspendisse pulvinar quis tortor non consequat. Aliquam a pellentesque neque, nec vehicula velit. Aliquam porta eros vel sem euismod, et convallis mi venenatis. Duis suscipit felis a sagittis viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
        <p class="nospace"><a class="btn" href="#">Aenean vitae mauris</a></p>
      </div>
      <!-- ################################################################################################ -->
      <div class="clear"></div>
    </section>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row3">
    <figure class="container clear center figline">
      <!-- ################################################################################################ -->
      <ul class="nospace inline pushright">
        <li><a href="#"><img src="{{asset('/frontend/images/demo/180x50.png')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('/frontend/images/demo/180x50.png')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('/frontend/images/demo/180x50.png')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('/frontend/images/demo/180x50.png')}}" alt=""></a></li>
        <li><a href="#"><img src="{{asset('/frontend/images/demo/180x50.png')}}" alt=""></a></li>
      </ul>
      <!-- ################################################################################################ -->
    </figure>
</div>
@endsection
