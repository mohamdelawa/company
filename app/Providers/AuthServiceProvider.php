<?php

namespace App\Providers;

use App\role;
use App\User;
use App\user_role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('role_admin',function (){
              $verfiy = user_role::all()->where('user_id','=',Auth::user()->id)
                  ->where('role_id','=',role::all()->where('type','=','admin')->first()->id)->isNotEmpty();

            return $verfiy;
        });
        //
    }
}
