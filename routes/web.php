<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\viewController;
use App\Models\User;
use App\Models\team;

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

//General Functions

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('signupTeacher', function () {
    return view('auth.register-teacher');
})->name('signupTeacher');

Route::get('signout', function () {
	Auth::logout();
    return view('index');
})->name('signout');
Route::get('/signup', function () {
    return view('auth.register');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('userDashboard', [dashboardController::class, 'index']
)->name('userDashboard');

Route::get('teacher', [viewController::class, 'teacher'])->name('teachers');
Route::get('teacherHifz', [viewController::class, 'teacherHifz'])->name('teacherHifz');
Route::get('teacherTajweed', [viewController::class, 'teacherTajweed'])->name('teacherTajweed');
Route::get('teacherArabic', [viewController::class, 'teacherArabic'])->name('teacherArabic');
Route::get('teacherQirat', [viewController::class, 'teacherQirat'])->name('teacherQirat');


//Admin FUnctions
Route::get('/approveTeachers', [dashboardController::class, 'approvedTeachers'])->name('approvedTeachers');

Route::get('/appliedTeachers', [dashboardController::class, 'appliedTeachers'])->name('appliedTeachers');


Route::get('/approve/{id}', function($id)
    {
    	$teacher = User::find($id);
    	DB::table('users')
            ->where('id', $teacher->id)
            ->update(['teacherStatus' => 1]);

        DB::table('teams')->insert(
            array(
                'teacher' => $teacher->id,
            )
        );
            
            return Redirect::back();
    })->name('approveUser');

Route::get('/delete/{id}', function($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::back();
    })->name('deleteUser');

//Teacher Functions

Route::get('/inviteStudent/{id}', function($id)
    {
        $teacher = Auth::user();
        DB::table('users')
            ->where('id', $id)
            ->update(['apply_for' => $teacher->id]);
            
            return Redirect::back();
    })->name('inviteStudent');

Route::get('/acceptStudent/{id}', function($id)
    {
        $teacher = Auth::user();

        $team = DB::table('teams')
            ->where('teacher', $teacher->id)->get();

        DB::table('users')
            ->where('id', $id)
            ->update(['team_id' => $team[0]->id]);
            
            return Redirect::back();
    })->name('acceptStudent');


Route::get('/declineStudent/{id}', function($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['apply_for' => Null]);

        DB::table('users')
            ->where('id', $id)
            ->update(['apply' => Null]);
            
            return Redirect::back();
    })->name('declineStudent');


Route::get('/removeStudent/{id}', function($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['apply_for' => Null]);

        DB::table('users')
            ->where('id', $id)
            ->update(['apply' => Null]);

        DB::table('users')
            ->where('id', $id)
            ->update(['team_id' => 0]);
            
            return Redirect::back();
    })->name('removeStudent');


Route::get('inviteStudents', [dashboardController::class, 'inviteStudents'])->name('inviteStudents');
Route::get('appliedStudents', [dashboardController::class, 'appliedStudents'])->name('appliedStudents');
Route::post('/quiz-submit', [viewController::class, 'quizSubmit'])->name('quizSubmit');


//Student Functions

Route::get('/applyTeacher/{id}', function($id)
    {
        $std = Auth::user();
        DB::table('users')
            ->where('id', $std->id)
            ->update(['apply_for' => $id]);

        DB::table('users')
            ->where('id', $std->id)
            ->update(['apply' => 1]);
            
            return Redirect::back();
    })->name('applyTeacher');

Route::get('/declineTeacher/{id}', function($id)
    {
        $std = Auth::user();
        DB::table('users')
            ->where('id', $std->id)
            ->update(['apply_for' => Null]);
            
            return Redirect::back();
    })->name('declineTeacher');

Route::get('/acceptTeacher/{id}', function($id)
    {
        $std = Auth::user();

        $team = DB::table('teams')
            ->where('teacher', $id)->get();

        DB::table('users')
            ->where('id', $std->id)
            ->update(['team_id' => $team[0]->id]);
            
            return Redirect::back();
    })->name('acceptTeacher');

Route::get('/cancelRequest/{id}', function($id)
    {
        $std = Auth::user();
        DB::table('users')
            ->where('id', $std->id)
            ->update(['apply_for' => Null]);

        DB::table('users')
            ->where('id', $std->id)
            ->update(['apply' => Null]);
            
            return Redirect::back();
    })->name('cancelRequest');


Route::put('payment-send', [CheckOutController::class, 'done']);


