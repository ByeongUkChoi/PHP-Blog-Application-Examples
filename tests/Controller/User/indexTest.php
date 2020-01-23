<?php

namespace Pronist\PHPBlog\Tests\Controller\User;

use PHPUnit\Framework\TestCase;

/**
 * @requires extension mysqli
 * @requires extension xdebug
 * @runTestsInSeparateProcesses
 */
final class indexTest extends TestCase
{
    use \Pronist\PHPBlog\Tests\DatabaseTrait;

    /**
     * @covers \createNewUser
     */
    public function testCreateNewUser()
    {
        $token = getToken();

        startSession();

        $_POST = [
            'email'     => $this->faker->email,
            'password'  => $this->faker->password,
            'token'     => $token
        ];

        $f = function ($token, $location) {
            setSession('CSRF_TOKEN', $token);

            createNewUser($this->conn);
            $this->assertContains('Location: ' . $location, xdebug_get_headers());
        };

        $f->call($this, $token, '/login.php');
        $f->call($this, getToken(), '/user/register.php');
    }

    /**
     * @covers \updateUser
     */
    public function testUpdateUser()
    {
        $token = getToken();

        $_POST = [
            '_method'   => 'patch',
            'email'     => $this->faker->email,
            'password'  => $this->faker->password,
            'token'     => $token
        ];

        $user = $this->user();

        $f = function ($token, $location) use ($user) {
            startSession();
            setSession('CSRF_TOKEN', $token);

            updateUser($this->conn, $user);
            $this->assertContains('Location: ' . $location, xdebug_get_headers());
        };

        $f->call($this, $token, '/login.php');
        $f->call($this, getToken(), '/user/update.php');
    }
}
