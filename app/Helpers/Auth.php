<?php

namespace App\Helpers;

use Config\Database;

class Auth
{

    public static function login($user)
    {
        session()->set('email', $user->email);
    }

    public static function logout()
    {
        session()->destroy();
    }

    public static function user()
    {
        $email = session()->get('email');

        if (!$email) {
            return null;
        } else {
            $db = Database::connect();
            $queryStatement = "SELECT * FROM users u WHERE u.email = '{$email}'";
            $user = $db->query($queryStatement)->getRow();

            return $user;
        }
    }
}
