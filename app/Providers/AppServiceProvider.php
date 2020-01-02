<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // nav composer for message count badge
        View::composer('users.includes.nav', function($view) {
            $userId = Auth::id();
            $messageCount = Message::where([
                'to' => $userId,
                'read' => 0
            ])->count();
            $supportCount = Support::where([
                'user_id' => $userId,
                ['admin', '!=', null],
                'read' => 0 
            ])->count();
            $view->with('messageCount', $messageCount);
            $view->with('supportCount', $supportCount);
        });
    }
}
