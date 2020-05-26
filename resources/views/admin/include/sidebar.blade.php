<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                @if(isset($myProfile))
                    @if($myP->admin_img != '')
                        <img src="{{ asset($myP->admin_img) }}" alt=""/>
                    @else
                        <img src="{{ asset('backendAssets/img/avatar5.png') }}" alt=""/>
                    @endif
                @else
                    <img src="{{ asset('backendAssets/img/avatar5.png') }}" class="img-circle" alt="User Image" />
                @endif
                </div>
                <div class="pull-left info">
                    <p>Hello, Admin</p>

                    <a href="javascript: ;"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="{{ route('admin.home') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <!-- category -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list"></i>
                        <span>Category</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin-category.index') }}"><i class="fa fa-angle-double-right"></i>View Category</a></li>
                       
                    </ul>
                </li>
                <!-- Question -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-question"></i>
                        <span>Question</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin-question.index') }}"><i class="fa fa-angle-double-right"></i>View Question</a></li>
                       
                    </ul>
                </li>
                <!-- Question -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>Options Label</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin-option.index') }}"><i class="fa fa-angle-double-right"></i>View Options</a></li>
                       
                    </ul>
                </li>
                <!-- Category Question -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span>Categories Questions</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin-cateques.index') }}"><i class="fa fa-angle-double-right"></i>View Category questions</a></li>
                       
                    </ul>
                </li>
                <!-- Free Legal Docx -->
                <!-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file"></i>
                        <span>Free Legal Documents</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin-freelegaldoc.index') }}"><i class="fa fa-angle-double-right"></i>View Legal Documents</a></li>
                       
                    </ul>
                </li> -->
                 <!-- Banner -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-picture-o"></i>
                        <span>Banner</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/banner') }}"><i class="fa fa-angle-double-right"></i>View Banner</a></li>
                       
                    </ul>
                </li>
                 <!-- Testimonials -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-comment"></i>
                        <span>Testimonials</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/testimonials') }}"><i class="fa fa-angle-double-right"></i>View Testimonials</a></li>
                       
                    </ul>
                </li>
                <!-- How it works -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pencil"></i>
                        <span>Home "How It Works"</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/howitwork') }}"><i class="fa fa-angle-double-right"></i>View Works Section</a></li>
                       
                    </ul>
                </li>
                <!-- How its works page details -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-paperclip"></i>
                        <span>How It Works Page</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/how-it-works/1') }}"><i class="fa fa-angle-double-right"></i>View How it Works</a></li>
                    </ul>
                </li>
                <!-- Behind Propandas -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-eye"></i>
                        <span>Behind Propandas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/behindpropandas') }}"><i class="fa fa-angle-double-right"></i>View Works Section</a></li>
                    </ul>
                </li>
                <!-- About Us -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>About Us</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin-about.index') }}"><i class="fa fa-angle-double-right"></i>View About</a></li>
                    </ul>
                </li>
                <!-- Legal Info -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i>
                        <span>Legal Info</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/legal-info/1') }}"><i class="fa fa-angle-double-right"></i>View Legal Info</a></li>
                    </ul>
                </li>
                <!-- terms -->
                <!-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pencil-square"></i>
                        <span>Terms</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/terms/1') }}"><i class="fa fa-angle-double-right"></i>View Terms</a></li>
                    </ul>
                </li> -->
                
                <!-- Free Profile Details -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Profile</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin-profile.index') }}"><i class="fa fa-angle-double-right"></i>View Profile</a></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="fa fa-angle-double-right"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
