<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'mark';
    public $timestamps = false;
    protected $fillable = ['mStudent', 'mSubject', 'mFinal1', 'mFinal2', 'mSkill1', 'mSkill2'];
    protected $primaryKey = ['mStudent', 'mSubject'];
}
