<?php

use yii\db\Migration;

/**
 * Handles the creation of table `countsmoking`.
 */
class m171222_135507_create_countsmoking_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('countsmoking', [
            'id' => $this->primaryKey(),
            'data' => $this->timestamp(),
            'count' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('countsmoking');
    }
}
