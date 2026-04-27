<?php

namespace App\Http\Controllers\web_S;
use illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\tasks;
use App\Models\User;
use Illuminate\Console\View\Components\Task;

use Illuminate\Http\Request;

class TsakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
                $userid=Auth::id();
                // $date=date('y-m-d');
                // $date = date('Y-m-d');

        
                // $tasks= DB::table('tasks')
                // ->where('user_id',$userid)
                // ->get();
                // ->where('date_task',date('y-m-d'))->get();
                // dd($tasks);
                // $tasks = tasks::where('id', $userid)->firstOrFail()->get();
                 $tasks = tasks::where('user_id', $userid)->get();
                // $tasks=tasks::all();
                // $date=date('Y-m-d');
                $task_pending=[];
                $task_in_progress=[];
                $task_completed=[];
            
                foreach($tasks as $task){
                    if($task->status=='pending'){
                        $task_pending[]=$task;
                    }
                    elseif($task->status=='in_progress'){
                        $task_in_progress[]=$task;
                    }
                    elseif($task->status=='completed'){
                        $task_completed[]=$task;
                    }}
                    // dd($task_pending,$task_in_progress,$task_completed);
            return view('web_S.usera',compact('task_pending','task_in_progress','task_completed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
            // $employees = User::all();
            // return view('Dashboard.dashboard_manger', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

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
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

            // $task = Task::findOrFail($id);
            // dd($request->all(),$id);
            $task = tasks::where('id', $id)->firstOrFail();
            $task->status = $request->input('status');
            $task->save();

            return back()->with('success', 'تم تحديث حالة المهمة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
