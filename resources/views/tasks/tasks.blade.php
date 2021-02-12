@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

   <p>やることが一覧化出来、次々と入力していけます！</p>
    
    @if ( Auth::check())
    <!--Loginしている場合-->


   <h1>To Do 一覧</h1>

           <p> {{ Auth::user()->name }}さん、ButonClickで　やることが入力出来ます！</p>
                
            <!--新規投稿Button-->
            {!! 
            link_to_route(
            'tasks.create', 
            'To Do　新規登録!!', 
            [],
            ['class' => 'btn btn-primary'])
            !!}
    <p></p>
    <p></p>
            @if (count($tasks) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>To Do Borad＝やること</th>
                            <th>Status=状態</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             @endif    
    
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