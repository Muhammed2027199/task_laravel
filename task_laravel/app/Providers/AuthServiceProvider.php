<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Policies\PostPolicy;
use App\Policies\CommentPolicy;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
         //'App\Models\Post' => 'App\Policies\PostPolicy',
         Post::class => PostPolicy::class,
         Comment::class => CommentPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
