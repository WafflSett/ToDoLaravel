<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = ToDo::simplePaginate(7);
        return view('todos.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     // not used because of layout
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title' => ['required']
        ], ['Title.required' => 'You must enter a title!']);

        ToDo::create(
            [
                'title' => $request->input('Title'),
                'description' => $request->input('Description'),
                'isCompleted' => false
            ]
        );

        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     */
    // public function show(ToDo $toDo)
    // {
    //     // not used because of layout
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $editId)
    {
        $todos = ToDo::simplePaginate(7)->withQueryString();
        return view('todos.index', ['todos' => $todos, 'editId' => $editId]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if ($request->method()==="PATCH") {
            $todo = ToDo::find($id);
            $todo->update([
                'isCompleted'=>($request->input('isCompleted')==='on'?1:0)
            ]);
        }
        else{
            $request->validate([
                'EditTitle' => ['required']
            ], ['EditTitle.required' => 'You must enter a title!']);
            $todo = ToDo::find($id);
            $todo->update([
                'title'=>$request->input('EditTitle'),
                'description'=>$request->input('Description')
            ]);
        }
        if (isset($_GET['page'])) {
            return redirect('/todos?page='.$_GET['page']);
        }
        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $todo = ToDo::find($id);
        $todo->delete();
        if (isset($_GET['page'])) {
            return redirect('/todos?page='.$_GET['page']);
        }
        return redirect('/todos');
    }
}
