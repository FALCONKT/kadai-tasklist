<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TaskApp\Task;    // 名前空間いちいち呼び出さなくてもよくするためここに記載

class TasksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    // getでtasks/にAccessされた場合の「一覧　表示　処理」
=======
     
    //  やること一覧表示
>>>>>>> a6e2b80bda47cf33e70388719ed9b3b572589853
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
<<<<<<< HEAD
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
        // 初回LogInしていないため一覧は見えない
=======
        return view('welcome', $data);
>>>>>>> a6e2b80bda47cf33e70388719ed9b3b572589853
    }



// ================================
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでtasks/createにAccessされた場合の「新規登録画面　表示　処理」
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // postでtasks/にAccessされた場合の「新規登　だけの　処理」
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
<<<<<<< HEAD
            'content'=> 'required|max:191',
            // 'status' => 'required|max:10',
            // 解除
=======
            'content' => 'required|max:191',
>>>>>>> a6e2b80bda47cf33e70388719ed9b3b572589853
        ]);

<<<<<<< HEAD
        return redirect('/');
        // return view('tasks.index',['task'=> $task,]);

    }
=======
        $request->user()->tasks()->create([
            'content' => $request->content,
        ]);
>>>>>>> a6e2b80bda47cf33e70388719ed9b3b572589853

        // 投稿完了後に直前のPageが表示
        return back();
    }


// ================================
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/idにAccessされた場合の「取得　表示　処理」
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show',[
            'task' => $task,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/id/editにAccessされた場合の「更新画面　表示　処理」
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // putまたはpatchでtasks/idにアクセスされた場合の「更新　だけの　処理」
    public function update(Request $request, $id)
    {
        
        // Validation
        $this->validate($request, [
            'content'=> 'required|max:191',
            'status' => 'required|max:10',
        ]);

        
        $task = Task::find($id);
        $task->content = $request->content;
        $task->status = $request->status;    // 追加
        $task->save();

        return redirect('/');
        

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // deleteでtasks/idにAccessされた場合の「削除　だけの　処理」
    public function destroy($id)
    {
        $task = \App\TaskApp\Task::find($id);

<<<<<<< HEAD
        return redirect('/');


=======
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return back();
>>>>>>> a6e2b80bda47cf33e70388719ed9b3b572589853
    }


}
