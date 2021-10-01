<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Models\Classes;
use App\Models\Students;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $classes = Classes::select('*')->get();
        $class = $request->get('class');
        $students = Students::where('StClass', $class)->get();
        return view("students.index", [
            'classes' => $classes,
            'idClass' => $class,
            'students' => $students,
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
        $student = Students::find($id);
        // return Redirect::route('staff.update', [
        //     "staff" => $staff
        // ])->with('staffs', Staff::all());
        $s = $student->StStatus;
        if ($s == 0) {
            DB::table('students')->where('StId', $id)->update(['StStatus' => 1]);
        } else if ($s == 1) {
            DB::table('students')->where('StId', $id)->update(['StStatus' => 0]);
        }
        return redirect()->back();
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
    public function addByExcel()
    {
        return view('students.add-by-excel');
    }
    public function import(Request $request)
    {
        // dd($request);
        $file = $request->file('excel-file');
        try {
            Excel::import(new StudentImport,  $file);
            // dd($file);
            return Redirect::route('student.index');
        } catch (\Maatwebsite\Excel\Exceptions\NoTypeDetectedException $e) {
            return back()->with('error', [
                "message" => 'Please submit the file',
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', [
                "message" => 'Duplicate Student Email or Code',
            ]);
        } catch (Exception $e) {
            return back()->with('error', [
                "message" => 'Please submit the right file format',
            ]);
        }
    }

    // public function export()
    // {
    //     return Excel::download(new StudentExport, 'DanhSachSinhVien.xlsx');
    // }
}
