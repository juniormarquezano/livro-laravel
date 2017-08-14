<!-- resources/views/backend/sales -->
<!-- TODO - Injeção de serviços do Blade -->

<!-- Esse método é injetando diretamente na view a outra opção é injetando nas rotas -->
@inject(analytics, App\Services\AnalyticsService)

<p>{{ $analytics->getBalance() }} - {{ $analytics->getBudget() }}</p>