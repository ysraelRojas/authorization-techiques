<?php

namespace Tests;

use App\{User, Admin};
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Auth\Authenticatable as UserContract; 

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createAdmin()
    {
        return factory(Admin::class)->create([
            //'admin' => true
        ]);
    }

    protected function createUser()
    {
    	return factory(User::class)->create([
    		//'admin' => false
    	]);
    }

    protected function actingAsAdmin($admin = null)
    {
        if ($admin == null) {
            $admin = $this->createAdmin();
        }

        return $this->actingAs($admin, 'admin');
    }

    protected function actingAsUser($user = null)
    {
        if ($user == null) {
            $user = $this->createUser();
        }

        return $this->actingAs($user);
    }

    /**
     * Set the currently logged in user for the application.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string|null  $driver
     * @return void
     */
    public function be(UserContract $user, $driver = null)
    {
        $this->app['auth']->guard($driver)->setUser($user);
    }

}
