<?php
use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'role' => Schema::TYPE_STRING . '(64) NOT NULL DEFAULT "user"',
            'groupid' => $this->integer()->Null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        // Indexes
        // $this->createIndex('username', '{{%user}}', 'username', true);
        // $this->createIndex('role', '{{%user}}', 'role');
        // $this->createIndex('status', '{{%user}}', 'status');
        // $this->createIndex('created_at', '{{%user}}', 'created_at');
        // Add super administrator
        $this->execute($this->getUserSql());
    }
    /**
     * @return string SQL to insert first user
     */
    private function getUserSql()
    {
        $time = time();
        $password_hash = Yii::$app->getSecurity()->generatePasswordHash('qwe1234');
        $auth_key = Yii::$app->security->generateRandomString();
        return "INSERT INTO {{%user}} (`username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`)
                VALUES ('admin', 'admin@demo.com', '$auth_key', '$password_hash', '', 'admin', 1, $time, $time)";
    }
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
