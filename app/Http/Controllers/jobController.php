<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Rap2hpoutre\FastExcel\FastExcel;

class jobController extends Controller
{
    public function createJob(Request $request)
    {
        $exploderequest = explode(' ', $request->due_time);
        $explodedate = explode('-', $exploderequest[0]);
            $year = $explodedate[0];
            $month = $explodedate[1];
            $day = $explodedate[2];
        $explodetime = explode(':', $exploderequest[1]);
            $hour = $explodetime[0];
            $minute = $explodetime[1];
            $second = $explodetime[2];
        $explodepart = $exploderequest[2];
        $converttogeorgian = Verta::jalaliToGregorian($year, $month, $day);
            $geoyear = $converttogeorgian[0];
            $geomonth = $converttogeorgian[1];
            $geoday = $converttogeorgian[2];
        $georgiandate = Carbon::create($geoyear, $geomonth, $geoday, $hour, $minute, $day, 'UTC');
        $newJob = Job::create([
           'title' => $request->title,
           'description' => $request->description,
            'status' => 1,
            'user_id' => $request->user,
            'process' => 0,
            'due_time' => $georgiandate
        ]);
        return redirect('/selectuser');
    }

    public function jobForm()
    {
        return view('newjob');
    }

    public function getJob(Request $request)
    {
        if (Auth::user()->user_role == null) {
            $getuserid = Auth::user()->id;
        }else{
            $getuserid = $request->users;
        }
        $getuserjobs = User::findOrFail($getuserid)->getJobs->sortDesc();
            return view('showjob', compact('getuserjobs'));
    }

    public function selectUser()
    {
        $users = User::all();
        return view('auth.selectuser', compact('users'));
    }

    public function deleteJob(Request $request, $id)
    {
        $archivejob = Job::findOrFail($id);
        $archivejob->update([
            'archive' => 1
        ]);
        return redirect()->back();
    }
    public function updateJob(Request $request, $id)
    {
        $upjob = Job::findOrFail($id);
        $upjob->update([
            'status' => 2,
            'process' => 100,
        ]);
        return redirect()->back();
    }

    public function editJob(Request $request, $id)
    {
        $ourjob = Job::findOrFail($id);
        return view('edit', compact('id', 'ourjob'));
    }

    public function submitEditJob(Request $request, $id)
    {
        $upjob = Job::findOrFail($id);
        $upjob->update([
            'description' => $request->description,
            'process' => $request->process
        ]);
        if ($request->process == 100) {
            $upjob->update([
                'status' => 2
            ]);
        }
        return redirect('/selectuser');
    }

    public function archiveTasks()
    {
        return view('archive');
    }

    public function unArchive(Request $request, $id)
    {
        $upjob = Job::findOrFail($id);
        $upjob->update([
            'archive' => null
        ]);
        return redirect()->back();
    }

    public function markForce(Request $request, $id)
    {
        $forcejob = Job::findOrFail($id);
        if ($request->force == 1) {
            $forcejob->update([
                'force' => 1
            ]);
        }else{
            $forcejob->update([
                'force' => 0
            ]);
        }
        return redirect()->back();
    }

    public function excelExport()
    {
        if (Auth::user()->user_role != 1) {
            $me = \Illuminate\Support\Facades\Auth::user()->id;
            $getjobs = \App\Models\User::find($me)->getJobs;
        }else{
            $getjobs  = Job::all();
        }
        return (new FastExcel($getjobs))->download('TasksList.xlsx');
    }

}
