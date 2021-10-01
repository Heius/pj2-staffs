<?php

namespace App\Imports;

use App\Models\Marks;
use App\Models\Students;
use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class MarkImport implements ToModel, WithHeadingRow, WithUpserts

{
    /**
     * @param Collection $collection
     */
    public function uniqueBy()
    {
        return ['mStudent', 'mSubject'];
    }
    public function model(array $row)
    {
        //
        $f = Subject::where('SubName', $row["subject"])->value('Final');
        $s = Subject::where('SubName', $row["subject"])->value('Skill');
        // dd(gettype($f));
        // dd($row["final1"]);
        //     die;
        // echo ($f);
        if ($f == 1) {
            //     foreach ($row as $key => $value) {
            //         if ($key == 'final1') {
            //             if ($value == null) {
            //                 $f2 = $value;
            //             }
            //         }
            //     }
            // }

            $f1 = [
                'fp1' => $row["final1"],
            ];
            // dd(gettype($f1));
            // dd(gettype($row));
            if ($f1['fp1'] >= 5) {
                $f2 = [
                    'fp2' => NULL,
                ];
            } else {
                $f2 = [
                    'fp2' => $row["final2"],
                ];
            }
        } else {
            $f1 = [
                'fp1' => NULL,
            ];
            $f2 = [
                'fp2' => NULL,
            ];
        }
        if ($s == 1) {
            $s1 = [
                'sp1' => $row["skill1"],
            ];
            if ($s1['sp1'] >= 5) {
                $s2 = [
                    'sp2' => NULL,
                ];
            } else {
                $s2 = [
                    'sp2' => $row["skill2"],
                ];
            }
        } else {
            $s1 = [
                'sp1' => NULL,
            ];
            $s2 = [
                'sp2' => NULL,
            ];
        }
        // print_r($s1['sp1']);
        // print_r($f1["fp1"]);
        // foreach ($row as $key => $value) {
        //     if ($key == 'final1') {
        //         print_r($f1);
        //         print_r("<br>");
        //         // print_r($f2);
        //         // print_r("<br>");
        //         // print_r($s2);
        //         // print_r("<br>");
        //         // print_r($s1);
        //         // print_r("<br>");
        //     }
        // }
        $data = [
            "mStudent" =>  Students::where('StName', $row["student_name"])->where('StCode', $row["code"])->value('StId'),
            "mSubject" => Subject::where('SubName', $row["subject"])->value('SubId'),
            "mFinal1" => $f1["fp1"],
            "mFinal2" => $f2["fp2"],
            "mSkill1" => $s1["sp1"],
            "mSkill2" => $s2["sp2"],
        ];
        return new Marks($data);
        // dd($data);
    }
}
