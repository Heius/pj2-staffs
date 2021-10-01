<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
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
        $subjects = Subject::where('SubName', 'like', "%$search%")->paginate(3);
        return view('subject.index', [
            "subjects" => $subjects,
            'search' => $search,
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
        return view('subject.create');
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
        $duration = $request->get('duration');
        $final = $request->get('final');
        if ($final == 1) {
            $ftd = $request->get('ftd');
        } else {
            $ftd = 0;
        }
        $skill = $request->get('skill');
        if ($skill == 1) {
            $std = $request->get('std');
        } else {
            $std = 0;
        }
        $subject = new Subject();
        $subject->SubName = $name;
        $subject->Duration = $duration;
        $subject->Final = $final;
        $subject->FTD = $ftd;
        $subject->Skill = $skill;
        $subject->STD = $std;
        $subject->save();
        return Redirect::route('subject.index');
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
        $subject = Subject::find($id);
        return $subject;
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
        $subject = Subject::find($id);
        return view('subject.edit', [
            "subject" => $subject,
        ]);
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
        $subject = Subject::find($id);
        $subject->SubName = $request->get('name');
        $subject->Duration = $request->get('duration');
        $a = $subject->Final = $request->get('final');
        if ($a == 1) {
            $subject->FTD = $request->get('ftd');
        } else {
            $subject->FTD = 0;
        }
        $b = $subject->Skill = $request->get('skill');
        if ($b == 1) {
            $subject->STD = $request->get('std');
        } else {
            $subject->STD = 0;
        }
        $subject->save();
        return Redirect::route('subject.index');
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
        Subject::find($id)->delete();
        return Redirect::route('subject.index');
    }
}
