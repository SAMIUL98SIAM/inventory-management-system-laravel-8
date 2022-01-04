<div class="wrapper row0">
    <div id="topbar" class="clear">
      <!-- ################################################################################################ -->
      <div class="fl_left">
        <ul class="nospace inline pushright">
          <li><i class="fa fa-phone"></i> {{$contact->mobile_no}}</li>
          <li><i class="fa fa-envelope-o"></i> {{$contact->email}}</li>
        </ul>
      </div>
      <div class="fl_right">
        <ul class="faico clear">
          <li><a class="faicon-facebook" href="{{$contact->facebook}}"><i class="fa fa-facebook"></i></a></li>
          <li><a class="faicon-twitter" href="{{$contact->twitter}}"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-youtube" href="{{$contact->youtube}}"><i class="fa fa-youtube"></i></a></li>
          <li><a class="faicon-linkedin" href="{{$contact->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
          <li><a class="faicon-google-plus" href="{{$contact->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
      <!-- ################################################################################################ -->
    </div>
</div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
<div class="wrapper row1">
    <header id="header" class="clear">
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="{{route('frontent.home')}}"><img src="{{!empty($logo->image)?url('/scripts/public/upload/logo_image/'.$logo->image):url('/upload/no_image.jpg/')}}" style="width: 100px; height:100px;" alt="IMG-LOGO"></a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="{{route('frontent.home')}}">Home</a></li>
          <li><a class="drop" href="#">Pages</a>
            <ul>
              <li><a href="{{route('frontent.gallary')}}">Gallery</a></li>
              <li><a href="">Full Width</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
</div>

