<?php

namespace App\Http\Middleware;

use App\Model\OAuth;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class JWTAuthToken
{
    /**
     * @var \App\Model\OAuth
     */
    protected $oauth;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $result = null;
        /*$this->oauth = new OAuth();
        $this->client = new Client(['base_uri' => 'http://www.oatuh.test/']);

        $sessToken = session('token');
        if ($sessToken) {
            $this->setToken($sessToken);
        }
        if (! $this->getToken()) {
            $response = $this->client->post('api/user/login', [
                'json' => [
                    'email' => 'test@test.com',
                    'password' => '2s3d4f5g',
                ],
                'verify' => true
            ]);
            $result = \GuzzleHttp\json_decode($response->getBody()->getContents());

            if (! $this->setTokenAndValidate($result->token)) {
                return redirect('/welcome');
            }
        }
        else
        {
            if (! $this->setTokenAndValidate($sessToken)) {
                return redirect('/welcome');
            }
        }*/

        return $next($request);
    }

    protected function setTokenAndValidate($token)
    {
        $result = false;
        if (isset($token)) {
            $this->setToken($token);
            if ($result = $this->validateToken()) {
                session(['token' => $this->getToken()]);
            }
            $result = true;
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->oauth->getToken();
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->oauth->setToken($token);
    }

    public function validateToken()
    {
        // {error: token_not_provided}
        // {error: token_expired}
        // {error: invalid_credentials}
        // {error: could_not_create_token}
        $response = $this->client->get('api/users', [
            'headers' => [
                'Authorization' => 'Bearer '.$this->getToken()]
        ]);
        $result = \GuzzleHttp\json_decode($response->getBody()->getContents());
        if (isset($validate->error)) {
            $result = \GuzzleHttp\json_encode(['error' => $result->error]);
        }

        return $result;
    }
}
