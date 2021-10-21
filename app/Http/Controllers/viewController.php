<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function teacher(Request $request)
    {
    	$user = Auth::user();
    	if(Auth::check() && $user->teacherStatus == 1 &&$user->role == 0)
    	{
    		$teacher = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
        ])->get();
        	return view('profile.student.student-dashboard', ['teacher' => $teacher], ['user' => $user]);
    	}
    	else
    	{
    		$data = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
        ])->get();
    		return view('teacher.teachers', ['data' => $data]);
    	}
    	
    }

    public function quizSubmit(Request $request)
    {
        $user = Auth::user();
        if($request->score >= 5)
        {
            DB::table('users')
            ->where('id', $user->id)
            ->update(['teacherStatus' => 2]);
            return redirect('dashboard');
        }

        else
        {
            DB::table('users')
            ->where('id', $user->id)
            ->update(['teacherStatus' => 3]);
            return redirect('dashboard');
        }
    }

    public function teacherHifz()
    {
        $data = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
            ['course', '=', 'Hifz'],
        ])->get();
            return view('teacher.hifz', ['data' => $data]);
    }

    public function teacherTajweed()
    {
        $data = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
            ['course', '=', 'Tajweed'],
        ])->get();
            return view('teacher.tajweed', ['data' => $data]);
    }

    public function teacherArabic()
    {
        $data = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
            ['course', '=', 'Arabic'],
        ])->get();
            return view('teacher.arabic', ['data' => $data]);
    }

    public function teacherQirat()
    {
        $data = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
            ['course', '=', 'Qirat'],
        ])->get();
            return view('teacher.qirat', ['data' => $data]);
    }
}
