<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClassController extends Controller
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
        $classes = Classes::where('cName', 'like', "%$search%")

            ->join('major', 'major.mId', '=', 'classes.cMajor')
            ->select('classes.*', 'major.mName')
            ->paginate(3);
        return view('classes/index', [
            "classes" => $classes,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('classes.create')->with('majors', Major::all());
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
        try {
            $name = $request->get('name');
            $course = $request->get('course');
            $major = $request->get('major');
            $check = DB::table('classes')->where('cName', $name)->where('course', $course)->count();

            if ($check > 0) {
                return back()->with('error', [
                    "message" => 'Please submit the right file format',
                ]);
            }
            $classes = new Classes();
            $classes->cName = $name;
            $classes->course = $course;
            $classes->cMajor = $major;
            $classes->save();
            return Redirect::route('class.index');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', [
                "message" => 'Please enter Name and Course',
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
        $classes = Classes::find($id);
        return $classes;
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
        $classes = Classes::find($id);
        return view('classes.edit', [
            "class" => $classes

        ])->with('majors', Major::all());
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
        $classes = Classes::find($id);
        $classes->cName = $request->get('name');
        $classes->cMajor = $request->get('major');
        $classes->course = $request->get('course');
        $classes->save();

        return Redirect::route('class.index');
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
        Classes::find($id)->delete();
        return Redirect::route('class.index');
    }
}
