<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $ids = $request->session()->get('sId');
        $info = Staff::where('sId', $ids)->get();
        return view('info.index', [
            "info" => $info,
            "sid" => $ids,
        ]);
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
        //
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
        $staff = Staff::find($id);
        return $staff;
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
        $info = Staff::find($id);
        return Redirect::route('info.cpw');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $info = Staff::find($id);
        $info->sName = $request->get('name');
        $info->sNum = $request->get('num');
        $info->save();

        return Redirect::route('info.index');
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
    public function changePassword()
    {
        return view('info/cpw');
    }
    public function changePasswordProc(Request $request)
    {
        $value = $request->session()->get('sId');
        // dd($value);
        $op = $request->get('op');
        $np = $request->get('np');
        $cnp = $request->get('cnp');
        if ($np != $cnp) {
            return Redirect::route('info.cpw')->with('error', [
                "message" => 'New password and confirm password does not match',
            ]);
        }
        try {
            $val = Staff::where('sId', $value)->where('sPassword', $op)->firstOrFail();
            $val->sPassword = $np;
            $val->save();
            return Redirect::route('info.index');
        } catch (Exception $e) {
            return Redirect::route('info.cpw')->with('error', [
                "message" => 'Wrong current password',
            ]);
        }
    }
}
