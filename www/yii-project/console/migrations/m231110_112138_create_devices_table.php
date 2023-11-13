<?php

use yii\db\Migration;


class m231110_112138_create_devices_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
        ]);

        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string()->unique()->notNull(),
            'store_id' => $this->integer(),
            'about' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
        ]);

        $this->createIndex('idx-device-store_id', 'device', 'store_id');
        $this->addForeignKey('fk_device_store', 'device', 'store_id', 'store', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_device_store', 'device');
        $this->dropTable('device');
        $this->dropTable('store');
    }
}