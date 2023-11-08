<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Todo::create(['user_id' => auth()->id()] + $request->all());
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if(auth()->id() == $todo->user_id)
            return view('todo.show', compact('todo'));
        else
            return redirect()->route('todo.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {        
        if(auth()->id() == $todo->user_id)
            return view('todo.edit', compact('todo'));
        else
            return redirect()->route('todo.index')->withErrors('msg','You not allowed!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        if(auth()->id() == $todo->user_id){
            $todo->update($request->all());
            return redirect()->route('todo.index');
        }else
            return redirect()->route('todo.index')->withErrors('msg','You not allowed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if(auth()->id() == $todo->user_id){
            $todo->delete();
            return redirect()->route('todo.index');
        }else
            return redirect()->route('todo.index')->withErrors('msg','You not allowed!');
    }
}
