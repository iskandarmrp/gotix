<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ticket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ticketId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'movieId' => [
                'type'       => 'INT',
                'constraint'     => 11,
            ],
            'movieName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'date' => [
                'type' => 'DATETIME',
                null => true,
            ],
            'time' => [
                'type' => 'DATETIME',
                null => true,
            ],
            'seats' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'paymentId' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ]
        ]);
        $this->forge->addKey('ticketId', true);
        $this->forge->addForeignKey('paymentId', 'payment', 'paymentId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ticket');
    }

    public function down()
    {
        $this->forge->dropTable('ticket');
    }
}
