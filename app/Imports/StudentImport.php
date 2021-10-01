<?php

namespace App\Imports;

use App\Models\Classes;
use App\Models\Students;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class StudentImport implements ToModel, WithHeadingRow
// , WithUpserts
{
    /**
     * @param Collection $collection
     */
    // public function uniqueBy()
    // {
    //     return ['StId', 'StCode'];
    // }
    public function model(array $row)
    {
        // Chuyển dạng ngày tháng từ excel
        // dd($row);
        $UNIX_DATE = ($row["dob"] - 25569) * 86400;
        $data = [
            "StName" => $row["name"],
            "StEmail" => $row["email"],
            "StAddress" => $row["address"],
            "StDoB" => gmdate("Y-m-d", $UNIX_DATE),
            "StGender" => ($row["gender"] == 'Male') ? 1 : 0,
            "StNum" => $row["phone"],
            "StClass"  => Classes::where('cName', $row["class"])->where('course', $row["course"])->value('cId'),
            "StCode" => $row["code"],
            "StStatus" => 1,
            "StPassword" => $row["password"],
        ];
        // dd($data);
        return new Students($data);
    }
}
