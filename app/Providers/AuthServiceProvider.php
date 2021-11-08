<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
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
        $this->defineGateCategory();

        Gate::define('view', function ($user) {
            return $user->checkLevel();
        });

        Gate::define('course-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list_course'));
        });

    }

    public function defineGateCategory()
    {
        Gate::define('categories-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('categories-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('categories-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('categories-delete', 'App\Policies\CategoryPolicy@deltete');
    }

}
