<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$tasks = Task::orderBy('id','DESC')->get();
        $tasks = Task::orderBy('id','ASC')->paginate(2);

        return [
            'pagination' =>[
                'total'         => $tasks->total(),
                'current_page'  => $tasks->currentPage(),
                'per_page'      => $tasks->perPage(),//numero de regustros que pasa
                'last_page'     => $tasks->lastPage(),
                'from'          => $tasks->firstItem(),//desde
                'to'            => $tasks->lastItem(),//hasta
            ],
            'tasks' => $tasks
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'keep'=>'required'
        ]);
        Task::create($request->all());
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $this->validate($request,[
            'id'=> 'required',
            'keep'=>'required'
        ]);
        Task::find($id)->update($request->all());
       // Task::where('id','=',$request->id)->update(['keep'=>$request->keep]);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
