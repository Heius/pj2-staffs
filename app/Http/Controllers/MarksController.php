<?php

namespace App\Http\Controllers;

use App\Imports\MarkImport;
use App\Models\Classes;
use App\Models\Marks;
use App\Models\Students;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $subjects = Subject::select('*')->get();
        $classes = Classes::select('*')->get();
        $class = $request->get('class');
        $subject = $request->get('subject');
        $marks = DB::table('mark')->join('students', 'mark.mStudent', '=', 'students.StId')->join('classes', 'students.StClass', '=', 'classes.cId')->where('mSubject', $subject)->groupBy('cId')->get();
        // dd($marks);
        return view('marks.index', [
            'subjects' => $subjects,
            'SubId' => $subject,
            'marks' => $marks,
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
        return view('marks.create');
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
    public function getClassAndMark($idSub, $idCl)
    {
        // $subject = Subject::find($idSub);
        // $classes = Classes::find($idCl);
        $get = DB::table('mark')->join('students', 'mark.mStudent', '=', 'students.StId')->join('subjects', 'subjects.SubId', '=', 'mark.mSubject')->where('mSubject', $idSub)->groupBy('Final')->get('Final');
        // dd($get);
        $passed = DB::table('mark')->join('students', 'mark.mStudent', '=', 'students.StId')->where('mSubject', $idSub)->where('mFinal1', '>=', '5')->orWhere('mFinal2', '>=', '5')->where('students.StClass', $idCl)->count();
        // dd($passed);
        $all = DB::table('mark')->join('students', 'mark.mStudent', '=', 'students.StId')->where('mSubject', $idSub)->where('students.StClass', $idCl)->count();
        // dd($passed, $all);
        // dd($all);
        // $ppercent = $passed / $all * 100;
        // dd($ppercent);
        $marks = DB::table('mark')->join('students', 'mark.mStudent', '=', 'students.StId')->join('classes', 'students.StClass', '=', 'classes.cId')->join('subjects', 'mark.mSubject', '=', 'subjects.SubId')->where('mSubject', $idSub)->where('StClass', $idCl)->get();
        // dd($marks);
        return view('marks.classmark', [
            'marks' => $marks,
            'all' => $all,
            // 'ppercent' => $ppercent,
        ]);
    }
    public function markByExcel()
    {
        return view('marks.add-by-excel');
    }
    public function import(Request $request)
    {
        $file = $request->file('excel-file');
        try {
            Excel::import(new MarkImport, $file);
            // dd($file);
            return Redirect::route('mark.index');
        }
        // catch (\Illuminate\Database\QueryException $e) {
        //     return back()->with('error', [
        //         "message" => 'Some students already have their marks',
        //     ]);
        // } 
        catch (\Maatwebsite\Excel\Exceptions\NoTypeDetectedException $e) {
            return back()->with('error', [
                "message" => 'Please submit the file',
            ]);
        } catch (Exception $e) {
            return back()->with('error', [
                "message" => 'Please submit the right file format',
            ]);
        }
    }
    public function changeMark($idSub, $idSt)
    {
        $marks = DB::table('mark')->join('students', 'mark.mStudent', '=', 'students.StId')->join('classes', 'students.StClass', '=', 'classes.cId')->join('subjects', 'mark.mSubject', '=', 'subjects.SubId')->where('mSubject', $idSub)->where('mStudent', $idSt)->get();
        return view('marks.changeMark', [
            "marks" => $marks,
        ]);
        // dd($marks);
    }
    public function changeMarkProc(Request $request, $idSub, $idSt)
    {
        $iC = Students::find($idSt);
        $marks = DB::table('mark')->where('mStudent', $idSt)->where('mSubject', $idSub)->get();
        // echo $iC->StClass;
        $f = DB::table('mark')->join('subjects', 'mark.mSubject', '=', 'subjects.SubId')->where('mSubject', $idSub)->get('Final');
        $s = DB::table('mark')->join('subjects', 'mark.mSubject', '=', 'subjects.SubId')->where('mSubject', $idSub)->get('Skill');
        $ft1 = $request->get('tt1');
        $st1 = $request->get('st1');
        if ($f = 1) {
            if ($ft1 >= 5) {
                $ft2 = NULL;
            } else {
                $ft2 = $request->get('tt2');
            }
        } else {
            $ft1 = NULL;
            $ft2 = NULL;
        }
        if ($s = 1) {
            if ($st1 >= 5) {
                $st2 = NULL;
            } else {
                $st2 = $request->get('st2');
            }
        } else {
            $st1 = NULL;
            $st2 = NULL;
        }
        // dd($ft1, $ft2, $st1, $st2);
        DB::table('mark')->where('mStudent', $idSt)->where('mSubject', $idSub)->update(['mFinal1' => $ft1]);
        DB::table('mark')->where('mStudent', $idSt)->where('mSubject', $idSub)->update(['mFinal2' => $ft2]);
        DB::table('mark')->where('mStudent', $idSt)->where('mSubject', $idSub)->update(['mSkill1' => $st1]);
        DB::table('mark')->where('mStudent', $idSt)->where('mSubject', $idSub)->update(['mSkill2' => $st2]);

        return Redirect::route('mark.cminfo', ['idSub' => $idSub, 'idCl' => $iC->StClass]);
    }
    public function addNewMark()
    {
        return view('marks.add-manual');
    }
    public function markCheck($idSt)
    {
        $am = DB::table('mark')->join('students', 'students.StId', '=', 'mark.mStudent')->join('subjects', 'subjects.SubId', '=', 'mark.mSubject')->where('mStudent', $idSt)->get();
        $sn = DB::table('mark')->join('students', 'students.StId', '=', 'mark.mStudent')->join('subjects', 'subjects.SubId', '=', 'mark.mSubject')->where('mStudent', $idSt)->get();
        return view('students.all-mark', [
            "am" => $am,
            "sn" => $sn,
        ]);
    }
}
