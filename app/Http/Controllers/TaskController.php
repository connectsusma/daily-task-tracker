<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class TaskController extends Controller
{
    // Shows today's tasks
    public function index()
    {
        $today = Carbon::today()->toDateString();
        $tasks = Task::where('task_date', $today)->get();
        return view('tasks.index', compact('tasks', 'today'));
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'branch' => 'required',
            'staff' => 'required',
            'summary' => 'required',
            'status' => 'required',
        ]);

        $todayDate = Carbon::today()->toDateString();
        $formattedDate = Carbon::today()->format('m-d');

        $count = Task::where('task_date', $todayDate)->count();
        $number = str_pad($count + 1, 2, '0', STR_PAD_LEFT);

        $task_id = $formattedDate . '-' . $number;

        Task::create([
            'task_id' => $task_id,
            'name' => $request->input('name'),
            'branch' => $request->input('branch'),
            'staff' => $request->input('staff'),
            'summary' => $request->input('summary'),
            'status' => $request->input('status'),
            'handed_over' => $request->input('handed_over'),
            'task_date' => $todayDate,
        ]);

        return back()->with('success', '✅ Task added successfully!');
    }

    // View report by date
    public function report(Request $request)
    {
        $date = $request->date ?? Carbon::today()->toDateString();
        $tasks = Task::where('task_date', $date)->get();
        return view('tasks.report', compact('tasks', 'date'));
    }

    // Export tasks as PDF
    public function exportPdf($date = null)
    {
        $date = $date ?? Carbon::today()->toDateString();
        $tasks = Task::where('task_date', $date)->get();
        $pdf = Pdf::loadView('tasks.pdf', compact('tasks', 'date'))
                      ->setPaper('a4', 'landscape'); // This sets it to landscape

        return $pdf->download("tasks_$date.pdf");
    }

    
}
