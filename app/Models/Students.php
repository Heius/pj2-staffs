<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = "students";

    protected $fillable = ['StName', 'StAddress', 'StDoB', 'StGender', 'StNum', 'StEmail', 'StStatus', 'StCode', 'StClass', 'StPassword'];

    public $timestamps = false;

    public $primaryKey = "StId";
    public function getGenderNameAttribute()
    {
        if ($this->StGender == 0) { #giới tính == 0
            return "Female";
        } else {
            return "Male";
        }
    }
}
