<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class TasksController extends Controller
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
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

        // TODO - Capítulo 5 - Paginação
        $tasks = $this->task->paginate(2);

        // TODO - Capítulo 5 - Componentes frontend - Pluralização
        $numTasksDeleted = 7;

        return view('tasks.index')->with(compact('tasks', 'pages', 'modules', 'numTasksDeleted'));
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
    public function store(CreateTaskRequest $request)
    {
        // TODO - Capítulo 6 - Coletando e manipulando dados do usuário
        //dd($request->all());
        //dd($request->except('_token'));
        //dd($request->only(['name', 'description']));
        //dd($request->input('name'));
        //dd($request->input('employees'));
        //dd($request->input('employees.*.firstName'));
        //dd($request->input('employees.0.firstName'));
        //$employeeOne = $request->input('employees.1');
        //dd($employeeOne['firstName'] . ' ' . $employeeOne['lastName']);

        // TODO - Capítulo 6 - Coletando e manipulando dados do usuário - Upload de Arquivos
        /*
        if ($request->hasFile('profile_picture')) {
            dd($request->file('profile_picture'));
        }
        */
        // Validando um upload
        /*
        if ($request->hasFile('profile_picture') &&
            $request->file('profile_picture')->isValid()) {

            // Recuperando o arquivo
            $image = $request->file('profile_picture');

            //echo $image->getMimeType(); // retorna o tipo do arquivo
            //echo $image->getClientOriginalName(); // retorna o nome do arquivo
            //echo $image->getClientOriginalExtension(); // retorna a extensão do arquivo
            //echo $image->getClientMimeType(); // retorna o tipo do arquivo
            //echo $image->guessClientExtension(); // retorna a extensão do arquivo (melhor usar esse)
            //echo $image->getClientSize(); // retorna o tamanho do arquivo
            //echo $image->getError(); //retorna se o arquivo contém algum erro

            //$image->store('public/profiles', 'local'); // Transfere o arquivo e nomeia automaticamente
            //$image->storeAs('public/profiles', 'teste.jpeg', 'local'); // Transfere o arquivo e nomeia manualmente

            exit();
        }
        */

        // TODO - Capítulo 6 - Coletando e manipulando dados do usuário - Validação
        // Valida e emite as mensagens de erro automaticamente
        /*
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        */
        // Validação Manual
        /*
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('tasks.create')
                ->withErrors($validator)
                ->withInput();
        }
        */

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
        // TODO - Capítulo 5 - Componentes frontend - Usando uma tradução
        // O mais correto seria criar um provedor de serviços para pegar a localização do usuário
        App::setLocale('es');

        return view('tasks.show')->with(compact('tasks'));
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
