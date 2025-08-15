<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\taskrequest;


// use to models/table task
use App\Models\task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $task = task::orderBy('id','desc')->paginate(2);
        $task = task::orderBy('id','desc')->get();
        return view('to-do.index',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('to-do.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(taskrequest $request)
    {
        $validate = $request->validated();
        
        task::create($validate);
        return redirect()->route('to-do.home')->with(['status'=>'Insert Done']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $data = task::findOrFail($id);
        return view('to-do.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(taskrequest $request, string $id)
    {
        $validate = $request->validated();
        $data = task::findOrFail($id);
        $data->name = $validate['name'];
        $data->description = $validate['description'];
        $data->save();

        return redirect()->route('to-do.home')->with(['status'=>'update Done..']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $data = task::findOrFail($id);
        $data->delete();
        return redirect()->route('to-do.home')->with(['status'=>'Task Deleted..']);
    }


    public function status(Request $request,string $id)
    {
        $data = task::findOrFail($id);
        if($data->status == 0)
        {
            $data->status = 1;
        }
        else
        {
            $data->status = 0;
        }
        $data->save();

        return redirect()->route('to-do.home')->with(['status'=>'status updated..']);
    }

    public function pending()
    {
        $task = task::where('status','0')->orderBy('id','desc')->get();
        return view('to-do.index',compact('task'));
    }


    public function complete()
    {
        $task = task::where('status','1')->orderBy('id','desc')->get();
        return view('to-do.index',compact('task'));
    }

    
}
