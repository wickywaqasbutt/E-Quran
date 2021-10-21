<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\team;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user = Auth::user();
        if($user->role == 1 && $user->teacherStatus == 0)
        {
        	return view('layouts.app');
        }
        else if($user->role == 1 && $user->teacherStatus == 1)
        {
            $team = DB::table('teams')
            ->where('teacher', $user->id)->get();

        	$data = DB::table('users')->where([
            ['role', '=', '0'],
            ['team_id', '=', $team[0]->id],
        ])->get();
    		return view('profile.teacher.teacher-dashboard', ['data' => $data], ['user' => $user]);
        }
        else if($user->role == 2)
        {
        	$std = DB::table('users')->where('role', 0)->get();
        	$teacher = DB::table('users')->where('role', 1)->get();
        	return view('profile.admin.admin-dashboard', ['std' => $std, 'data' => $teacher], ['user' => $user]);
        }
        else if($user->role == 0 && $user->teacherStatus == 1)
        {
        	$teacher = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
        ])->get();
        	return view('profile.student.student-dashboard', ['teacher' => $teacher], ['user' => $user]);
        }
        else if($user->role == 0 && $user->teacherStatus == 0)
        {
        	return view('stripe');
        }
    }

    public function approvedTeachers()
    {
        $user = Auth::user();
        $data = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
        ])->get();
            return view('profile.admin.admin-teacher1', ['data' => $data], ['user' => $user]);
    }

    public function appliedTeachers()
    {
        $user = Auth::user();
        $data = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '2'],
        ])->get();
            return view('profile.admin.admin-teacher2', ['data' => $data], ['user' => $user]);
    }

    public function inviteStudents()
    {
        $user = Auth::user();
        $data = DB::table('users')->where([
            ['role', '=', '0'],
            ['apply_for', '=', Null],
        ])->get();
        return view('profile.teacher.invite-students', ['data' => $data], ['user' => $user]);
    }

    public function appliedStudents()
    {
        $user = Auth::user();
        $data = DB::table('users')->where([
            ['role', '=', '0'],
            ['apply_for', '=', $user->id],
        ])->get();
        return view('profile.teacher.applied-students', ['data' => $data], ['user' => $user]);
    }
}
