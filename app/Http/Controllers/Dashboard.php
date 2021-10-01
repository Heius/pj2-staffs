<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    //
    public function showAll()
    {
        $subName = DB::table('mark')->join('subjects', 'mark.mSubject', '=', 'subjects.SubId')->groupBy('SubId')->get('SubName');
        $all = DB::table('mark')->join('subjects', 'mark.mSubject', '=', 'subjects.SubId')->groupBy('SubId')->get();
        $student = DB::table('students')->count();
        $classes = DB::table('classes')->count();
        return view('welcome', [
            'subName' => $subName,
            'all' => $all,
            'students' => $student,
            'classes' => $classes,
        ]);
    }
}
