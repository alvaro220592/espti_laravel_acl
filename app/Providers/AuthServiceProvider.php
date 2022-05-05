<?php

namespace App\Providers;

use App\models\Post;
use App\models\User;
use App\Policies\PostPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        // 'App\Post' => 'App\Policies\PostPolicy'
        Post::class => PostPolicy::class
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // $gate->define('update_post', function(User $user, Post $post){
        //     return $user->id == $post->user_id;
        // });
    }
}
