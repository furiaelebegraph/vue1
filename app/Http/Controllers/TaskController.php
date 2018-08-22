<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('id','DESC')->paginate(4);
        return [
            'paginate' => [
                'total'         => $tasks->total(),
                'current_page'  => $tasks->currentPage(),
                'per_page'      => $tasks->perPage(),
                'last_page'     => $tasks->lastPage(),
                'from'          => $tasks->firstItem(),
                'to'            => $tasks->lastItem(),
            ],
            'task'  => $tasks
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'keep' => 'required'
        ]);

        Task::create($request->all());

        return 'Nuevo keep creado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $this->validate($request,[
            'keep' => 'required'
        ]);

        Task::findOrFail($id)->update($request->all());
        return 'Ha sido actualziado';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return "Eliminado";
    }
}
