<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {

        $tasks = Task::orderBy('priority', 'asc')->get();
        $projects = Project::all();
        return view('tasks.index', compact(['tasks', 'projects']));


    }


    public function updateOrder(Request $request)
    {
        if ($request->has('priority')) {
            $arr = explode(',', $request->input('priority'));

            foreach ($arr as $sortOrder => $id) {
                $menu = Task::find($id);
                $menu->priority = $sortOrder;
                $menu->save();
            }
            return ['success' => true, 'message' => 'Updated'];
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Task($this->validateRequest());
        $car->save();

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact(['task', 'projects']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->update($this->validateRequest());
        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect(route('tasks.index'));
    }

    public function validateRequest()
    {
        return request()->validate([
            'name'         => 'required|max:255',
            'priority'      => 'required|integer|gte:0',
            'project_id'      => 'required|integer|gte:0'
        ]);
    }


}
