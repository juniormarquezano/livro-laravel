<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::query()->get(); // TODO - ViewComposer - Comentado para demostrar a passagem de variável
        $pages = ['page1', 'page2', 'page3', 'page4']; // Para ser testado o $loop dentro do foreach
        //$modules = []; // Para ser testado com @each()
        $modules = ['module1', 'module2', 'module3', 'module4', 'module5'];

        return view('tasks.index')->with(compact('tasks', 'pages', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Usando a facade Input::
        $tasks = new Task;
        $tasks->name = Input::get('name');
        $tasks->description = Input::get('description');
        $tasks->save();
        */

        /* Usando a facade $request */
        $tasks = new Task;
        $tasks->name = $request->input('name');
        $tasks->description = $request->input('description');
        $tasks->save();

        return redirect()->route('tasks.index');

        /* Redirecionamentos
        return redirect()->route('tasks.create')
            ->withInput()
            ->with(['errors' => true, 'message' => 'Whoops!']);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Task $task) // Utilizando a vinculação rota modelo explícita
    {
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
