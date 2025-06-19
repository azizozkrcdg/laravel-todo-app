<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return view("index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create_task");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_title' => 'required|string|max:255',
            'task_content' => 'nullable|string',
            'task_date' => 'required|date',
        ]);

        Task::create([
            "task_title" => $request->task_title,
            "task_content" => $request->task_content,
            "task_date" => $request->task_date
        ]);



        return redirect()->back()->with('success', 'Görev başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        return view("update_task", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task_title' => 'required|string|max:255',
            'task_content' => 'nullable|string',
            'task_date' => 'required|date',
        ]);

        $task = Task::find($id);

        $task->update([
            "task_title" => $request->task_title,
            "task_content" => $request->task_content,
            "task_date" => $request->task_date
        ]);

        return redirect()->back()->with('success', 'Görev başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::where("id", $id)->delete();

        return redirect()->back()->with('delete', 'Görev başarıyla silindi.');
    }

    public function statusUpdate(string $id)
    {
        $task = Task::find($id);

        if ($task->task_status == 0) {
            $task->update([
                "task_status" => 1
            ]);
        } else {
            $task->update([
                "task_status" => 0
            ]);
        }

        return redirect()->back()->with("success", "Görev durumu güncellendi.");
    }
}
