<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 名前空間いちいち呼び出さなくてもよくするためここに記載

class TasksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでtasks/にAccessされた場合の「一覧　表示　処理」
    public function index()
    {
        // $tasks = Task::all();
        // $tasks = Task::all();

        // return view('tasks.index', [
        //     'tasks' => $tasks,
        // ]);
        // 初回LogInしていないため一覧は見えない
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
        return view('welcome', $data);
        
    }

    // TaskListでは　User一覧は見せるが、詳細へはAccess出来ないようにする。

    // 参考    
    // // ログイン中のユーザー情報
    // // Auth::user();
    
    // // ログイン中のユーザーID
    // Auth::id();   

//  Auth::user() === Auth::id()

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
            'content'=> 'required|max:191',
            // 'status' => 'required|max:10',
            // 解除
        ]);
        
        // $task = new Task;
        // $task->content = $request->content;
        // $task->status = $request->status;    // 追加
        // $task->save();

        // return redirect('/');
        // return view('tasks.index',['task'=> $task,]);
        

        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);
            


        // return back();
        // 投稿完了後に直前のページが表示
        return redirect('/');

    }



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

        if (Auth::user() === $id) {
            
        return view('tasks.show',[
            'task' => $task,
        ]);
        
        }
        return redirect('/');



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

        if (Auth::user() === $id) {
            
        return view('tasks.edit', [
            'task' => $task,
        ]);
        
        }
        return redirect('/');

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
            // 'status' => 'required|max:10',
            // 解除
        ]);

        
        $task = Task::find($id);
        
        if (Auth::user() === $id) {
            
        $task->content = $request->content;
        $task->status = $request->status;    // 追加
        $task->save();
        
        }

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
        // $task = Task::find($id);
        // $task->delete();
        // return redirect('/');

        
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }
        // return back();
        return redirect('/');

    }


}
