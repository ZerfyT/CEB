<?php

namespace App\Providers;
use App\View\Components\BillModalComponent;
use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(BillModalComponent::class, function () {
            return BillModalComponent::class;
        });
    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Builder::useVite();
        Schema::defaultStringLength(191);
    }
}
