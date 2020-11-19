<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseSetup extends Migration
{
    public function up()
    {
        $this->forge->createDatabase(getenv('database.default.database'), true);   // Create new DB

        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'title'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'content'    => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'author'     => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'admin',
            ],
            'views'      => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => '0',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addField('id');
        $this->forge->createTable('newsletters');

        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email'         => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'is_subscribed' => [
                'type'    => 'BOOLEAN',
                'default' => true,
            ],
            'created_at'    => [
                'type' => 'DATETIME',
            ],
            'updated_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addField('id');
        $this->forge->createTable('subscribers');

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('newsletters', TRUE);
        $this->forge->dropTable('subscribers', TRUE);
    }
}
