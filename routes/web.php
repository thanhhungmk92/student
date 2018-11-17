<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Student;
use App\School;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login','Admin/LoginController@getLogin');

Route::get('events','HomeController@eventIndex');
Route::post('events/add','HomeController@addEvent');

Route::get('/students/export/{id}','HomeController@excel');
Route::get('/students/pdf/{id}','HomeController@pdf');
Route::get('/students/fulltextsearch','HomeController@fulltextsearch');

Route::get('/students',function(){
	$students=Student::with('school')->get();

	//dd($students);

	return view('students.index',compact('students'));
});

Route::get('students/count',function(){
	// $users = DB::table('students')
 //                     ->select(DB::raw('count(*) as students_count, school_id'))
 //                     ->where('school_id', '>', 0)
 //                     ->groupBy('school_id')
 //                     ->get();
 //    dd($users);
	// $students = DB::table('students')
 //                ->orderByRaw('updated_at - created_at DESC')
 //                ->get();
 //    dd($students);

	$students = DB::table('schools')->leftJoin('students','students.school_id','=','schools.id')
            ->select('schools.name','schools.id', DB::raw('count(students.id) as numc'))->distinct()->groupBy('schools.name','schools.id','students.id')->get();
    dd($students);

  
});

Route::get('students/create',function(){
	 $schools = School::all()->pluck('name', 'id');

   	return view('students.create', compact('schools'));
	//echo "khong co gi";

});

Route::get('students/{id}/update',function($id){

	$student=Student::findOrFail($id);

	$schools = School::all()->pluck('name', 'id');
	//dd($schools);
	return view('students.update',compact('student','schools'));

});

Route::put('students/{id}',function($id){
	$student=Student::findOrFail($id);
	$data=Input::all();
	$student->update($data);
	return redirect('/students');
});

Route::get('students/{id}/delete',function($id){
		$student=Student::findOrFail($id);
		$student->delete();
		return redirect('/students');
});

Route::post('/students',function(){
	$data = Input::all();
	$student = Student::create($data);
	$message = "success";
	//Toastr::success($message, $title = 'thanh cong roi do', $options = []);
	//Toastr::warning($message, $title = 'thanh cong roi do', $options = []);
	Toastr::success($message, $title = 'thanh cong roi do', $options = []);
	return redirect('/students');
});

Route::get('/students/{id}',function($id){

	$student=Student::findOrFail($id);

	return view('show',compact('student'));

});

Route::get('/students/schools/{name}',function($name){
	$school=School::with('student')->whereName($name)->first();
	$students=$school->student;
	
	return view('students.index',compact('school','students'));
});

Route::get('cookie',function(){
	$minutes = 1;
	$name = "Thanh Hung";
	$nameCookie = cookie('ten',$name,$minutes);
	return response('Hello World')->withCookie($nameCookie);
});

Route::get('show/name',function(Request $request){
	$name  = $request->cookie('ten');
	dd($name);
});

Route::get('url',function() {
	return redirect()->away('https://www.google.com');
});

Route::get('students/pluck',function(){
	$students = DB::table('students')->pluck('name', 'date_of_birth');
	//dd($students);
	foreach ($students as $date_of_birth => $name) {
	    echo $date_of_birth.$name;
	    echo "<br>";
	}	
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
