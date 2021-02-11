<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">To Do Board</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            
            <ul class="navbar-nav">
                
                
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

        </div>
    </nav>
</header>