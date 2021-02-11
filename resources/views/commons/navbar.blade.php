<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">To Do Board</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            
            <ul class="navbar-nav">
    
                <!--LogIn関連追記-->
                <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item"><a href="#" class="nav-link">Login</a></li>

                <!--新規投稿　は　LogIn後でないと　投稿出来ないので　一旦非表示-->
                <!--<li class="nav-item">{!! link_to_route('tasks.create', '新規TODOの投稿', [], ['class' => 'nav-link']) !!}</li>-->

            </ul>

        </div>
    </nav>
</header>