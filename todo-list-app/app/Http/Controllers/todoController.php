<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todos;

class todoController extends Controller
{
    public function index()
    {
        $todos = todos::all();
        $data = compact('todos');
        return view('dashboard')->with($data);
    }
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'work' => 'required',
            'duedate' => 'required'
        ]);
        $todo = new todos;
        $todo->name = $req['name'];
        $todo->work = $req['work'];
        $todo->duedate = $req['duedate'];
        $todo->save();
        return redirect(route('todo.dashboard'));
    }
    public function delete($id)
    {
        todos::find($id)->delete();
        return redirect(route('todo.dashboard'));
    }
    public function update($id)
    {
        $todo = todos::find($id);
        $data = compact('todo');
        return view('update')->with($data);
    }
    public function editdata(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'work' => 'required',
            'duedate' => 'required'
        ]);
        $id = $req['id'];
        $todo = todos::find($id);
        $todo->name = $req['name'];
        $todo->work = $req['work'];
        $todo->duedate = $req['duedate'];
        $todo->save();
        return redirect(route('todo.dashboard'));
    }
}
