<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Event;
use Excel;
use PDF;
use Calendar;
use Session;
use Validator, Input, Redirect; 



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('home');
    // }

    
    public function export()
    {
        $proDaTa="";
        $students = Student::all();
        // return Excel::download ($students,'excel data', function($excel) {

        //     $excel->sheet('sheet name', function($sheet) use ($students)

        //     {

        //         $sheet->fromArray($students);

        //     });

        // })->download('xlsx');
        $proDaTa .= '<table style="border: 1px solid black" > 
        <tr>
        <th style="border: 1px solid black"> Name </th>
        <th style="border: 1px solid black"> Address </th>
        <th style="border: 1px solid black"> Class </th>
        <th style="border: 1px solid black"> Date of birth </th>
        </tr>';
        foreach($students as $student){
            $proDaTa .= '<tr>
                        <td style="border: 1px solid black">'.$student->name.'</td>
                        <td style="border: 1px solid black">'.$student->address.'</td>
                        <td style="border: 1px solid black">'.$student->school->name.'</td>
                        <td style="border: 1px solid black">'.$student->date_of_birth.'</td>
                        </tr>';
        }
        $proDaTa .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=students.xls');
        echo $proDaTa;
        
    }

    public function excel($id)
    {
        //$student = Student::where('id',$id)->select('id','name','address')->get()->toArray();
        $student = Student::with('school')->get()->toArray();
        //dd($student);
        return Excel::create('data',function($excel) use ($student) {
            $excel->sheet('sheet',function($sheet) use ($student) {
                $sheet->fromArray($student);
            });
        })->export('xls');
    }

    public function pdf($id)
    {
        $student = Student::find($id);
        //$student_class = $student->school;
        $pdf = PDF::loadView('students.pdf', ['student' => $student]);
        return $pdf->download('student.pdf');

    }

    public function fulltextsearch(Request $request)
    {

        // $students= Student::search('Trang nguyen')->get();
        // $a=$students->where('date_of_birth','>','1992-01-22');
        // dd($students);
       
        $b="]]my kim ho";
        $a = Student::selectRaw("*")
        ->whereRaw("MATCH(name,address)AGAINST('".$b."' IN BOOLEAN MODE)")->get();
        //$c = Student::where('name','like','%'.$b.'%')->get();
        dd($a);

    }

    public function eventIndex()
    {
        $events = Event::get();
        $event_list = [];
        foreach($events as $key=>$event) {
            $event_list[] = Calendar::event (
                $event->name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.'+1 day'),
                null,
                         [
                             'color' => '#ff0000',
                             
                         ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        return view('events',compact('calendar_details'));
    }

    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
            \Session::flash('warning','Please enter the valid details');
            return Redirect::to('/events')->withInput()->withErrors($validator);
        }    
        $event = new Event;
        $event->name = $request['name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();
        \Session::flash('success','Event added successfully.');
        return Redirect::to('/events');
    }


}

