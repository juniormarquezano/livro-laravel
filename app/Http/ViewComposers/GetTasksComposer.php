<?php

namespace App\Http\ViewComposers;
use App\Task;
use Illuminate\Contracts\View\View;

class GetTasksComposer
{
    private $tasks;

    public function __construct(Task $task)
    {
        $this->tasks = $task;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'tasks' => $this->tasks->get(),
            'name' => 'Junior Marquezano'
        ]);
    }
}