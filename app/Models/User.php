<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['email', 'password'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public static function findById($id)
    {
        $user = (new User())->find($id);

        return $user;
    }

    public static function findByEmail($email)
    {
        $db = Database::connect();

        $queryStatement = "SELECT * FROM users u WHERE u.email = '{$email}'";
        $user = $db->query($queryStatement)->getRow();

        return $user;
    }
}


