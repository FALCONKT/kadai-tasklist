@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>TODO新規作成Page</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('content', 'TODO:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!!
                Form::submit(
                'TODO投稿', 
                ['class' => 'btn btn-primary']) 
                !!}
        
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection