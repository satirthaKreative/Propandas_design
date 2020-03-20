<section class="top-header">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6">
            <ul class="social-tab">
               <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-xing" aria-hidden="true"></i></a></li>
            </ul>
         </div>
         <div class="col-md-6 col-sm-6">
            <ul class="top-info">
               <li class="profile-dropdown">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  @guest
                  <a href="{{ route('login') }}" >Login</a>
                  @else
                  {{ Auth::user()->name }}

                 

                  <ul class="dropdown-profile">
                  <!-- <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Profile</a></li> -->                  
                  <li><a  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  </ul>
                  @endguest
                 
                     
                     <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form> -->
                    <!--  <li> <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a></li> -->
                  


               </li>
               <li>
                  <div class="dropdown lng-link">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     language
                     </a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#"><span><img src="{{ asset('frontAssets/images/uk-flag.jpg') }}" alt="flag" width="15"></span>English</a>
                        <a class="dropdown-item" href="#"><span><img src="{{ asset('frontAssets/images/german-flag.jpg') }}" alt="flag" width="15"></span>German</a>               
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!--  end top-header -->
<section class="header-menu">
   <div class="container">
      <div class="row">
         <div class="col-xs-6 col-sm-6 logo-sec">
            <a href="index.php"><img src="{{ asset('frontAssets/images/logo.png') }}" class="img-fluid lg-image " alt="logo-image"></a>
         </div>
         <div class=" col-xs-6 col-sm-6 nv-menu">
            <div class="hamburger">
               <div class="hm-icon">
                  <span></span> <span></span> <span></span>
               </div>
            </div>
            <ul class="menu_side">
               <div class="close-icon">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
               <li><a href="{{ url('/') }}">Home</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="#">Info</a></li>
               <li><a href="#">Contact</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- end header-menu -->