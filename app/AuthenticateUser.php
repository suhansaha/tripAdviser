<?php namespace App;
/**
 * Created by PhpStorm.
 * User: suhan
 * Date: 27/07/15
 * Time: 10:28 PM
 */

use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\UserRepository;

class AuthenticateUser{
    private $users;
    private $auth;
    private $socialite;
    public function __construct(UserRepository $users,Guard $auth, Socialite $socialite){
        $this->users = $users;
        $this->auth = $auth;
        $this->socialite = $socialite;
    }
    public function execute($hascode, $driver, $listener){
        if(!$hascode){
            return $this->getAuthorizationFirst($driver);
        }

        $user = $this->users->findByEmailIdorCreate($this->getUser($driver),$driver);
        $this->auth->login($user,true);
        return $listener->userHasLoggedIn($user);
    }

    private function getAuthorizationFirst($driver){
        return $this->socialite->driver($driver)->redirect();
    }
    private function getUser($driver){
        $userData = $this->socialite->driver($driver)->user();
        return $userData;
    }
}