<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function list()
    {
        $lists = Auth::user()->todolists;

        return view('lists.list', ['lists' => $lists]);
    }

    public function list_saved()
    {
        $lists = Auth::user()->todolists->where('saved', true);

        return view('lists.list', ['lists' => $lists]);
    }

    public function list_unsaved()
    {
        $lists = Auth::user()->todolists->where('saved', false);

        return view('lists.list', ['lists' => $lists]);
    }

    public function show($id)
    {
        $list = Auth::user()->todolists->where('id', $id)->first();
        $todos = ToDoList::findOrFail($id)->todos;

        return view('lists.show', ['list' => $list, 'todos' => $todos]);
    }

    public function show_completed($id)
    {
        $list = ToDoList::findOrFail($id);
        $todos = ToDoList::findOrFail($id)->todos->where('state', 'completed');

        return view('lists.show', ['list' => $list, 'todos' => $todos]);
    }
    public function show_nocompleted($id)
    {
        $list = ToDoList::findOrFail($id);
        $todos = ToDoList::findOrFail($id)->todos->where('state', 'no completed');

        return view('lists.show', ['list' => $list, 'todos' => $todos]);
    }

    public function show_running($id)
    {
        $list = ToDoList::findOrFail($id);
        $todos = ToDoList::findOrFail($id)->todos->where('state', 'running');

        return view('lists.show', ['list' => $list, 'todos' => $todos]);
    }

    public function create()
    {
        return view('lists.create');
    }

    public function add(Request $request)
    {
        //penser a faire la validation
        $list = ToDoList::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);

        $list->save();

        return redirect()->route('lists.list');
    }

    public function close(Request $request, $id)
    {
        if ($request->ajax())
        {
            $todo = ToDoList::find($id);

            $todo->saved = true;

            $todo->save();

            return response()->json(['saved' => true], 200, ['X-CSRF-TOKEN' => csrf_token()]);
        }
    }
}
