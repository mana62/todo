<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{

    //データベースからすべてのToDoを取得
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    //新しいToDoをデータベースに保存(store,保存)
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);
        return redirect('/')->with('message', 'Todoを作成しました');

    }

    //Todoの更新(update)
    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    //Todoの削除(destroy)
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }
}

