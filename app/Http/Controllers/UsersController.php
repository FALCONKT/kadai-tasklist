<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    // $id の引数を利用して、表示すべきユーザを特定
    // ＋UserごとのTaskの件数を計上
    public function show($id)
    {
        $user = User::find($id);
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

        if (\Auth::check() && \Auth::id()) {

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
        }
        
         return redirect('/');

        
        
    }
    
}
