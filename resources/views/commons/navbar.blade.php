<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
<<<<<<< HEAD
        <a class="navbar-brand" href="/">To Do Board</a>
=======
        
        <a class="navbar-brand" href="/">TODOBoard</a>
>>>>>>> a6e2b80bda47cf33e70388719ed9b3b572589853
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            
            <ul class="navbar-nav">
<<<<<<< HEAD
                
                
                @if (Auth::check())
                <!--LogIn　している場合-->

                    <!--User一覧は不要-->
                    <!--<li class="nav-item"><a href="#" class="nav-link">Users</a></li>-->
                 
                    <!--新規投稿　は　LogIn後でないと　投稿出来ないようにするため　ここに移動　→　表示へ-->
                    <li class="nav-item">
                        {!! link_to_route('tasks.create', '新規TODOの投稿', [], ['class' => 'nav-link']) !!}
                    </li>

                    <li class="nav-item">
                        {!! link_to_route('logout.get', 'Logout', ['class' => 'nav-link']) !!}
                    </li>

                    <!--<li class="nav-item dropdown">-->
                    <!--    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>-->

                    <!--    <ul class="dropdown-menu dropdown-menu-right">-->
                    <!--        <li class="dropdown-item"><a href="#">My profile</a></li>-->
                    <!--        <li class="dropdown-divider"></li>-->
                    <!--        <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                
                @else
                
                    <!--LogIn　していない場合-->
                    <!--LogIn関連追記-->
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>

                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>

                    <!--新規投稿　は　LogIn後でないと　投稿出来ないので　ここから以降-->

                @endif

            </ul>

=======
    
                @if (Auth::check())
                <!--Userを点検して　LogInしているかどうかを調べる関数 LogInしている場合-->

                    <!--User一覧へのLink -->
                    <li class="nav-item">
                    <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
                    </li>
                    
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'My profile', ['id' => Auth::id()]) !!}</li>
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
            
>>>>>>> a6e2b80bda47cf33e70388719ed9b3b572589853
        </div>
        
    </nav>
</header>

