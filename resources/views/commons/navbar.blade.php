<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        
        <a class="navbar-brand" href="/">TODOBoard</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            
            <ul class="navbar-nav">
    
                @if (Auth::check())
                <!--Userを点検して　LogInしているかどうかを調べる関数 LogInしている場合-->
                    <li class="nav-item"><a href="#" class="nav-link">Users</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="#">My profile</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
    
                @else
                    <!--元から　LogOut状態のときのみ-->
                    <!--User登録　Link　-->
                    <li class="nav-item">
                        {!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}
                    </li>
                    
                    <!--LogIn　へのLink-->
                    <li class="nav-item">
                        {!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}
                    </li>
                @endif
            
            </ul>
            
        </div>
        
    </nav>
</header>

