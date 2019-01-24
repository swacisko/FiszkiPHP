<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Flashcard' => 'App\Policies\FlashcardPolicy',
        'App\Memobox' => 'App\Policies\MemoboxPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        /*
         * The before function is triggered before any other middleware is checked,
         * In this case if user isAdmin returns true, then the condition in given policies will not be even checked. This way we can enable admin to access all pages.
         */
//        $gate->before( function($user){
//            return $user->isAdmin();
//        } );

        //
    }
}
