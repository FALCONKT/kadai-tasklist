@extends('layouts.app')

@section('content')

    @if (Auth::check())
    <!--Loginしている場合-->
           <p> {{ Auth::user()->name }}さん、やることが入力出来ます！</p>
            <p> {!! link_to_route('tasks.create', 'To Do を新規登録', [], ['class' => 'nav-link']) !!}</p>

    <!--tasksを取ってきている-->
    <div class="col-sm-8">
        @if (count($tasks) > 0)
            @include('tasks.tasks', ['tasks' => $tasks])
        @endif
    </div>

    @else
    
    <!--/Loginしていない場合-->

    <div class="center jumbotron">
        <div class="text-center">
        
            <h1>To Do Borad ~やること一覧~</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        
        </div>
    </div>
    
    
    
    @endif

@endsection

<!--tasks.indexへ移行-->