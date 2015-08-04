<?php namespace App;
/**
 * Created by PhpStorm.
 * User: suhan
 * Date: 27/07/15
 * Time: 10:36 PM
 */

class UserRepository{
    public function findByEmailIdorCreate($userData, $driver){
        $fullName = explode(' ',$userData->getName());
        $firstName = array_shift($fullName);

        $lastName = implode(" ",$fullName);

        $user = User::firstOrCreate(['email' => $userData->email]);

        $user->firstName = $firstName;
        $user->lastName = $lastName;
        $user->avatar = $userData->getAvatar();
        if($user->roleId == null)
	    $user->roleId = 2;//2 = guest

        switch($driver){
            case 'facebook':
                $user->fbid = $userData->getId();
                break;
            case 'google':
                $user->gid = $userData->getId();
                break;
        }
        $user->save();

        return $user;
    }

}