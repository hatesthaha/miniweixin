<?php

use yii\db\Migration;

/**
 * Handles the creation for table `group`.
 */
class m160714_080807_create_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'context'=>$this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'display' => $this->smallInteger()->notNull()->defaultValue(1),
            'is_show' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->createIndex('indexname', 'group', 'name');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('group');
    }
}
