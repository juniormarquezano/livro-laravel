<?php

namespace App\Providers;

use App\Http\ViewComposers\GetTasksComposer;
use App\Task;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // TODO - View Composer - 1ª maneira, poderia ser em um provedor de serviços com ViewComposerServiceProvider
        // Dessa forma seria usada a variável em todas as views, poderia ser um exagero
        //view()->share('tasks', Task::query()->get());

        // TODO - View Composer - 2ª maneira, passar variável apenas para determinadas views
        // 1ª opção
        /*
        view()->composer('partials.sidebar', function ($view) {
            $view->with('tasks', Task::query()->get());
        });
        */
        // 2ª opção
        /*
        view()->composer(['partials.sidebar', 'partials.header'], function ($view) {
            $view->with([
                'tasks' => Task::query()->get(),
                'name' => 'Junior Marquezano'
            ]);
        });
        */
        // 3ª opção - Tudo que estiver nas pastas .*
        /*
        view()->composer('partials.*', function ($view) {
            $view->with([
                'tasks' => Task::query()->get(),
                'name' => 'Junior Marquezano'
            ]);
        });
        */
        // TODO - View Composer - 3ª maneira, mais flexível porém mais complexa
        // Após criar uma classe, precisa apenas registrá-la em um provedor de serviços, novamente o mais
        // indicado seria um ViewComposerServiceProvider, assim dividindo as responsabilidades
        view()->composer('partials.*', GetTasksComposer::class);

        // TODO - Diretivas personalizadas do Blade
        Blade::directive('isTest', function () {
            return "@isTest - Diretiva personalizada do blade!";
        });

        Blade::directive('newlinesToBr', function ($expression) {
            return "<?php echo nl2br({$expression}); ?>";
        });

        Blade::directive('ifPublic', function () {
            return "<?php if(true): ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
