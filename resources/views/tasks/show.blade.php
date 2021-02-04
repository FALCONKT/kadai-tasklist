@extends('layouts.app')

@section('content')

    <!-- ここにページ毎のコンテンツを書く -->
    <h1>id = {{ $task->id }} のTODO詳細Page</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>TODO=やること</th>
            <td>{{ $task->content }}</td>
        </tr>
     
        <tr>
            <th>Status=状態</th>
            <td>{{ $task->status }}</td>
        </tr>
        
    </table>
    
    <!--編集Pageへ    -->
    {!!
    link_to_route(
    'tasks.edit',
    'このTODOを編集',
    ['id' => $task->id],
    ['class' => 'btn btn-light'])
    !!}

    <!--削除Button-->
    {!!
    Form::model(
    $task, 
    ['route' => ['tasks.destroy', $task->id],
    'method' => 'delete'])
    !!}
    
    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    
    {!! Form::close() !!}
        
@endsection
