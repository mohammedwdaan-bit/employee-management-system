<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tasks;
use App\Models\User;
use illuminate\Support\Facades\Auth;

class TsakDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $employees = User::all();

             $userid=Auth::id();
                // $date=date('y-m-d');
                // $date = date('Y-m-d');
                // $tasks= DB::table('tasks')
                // ->where('user_id',$userid)
                // ->get();
                // ->where('date_task',date('y-m-d'))->get();
                // dd($tasks);
                // $tasks = tasks::where('user_id', $userid)->firstOrFail()->get();
                //  $tasks = tasks::where('user_id', $userid)->get();
                $tasks=tasks::all();
                $date=date('Y-m-d');
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
            return view('Dashboard.dashboard_manger',compact('employees','task_pending','task_in_progress','task_completed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->toArray());
        
        Tasks::create([

            'user_id'=>$request->user_id,
            'title'=>$request->task_name,
            'description'=>$request->task_details,
            
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,

            'status'=> $request->status ?? 'pending',
            'priority'=> $request->complexity ?? 'low',
            

        ]);
        return redirect()->back()->with('success', 'تمت إضافة المهمة بنجاح');
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
    public function update(Request $request, $id)
    {
        // dd($request->toArray(),$id);

            $task = Tasks::findOrFail($id);

            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->status = $request->input('status');
            $task->priority = $request->input('priority');
            // $task->complexity = $request->input('complexity');
            $task->user_id = $request->input('assignee');
            $task->start_date = $request->input('start_date');
            $task->end_date = $request->input('end_date');
            
            $task->save();
        // البيانات ستكون متاحة مباشرة في الـ Request
        // $title = $request->input('title');
        // $description = $request->input('description');
        // $status = $request->input('status');
        // ... باقي الحقول
        
        // معالجة البيانات وحفظها
        
        return redirect()->back()->with('success', 'تم تحديث المهمة بنجاح');
    }
    // public function update(Request $request, string $id)
    // {
    //     //
    //     dd($request->toArray(),$id);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getModal($id)
    {
        dd($id);
        $task = Tasks::with('user')->findOrFail($id);
        return view('Dashboard.task_model', compact('task'));
    }

}
