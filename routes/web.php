<?php

// Capítulo 3 - Roteamento e controladores

use Illuminate\Support\Facades\Route;

Route::prefix('rotas')->group(function () {

    /* Definição de rotas */
    Route::get('/', function () {
        return 'Hello Word!';
    });


    // Mostra que os parâmetros não precisam ser necessariamente com os nomes iguais para recuperá-los,
    // o que os define e a ordem da esquerda para direita
    Route::get('users/{userId}/comments/{commentId}', function ($thisIsActuallyUserId, $thisReallyTheCommentId) {
        return 'userId: ' . $thisIsActuallyUserId . ' e commentId: ' . $thisReallyTheCommentId;
    });

});

/* Manipulação de Rotas */
// Rotas chamando métodos do controller
Route::get('example-1', 'ExampleController@index');

/* Parâmetro de Rotas */
Route::get('example-2/{id}/friends', function ($id) {
    return 'Parâmetro da rota: ' . $id;
});
// Parâmetros de rota opcionais
Route::get('example-3/{id?}', function ($id = 'fallbackId') {
    return $id;
});


/* Restrições de rotas definidas por expressões regulares */
Route::get('example-4/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+'); // Só posso passar o parâmetro numerais

Route::get('example-5', function ($username) {
    return $username;
})->where('username', '[A-Za-z]+'); // Parâmetros de A - Z ou a - z

Route::get('example-6/{id}/slug/{slug}', function ($id, $slug) {
    return 'id: ' . $id . ' e slug: ' . $slug;
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z-]+']); // Passando um array de parâmetros com expressões regulares

/* Definindo nomes das rotas */
Route::get('example-7/{id}/{userId?}', 'ExampleController@show')->name('example.show');
// ou pode-se usar assim
Route::get('example-8/{id}/users/{userId?}', ['as' => 'example.show', 'uses' => 'ExampleController@show']);

/* Grupo de rotas */
Route::group([], function () {
    Route::get('hello', function () {
        return 'Hello';
    });
    Route::get('word', function () {
        return 'Word!';
    });
});
// Grupo de rotas com middleware
Route::group(['middleware' => 'web'], function () {
    Route::get('middleware', function () {
        return 'route group middleware';
    });
});
// Prefixos de caminho
Route::group(['prefix' => 'api'], function () {
    Route::get('/', function () {
        return 'api';
    });
    Route::get('users', function () {
        return 'api/users';
    });
});
// Ou pode-se usar dessa forma
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return 'admin';
    });
    Route::get('users', function () {
        return 'admin/users';
    });
});

/* Roteamento de subdomínios */
Route::group(['domain' => 'api.livro-laravel.ead'], function () {
    Route::get('sub-domain', function () {
        return 'sub-domain';
    });
});

/* Prefixos de nomes */
Route::group(['as' => 'tasks.', 'prefix' => 'admin'], function () {
    Route::group(['as' => 'comments.', 'prefix' => 'comments'], function () {
        Route::get('/', function () {
            return 'tasks/comments/show';
        })->name('show');
    });
});

/* Views */
Route::get('tasks', function () {
    $tasks = ['task1', 'task2', 'task3'];
    //return view('tasks.index'); // Uso simples de chamada de uma view
    return view('tasks.index')
        ->with('tasks', $tasks); // Passando variáveis para view
});

/* Controladores (Controllers) */
Route::prefix('controladores')->group(function () {
    /*
    Route::get('/', 'TasksController@index')->name('tasks.index');
    Route::get('tasks/create', 'TasksController@create')->name('tasks.create');
    Route::post('tasks', 'TasksController@store')->name('tasks.store');
    */

    // Utilizando a vinculação rota modelo explícita
    // O Eloquent faz a consulta direta
    // Foi vinculado uma rota modelo personalizada no provider RouteServiceProvider
    /*
    Route::get('tasks/{task}', function (\App\Task $task) {
        return view('tasks.show')->with('task', $task);
    });
    */

    // Rotas Resources
    Route::resource('tasks', 'TasksController');
});

// TODO - Capítulo 4 - Templates do Blade
// 1ª opção - Injeção de serviços do Blade
/*
Route::get('backend/sales', function (\App\Services\AnalyticsService $analytics) {
    //return $analytics->getBalance();
    // Serviço de navegação injetado na view
    return view('backend.sales')->with('analytics', $analytics);
});
*/
// 2ª opção - Injetando diretamente na view com @inject()
Route::get('backend/sales', function () {
    return view('backend.sales');
});

// TODO - Capítulo 5 - Componentes frontend
// Message bags
Route::get('message-bags', function () {

    $messages = [
        'errors' => [
            'Something went wrong with edit 1!'
        ],
        'message' => [
            'Edit 2 was successful.'
        ],
    ];

    $messagebag = new \Illuminate\Support\MessageBag($messages);

    //dd($messagebag);

    if ($messagebag->has('errors')) {
        echo '<ul id="errors">';
        foreach ($messagebag->get('errors', '<li><b>:message</b></li>') as $error) {
            echo $error;
        }
        echo '</ul>';

    }
});

// Helpers de String
Route::get('helpers-string', function () {

    $string = 'O rato roeu a roupa de rei de roma.';

    echo "<p>$string</p>";

    // starts_with, ends_with, str_contains = começa com, termina com ou contém
    //dd(starts_with($string, 'O')); // true
    //dd(ends_with($string, 'frança')); // false
    //dd(str_contains($string, 'a')); // true

    // str_is = encontra correspondência
    //dd(str_is('foo*', 'foobar')); // true

    // str_slug
    dd(str_slug($string, '-')); // o-rato-roeu-a-roupa-de-rei-de-roma

});

