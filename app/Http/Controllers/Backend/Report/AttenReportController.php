<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;

use App\Models\User;

use DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class AttenReportController extends Controller
{
    public function AttenReportView(){
    	$data['students'] = User::where('usertype','Student')->get();
    	return view('backend.report.attend_report.attend_report_view',$data);
    }


    public function AttenReportGet(Request $request){

    	$student_id = $request->student_id;
    	if ($student_id != '') {
    		$where[] = ['student_id',$student_id];
    	}
    	$date = date('Y-m', strtotime($request->date));
    	if ($date != '') {
    		$where[] = ['date','like',$date.'%'];
    	}

    $singleAttendance = StudentAttendance::with(['user'])->where($where)->get();
    // $singleAttendance = StudentAttendance::with((['user']))->
    if ($singleAttendance == true) {
    	$data['allData'] = StudentAttendance::with(['user'])->where($where)->get();

    	$data['absents'] = StudentAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();

    	$data['Sick'] = StudentAttendance::with(['user'])->where($where)->where('attend_status','Sick')->get()->count();

    	$data['month'] = date('m-Y', strtotime($request->date));

    $pdf = PDF::loadView('backend.report.attend_report.attend_report_pdf', $data);
	// $pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');
    // $pdf= PDF::loadView('backend.student.registration_fee.registration_fee_pdf', $data);
    // return $pdf->stream('document.pdf');

    }else{

    	$notification = array(
    		'message' => 'Sorry These Criteria Donse not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
    }


    } // end Method



}
