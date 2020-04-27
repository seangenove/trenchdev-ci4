<?php

namespace App\Helpers;

class Auth
{
    public static function login($user)
    {
        session()->set('user', serialize($user));
    }

    public static function logout()
    {
        session()->destroy();
    }

    public static function user()
    {
        $user = unserialize(session()->get('user'));

        if (!$user) {
            return null;
        } else {
            return $user;
        }
    }
}
