<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentShift;
use App\Models\StudentStream;
use App\Models\Terms;
use Illuminate\Support\Facades\DB;
use App\Models\Designation;
use App\Models\TeacherSallaryLog;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Spatie\PdfProtect\PdfProtect;
// use Barryvdh\DomPDF\Facade\Pdf;
use ZanySoft\LaravelPDF\PDF;
use Spatie\PdfProtect\PDFPasswordProtect;
use App\Models\StudentMarks;
use App\Models\ExamType;

class MarksController extends Controller
{

    public function MarkAdd(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = ExamType::all();
    	$data['AssignSubjects'] = AssignSubject::all();



    	return view('backend.marks.marks_add',$data);

    }


    // public function MarkEntryStore(Request $request){

    // 	$studentcount = $request->student_id;
    // 	if ($studentcount) {
    // 		for ($i=0; $i <count($request->student_id) ; $i++) {
    // 		$data = New StudentMarks();
    // 		// $data->year_id = $request->year_id;
    // 		// $data->class_id = $request->class_id;
    // 		// $data->assign_subject_id = $request->assign_subject_id;
    // 		// $data->examTyp_id = $request->examTyp_id;
    // 		// $data->student_id = $request->student_id[$i];
    // 		// $data->id_number = $request->id_number[$i];
    // 		$data->marks = $request->marks[$i];
    // 		$data->save();

    // 		} // end for loop
    // 	}// end if conditon

	// 		$notification = array(
    // 		'message' => 'Student Marks Inserted Successfully',
    // 		'alert-type' => 'success'
    // 	);

    // 	return redirect()->back()->with($notification);

    // }// end method

    public function MarkEntryStore(Request $request)
    {
        $studentIds = $request->student_id;
        $idNumbers = $request->id_number;
        $marks = $request->marks;

        if ($studentIds &&  $idNumbers) {
            for ($i = 0; $i < count($studentIds); $i++) {
                $studentId = $studentIds[$i];
                $idNumber = $idNumbers[$i];
                $mark = $marks[$i];

                // Find existing StudentMarks record
                $studentMark = StudentMarks::where('student_id', $studentId)
                    ->where('id_number', $idNumber)
                    ->first();

                if ($studentMark) {
                    // Update the existing record
                    $studentMark->marks = $mark;
                    $studentMark->save();
                } else {
                    // Create a new record if it doesn't exist
                    $newStudentMark = new StudentMarks();
                    $newStudentMark->student_id = $studentId;
                    $newStudentMark->id_number = $idNumber;
                    $newStudentMark->marks = $mark;
                    $newStudentMark->save();
                }
            }
        }

        $notification = array(
            'message' => 'Student Marks Inserted/Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function MarksEdit(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = ExamType::all();

    	return view('backend.marks.marks_edit',$data);
    }


    public function MarksEditgetStudent(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$assign_subject_id = $request->assign_subject_id;
    	$exam_type_id = $request->exam_type_id;

    	$getStudent = StudentMarks::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
    	return response()->json($getStudent);

    }


    public function MarksUpdate(Request $request){

	StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();

        $studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) {
    		$data = New StudentMarks();
    		$data->year_id = $request->year_id;
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_number = $request->id_number[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);


    } // end marks







}
