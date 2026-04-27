<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\tasks;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{

            public function tasksReport(Request $request)
            {
                // dd($request->toArray());

                // $taskss;
               
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $status=$request->status;
                $IdName = $request->IdName;
                $start_id = $request->star_id;
                $end_id = $request->end_id;

                // dd($request->toArray());

                $query = Tasks::query();

                if($IdName != 'All') {
                    $query->where('user_id', $IdName);
                }
                if($status != 'All') {
                    $query->where('status', $status);
                }
                if($start_id && $end_id) {
                    $query->whereBetween('created_at', [$start_id, $end_id]);
                }

                $tasks = $query->get();

                // dd($tasks->toArray());

                $user = $IdName != 'All' ? \App\Models\User::find($IdName) : null;

                $pdf = PDF::loadView('dashboard.reports.pdf', [
                    'tasks' => $tasks,
                    'user' => $user,
                    'start_id' => $start_id,
                    'end_id' => $end_id
                ]);

                return $pdf->stream('tasks_report.pdf');
// $IdName=$request->IdName;
                // $star_id=$request->star_id;
                // $end_id=$request->end_id;

                // $query = tasks::query();
                
                // if($IdName!='All'){

                //     $query->where('user_id',$IdName);
                // }
                // if($star_id && $end_id){

                //     $query->WhereBetween('created_at',[$star_id,$end_id]);
                // }

                // $taskss=$query->get();

                // dd($taskss->toArray());













                // if($request->IdName =='All'){

                //     $taskss=tasks::all();

                // }
                // else{

                //     $taskss=tasks::where('user_id',$request->IdName)->get();
                // }
                // dd($taskss->toArray());
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // $query = Tasks::with('user');

            // if ($request->user_id) {
            //     $query->where('user_id', $request->user_id);
            // }

            // if ($request->start_date) {
            //     $query->whereDate('start_date', '>=', $request->start_date);
            // }

            // if ($request->end_date) {
            //     $query->whereDate('end_date', '<=', $request->end_date);
            // }

            // $tasks = $query->get();
            // $users = User::all();

            // return view('Dashboard.reports.index', compact('tasks', 'users'));
        }

        public function tasksReportPDF(Request $request)
        {
            $query = Tasks::with('user');

            if ($request->user_id) {
                $query->where('user_id', $request->user_id);
            }

            if ($request->start_date) {
                $query->whereDate('start_date', '>=', $request->start_date);
            }

            if ($request->end_date) {
                $query->whereDate('end_date', '<=', $request->end_date);
            }

            $tasks = $query->get();

            $pdf = Pdf::loadView('Dashboard.reports.pdf', compact('tasks'))->setPaper('a4', 'landscape');
            return $pdf->download('Dashboard.reports.pdf');
        }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        // dd($name);
        return view('Dashboard.reports.index' ,compact('users'));
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
