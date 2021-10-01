<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $value = session('Permission');
        if ($value == 1) {
            $staffs = Staff::all();
            return view('staff/index', [
                "staffs" => $staffs
            ]);
        } else {
            return Redirect::route('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $s = new Staff();
        $s->sName = $name;
        $s->sEmail = $email;
        $s->sNum = $phone;
        $s->sPassword = 1;
        $s->save();
        return Redirect::route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        Staff::find($id);
        Staff::where('sId', $id)->update(['sPassword' => 1]);
        return Redirect::route('staff.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $staff = Staff::find($id);
        // return Redirect::route('staff.update', [
        //     "staff" => $staff
        // ])->with('staffs', Staff::all());
        $s = $staff->sPer;
        if ($s == 0) {
            DB::table('staff')->where('sId', $id)->update(['sPer' => 2]);
        } else if ($s == 2) {
            DB::table('staff')->where('sId', $id)->update(['sPer' => 0]);
        }
        return Redirect::route('staff.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
