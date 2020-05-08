<section class="top-header">
   <div class="container">
      <div class="row">
         <div class="col-6 col-md-6 col-sm-6">
            <ul class="social-tab">
               <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-xing" aria-hidden="true"></i></a></li>
            </ul>
         </div>
         <div class="col-6 col-md-6 col-sm-6">
            <div class="top-info">
               <ul>
               <li class="profile-dropdown">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  @guest
                  <a href="{{ route('login') }}" >Login</a>
                  @else
                  {{ Auth::user()->name }}

                 

                  <ul class="dropdown-profile">
                     <li><a href="{{ route('dashboard') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Dashboard</a></li>                  
                     <li>
                        <a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                     </li>
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
               </ul>
               <div class="lang-part">
                  <!-- <div id="google_translate_element" ></div> -->
                      <select class="selectpicker" data-width="fit">
                         <option data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                       <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>Español</option>
                     </select> 
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--  end top-header -->
<section class="header-menu">
   <div class="container">
      <div class="row">
         <div class="col-6 col-sm-6 logo-sec">
            <a href="{{ url('/') }}"><img src="{{ asset('frontAssets/images/logo.png') }}" class="img-fluid lg-image " alt="logo-image"></a>
         </div>
         <div class=" col-6 col-sm-6 nv-menu">
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
               <li><a href="{{ url('/about-us') }}">About</a></li>
               <li><a href="javascript: ;">Info</a></li>
               <li><a href="javascript: ;">Contact</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- end header-menu -->