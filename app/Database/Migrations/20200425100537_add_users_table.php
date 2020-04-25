<?php namespace App\Database\Migrations;

class AddUsersTable extends \CodeIgniter\Database\Migration {

    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'unique'         => TRUE,
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'description' => [
                'type'           => 'VARCHAR',
                'constraint'     => '191',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}