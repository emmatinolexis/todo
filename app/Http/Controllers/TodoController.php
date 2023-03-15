<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Yajra\DataTables\Facades\DataTables;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = Todo::getTodos();
         if (request()->wantsJson()) {
            return DataTables::of($todos)
                ->removeColumn([
                    'updated_at', 'created_by',
                ])

                ->addColumn('action', function ($todo) {

                    return " <a href='" . route('todo.show', $todo) . "' class='px-3 text-primary'><i
                                        class='uil uil-eye font-size-18'></i></a>
                            ";
                })

                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('todo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
    //    if($task){
    //     return response()->json([
    //         "msg" => "Task created successfully"
    //     ],200);
    //    }

        try {
               $task = Todo::create($request->all());
               return response()->json([
            "msg" => "Task created successfully"
        ],200);

        }
        //catch exception
        catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
        return response()->json([
            "msg" => $e->getMessage()
        ],200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        try {
               $todo->update($request->all());
               return response()->json([
                "status" => "success",
                "msg" => "Task updated successfully"
                ],200);

        }
        //catch exception
        catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
        return response()->json([
            "status" =>  "failed",
            "msg" => $e->getMessage()
        ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        try {
               $todo->destroy();
               return response()->json([
                "status" => "success",
                "msg" => "Task deleted successfully"
                ],200);

        }
        //catch exception
        catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
        return response()->json([
            "status" =>  "failed",
            "msg" => $e->getMessage()
        ],200);
        }
    }
}
