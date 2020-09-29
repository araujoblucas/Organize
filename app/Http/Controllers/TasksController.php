<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Exists;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::where('isWeekly', '=', true)->where('isActive', '=', true)->get();

        $tasksUnique = $tasks->unique('desc');
        foreach ($tasksUnique as $item) {
            $item->done = Tasks::where('desc', '=', $item->desc )->where('completed', '=', true)->count();
            $item->total = Tasks::where('desc', '=', $item->desc )->count();

        }
        return view('tasks.index', ['tasks' => $tasksUnique]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeWeekly(Request $request)
    {
        $request->validate([
            'desc' => 'required | min:3'
        ]);

        if (! isset($request->created_at)) {
            $created_at = Carbon::now();
        } else {
            $created_at = Carbon::make($request->created_at);
        }
        Tasks::create([
            'desc' => $request->desc,
            'owner_id' => Auth::user()->id,
            'isWeekly' => true,
            'finalWeekDate' => Carbon::make($request->finalWeekDate),
            'created_at' => $created_at,
            'updated_at' => $created_at
        ]);

        $days = Carbon::parse($request->finalWeekDate)->diffInDays(Carbon::now());

        for($i = 1; $i <= $days; $i++) {
            Tasks::create([
                'desc' => $request->desc,
                'owner_id' => Auth::user()->id,
                'isWeekly' => true,
                'finalWeekDate' => Carbon::make($request->finalWeekDate),
                'created_at' => $created_at->addDay($i),
                'updated_at' => $created_at->addDay($i)
            ]);
        }

        return Redirect::to(URL::previous() . "#tasks");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'desc' => 'required | min:3'
        ]);

        Tasks::create([
            'desc' => $request->desc,
            'owner_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return Redirect::to(URL::previous() . "#tasks");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = Tasks::find($request->id);
        $task->delete();
        return Redirect::to(URL::previous() . "#tasks");
    }

    public function toggle_completed($id) {
        $task = Tasks::findorfail($id);
        if($task->completed) {
            $task->update(['completed' => false]);
            return redirect()->back();
        }
        $task->update(['completed' => true]);
        return Redirect::to(URL::previous() . "#tasks");
    }
}
