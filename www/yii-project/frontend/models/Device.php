<?php

namespace app\models;

use yii\db\ActiveRecord;

class Device extends ActiveRecord
{
    // связь с моделью Warehouse
    public function getStore()
    {
        return $this->hasOne(Store::class, ['id' => 'warehouse_id']);
    }

}



?>