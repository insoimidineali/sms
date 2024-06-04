<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    //assignstudent table
    public function student(){
        return $this->belongsTo(User::class, 'student_id','id');
    }
    public function discount(){
        return $this->belongsTo(DiscountStudent::class, 'assign_student_id', 'id');
    }
// stream = class
    public function Stream(){
        return $this->belongsTo(StudentStream::class, 'stream_id','id');
    }
    public function Class(){
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }
    public function Shift(){
        return $this->belongsTo(StudentShift::class, 'shift_id','id');
    }

    public function Year(){
        return $this->belongsTo(StudentYear::class, 'year_id','id');
    }


}

