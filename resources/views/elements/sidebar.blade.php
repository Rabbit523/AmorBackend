<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="imgs/user.jpg" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="user-name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</div>
                <div class="user-email">{{auth()->user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="{{url('users/logout')}}" id="sign_out"><i class="material-icons">input</i>{{ trans('translation.logout')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">                
                <li class="{{$title =='Home'?'active':''}}">
                    <a href="{{url('dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>{{ trans('translation.home')}}</span>
                    </a>
                </li>
                <li class="{{$title =='User'?'active':''}}">
                    <a href="{{url('manage_users')}}">
                        <i class="material-icons">group</i>
                        <span>{{ trans('translation.users')}}</span>
                    </a>
                </li>         
                <li class="{{$title =='Notice'?'active':''}}">
                    <a href="{{url('notice')}}">
                        <i class="material-icons">notifications</i>
                        <span>{{ trans('translation.notice')}}</span>
                    </a>
                </li>   
                <li class="{{$title =='Setting'?'active':''}}">
                    <a href="{{url('setting')}}">
                        <i class="material-icons">settings</i>
                        <span>{{ trans('translation.settings')}}</span>
                    </a>
                </li>                
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 -  <a href="javascript:void(0);">{{ trans('translation.admin_title')}}</a>
            </div>
            <div class="version">
                <b>{{ trans('translation.version')}}: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
