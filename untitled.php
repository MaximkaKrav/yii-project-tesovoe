<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m231108_094931_create_device_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string()->unique()->notNull(),
            'store_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex('idx-device-store_id', 'device', 'store_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-device-store_id', 'device');
        $this->dropIndex('idx-device-store_id', 'device');
        $this->dropTable('device');

    }
}













<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store`.
 */
class m200101_000001_create_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('store');
    }
}
