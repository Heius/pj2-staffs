<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->get('search');
        # all => lấy tất cả bản ghi
        # paginate => phân trang
        $majors = Major::where('mName', 'like', "%$search%")->paginate(3);
        return view('major.index', [
            "majors" => $majors,
            'search' => $search,
        ]);
        // dd($majors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('major.create');
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
        // try{
        $name = $request->get('name');
        try {
            $major = new Major();
            $major->mName = $name;
            $major->save();
            return Redirect::route('major.index');
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::route('major.create')->with('error', [
                "message" => 'This Major is already exists',
                "name" => $name,
            ]);
        }
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
        // $majors = Major::where('mId', $id)->firstOrFail();
        // $classes = Classes::where('cMajor', $id)->firstOrFail();
        $realmName = DB::table('major')->where('mId', $id)->get();
        $majors = DB::table('major')->join('classes', 'major.mId', '=', 'classes.cMajor')->select('*')->where('mId', $id)->get();
        return view('major.show', [
            'realmName' => $realmName,
            'majors' => $majors,
        ]);
        // dd($ijmc);
        // dd($majors);
        // return $majors;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $majors = Major::find($id);
        return view('major.edit', [
            "majors" => $majors
        ]);

        //
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
        $major = Major::find($id);
        $name = $request->get('name');
        try {
            $major->mName = $request->get('name');

            $major->save();

            return Redirect::route('major.index');
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::route('major.create')->with('error', [
                "message" => 'This Major is already exists',
                "name" => $name,
            ]);
        }
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
        Major::find($id)->delete();
        return Redirect::route('major.index');
    }
}
