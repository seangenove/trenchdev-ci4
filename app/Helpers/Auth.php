<?php

namespace App\Helpers;

use Config\Database;

class Auth
{

    /**
     * @var Auth $session
     */
    protected static $session = null;

    public function __construct()
    {
        self::$session = session();
    }

    public static function login($user)
    {
        self::initializeSessionVariable();

        self::$session->set('email', $user->email);
    }

    public static function logout()
    {
        self::initializeSessionVariable();

        self::$session->destroy();
    }

    public static function user()
    {
        self::initializeSessionVariable();

        $email = self::$session->get('email');

        if(!$email) {
            return null;
        } else {
            $db = Database::connect();
            $queryStatement = "SELECT * FROM users u WHERE u.email = '{$email}'";
            $user = $db->query($queryStatement)->getRow();

            return $user;
        }
    }

    public static function initializeSessionVariable()
    {
        new Auth();
    }
}
