<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
   public function student(){
    return $this->belongsTo(User::class, "student_id","id");   //,"id_number"
   }

   public function studentID(){
    return $this->belongsTo(User::class, "id_number","id");   //,"id_number"
   }


   public function assign_subject(){
    return $this->belongsTo(AssignSubject::class, "assign_subject_id", "id");
   }

   public function student_year(){
    return $this->belongsTo(StudentYear::class, "year_id", "id");
   }

   public function student_class(){
    return $this->belongsTo(StudentClass::class, "class_id", "id");
   }

   public function examType(){
    return $this->belongsTo(ExamType::class, "examTyp_id", "id");
   }
}

