<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ！！！！！！！！！！！！！！！！
use App\TaskApp\User; // 追加
// UserModelを使います　という意味


// ！！！！！！！！！！！！！！！！
// LogInしているかどうか判定する　Classを用いる
use Illuminate\Support\Facades\Auth;

// ！！！！！！！！！！！！！！！！


class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    // public function show($id)
    // {
    //     $user = User::find($id);


    //     return view('users.show', [
    //         'user' => $user,
    //     ]);

    // }
    

    // TaskListでは　User一覧は見せるが、詳細へはAccess出来ないようにする。

    // 参考    
    // // ログイン中のユーザー情報
    // // Auth::user();
    
    // // ログイン中のユーザーID
    // Auth::id();    


    public function show($id){

        // 1TEST
        // // show.blade.php で Clickされた対象のID
        // $user = User::find($id);

        // // LogInしているID　頭にuse 使用
        // $login_id = Auth::id();

        // // LogInしているIDがclickされた対象と同じであるならば
        // if($login_id == $id)
        // {
        //     return view('users.show', [
        //      'user' => $user,
        //     ]);
        // }
        // // そうでなければ・・=　他人のIDならば　redirect　する
        // else
        // {   
        //     return redirect('/');
        //     // return view('/');
        // }


        // 2TEST
        // show.blade.php で Clickされた対象のID
        $user = User::find($id);
        
        // !!!!!! やること        
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

        // LogInしているID　頭にuse 使用
        $login_id = Auth::id();

        // 名前とやることの　Data化
        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];
        // やることの増加
        $data += $this->counts($user);

        // LogInしているIDがclickされた対象と同じであるならば
        if($login_id == $id)
        {
            return view('users.show', $data);
        }
        // そうでなければ・・=　他人のIDならば　redirect　する
        else
        {   
            return redirect('/');
            // return view('/');
        }


    }

    
}
// Class END
