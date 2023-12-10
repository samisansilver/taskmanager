<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Jobtaskgroup;
use App\Models\Taskgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Exceptions\ViewExceptionWithSolution;

class taskGroupController extends Controller
{
    public function newTask()
    {
        return view('taskgroup.newtask');
    }

    public function createTask(Request $request)
    {
        return view('taskgroup.tasklist', compact('request'));
    }

    public function saveTasks(Request $request)
    {
        $createtask = Taskgroup::create([
            'title' => $request->title,
            'description' => $request->description,
            'persons' => $request->persons,
        ]);
        $getidtask = $createtask->id;
        for ($x = 1; $x <= $request->persons; $x++) {
             $createjob = Job::create([
                'title' => $request->input('title_user_'.$x),
                'description' => $request->input('desc_user_'.$x),
                'user_id' => $request->input('user_'.$x),
                'status' => 1
            ]);
             $getjobid = $createjob->id;
             DB::table('job_taskgroup')->insert([
                'job_id' => $getjobid,
                'taskgroup_id' => $getidtask,
             ]);
        }
        return redirect('/taskgroup/list');

    }

    public function testRel()
    {
        $gettasks = Taskgroup::with('getJobs')->find(5);
        return $gettasks;
    }

    public function list()
    {
        $list = Taskgroup::all();
        return view('taskgroup.list', compact('list'));
    }

    public function showTask(Request $request, $id)
    {
        $findtask = Taskgroup::findOrFail($id);
        return view('taskgroup.showtask', compact('findtask'));
    }

    public function deleteGtask(Request $request, $id)
    {
        $archivejob = Taskgroup::findOrFail($id);
        $archivejob->update([
            'archive' => 1
        ]);
        return redirect('/taskgroup/list');
    }

    public function updateGtask(Request $request, $id)
    {
        $upjob = Taskgroup::findOrFail($id);
        $upjob->update([
            'status' => 1,
        ]);
        return redirect('/taskgroup/list');
    }

}
