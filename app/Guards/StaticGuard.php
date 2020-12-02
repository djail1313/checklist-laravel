<?php


namespace App\Guards;


use App\Models\User;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class StaticGuard implements Guard
{
    use GuardHelpers;

    const TOKEN = 'Vm25gWyrS3L5PUTpUxLhTjZJZCsZGcnZxbQZGj6UTkaDfWGddV5zQeTgu6shky9wzruCn7eSdwZyPfGcYpsGLRTRttdejPJcB6q3LbfWVfR9FApDymHtZeHaxENWRZB7';

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function user()
    {
        if (! is_null($this->user)) {
            return $this->user;
        }

        $user = null;

        if ($this->checkCredentials()) {
            $user = new User([
                'id' => 1,
                'name' => 'User',
                'email' => 'user@user.com',
            ]);
        }

        return $this->user = $user;

    }

    public function validate(array $credentials = [])
    {
        if ($this->checkCredentials()) {
            return true;
        }
        return false;
    }

    protected function checkCredentials()
    {
        $token = $this->request->bearerToken();
        return $token === self::TOKEN;
    }
}
