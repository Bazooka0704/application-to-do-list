<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::orderBy('id','asc')->paginate(3);
        return view('todolist')->with('tasks',$task);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'inputText'=> 'required|min:5|max:255'
        ]);

        $task = new Task;
        $task->name = $request->inputText;
        $task->end_task = "Non";
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'description'=> 'required|min:5|max:255'
        ]);
        $id = $request->id;
        DB::table('tasks')->where('id',$id)->update(['name' => $request->description]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $task = Task::find($id);
        $task -> delete();

        return response()->json();
    }

    public function endTrue(Request $request)
    {
        $id = $request->id;
        DB::table('tasks')->where('id',$id)->update(['end_task' => "Oui"]);

        return response()->json();
    }

    public function endFalse(Request $request)
    {
        $id = $request->id;

        DB::table('tasks')->where('id',$id)->update(['end_task' => "Non"]);

        return response()->json();
    }

}
