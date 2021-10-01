<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function show($listid, $todoid)
    {
        $list = ToDoList::findorFail($listid);
        $todo = ToDo::findOrFail($todoid);

        return view('todo.show', ['todo' => $todo, 'list' => $list]);
    }

    public function create($id)
    {
        $lists = Auth::user()->todolists;

        return view('todo.create', [
            'lists' => $lists,
            'actualid' => $id,
        ]);
    }

    public function add(Request $request, $id)
    {
        $todo = ToDo::create([
            'title' => $request->title,
            'description' => $request->description,
            'to_do_list_id' => $request->list,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        $todo->save();

        return redirect()->route('list.show', $request->list);
    }

    public function complete(Request $request, $id)
    {
        if ($request->ajax())
        {
            $todo = ToDo::find($id);

            $todo->state = 'completed';

            $todo->save();

            return response()->json(['state' => 'completed'], 200, ['X-CSRF-TOKEN' => csrf_token()]);
        }
    }

}
