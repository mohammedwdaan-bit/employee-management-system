<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Employee_manage = User::all();

        // dd($Employee_manage->toArray());

        return view('Dashboard.Employee_manage',compact('Employee_manage'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // User::create([

        //     'name'=>$request->

        // ]);
        // dd($request->toArray());

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $employee = User::findOrFail($request->id);
        // return view('Dashboard.task_model', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $employee = User::findOrFail($id);
        return view('Dashboard.Edit_Users',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::findOrFail($id);

    if ($request->has('update_password')) {
        // تحديث كلمة المرور فقط
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'تم تحديث كلمة المرور بنجاح');
    } else {
        // تحديث الاسم والبريد الإلكتروني فقط
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
      public function destroy(Request  $request)
    {
        //
        // dd($request->toArray());

        User::findOrFail($request->id)->delete();
        return redirect()->back();

    }
}
