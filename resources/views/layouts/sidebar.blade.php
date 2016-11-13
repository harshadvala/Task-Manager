<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img style="max-height: 45px"  src="{{asset('profiles/'.Auth::user()->image)}}"
                      onerror="this.src='{{asset('images/icon-user.png')}}'" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                    <p>Task Manager</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
            @endif
            <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->

        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>