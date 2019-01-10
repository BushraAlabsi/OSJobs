<?php

use yii\db\Migration;

class m130524_201444_createUser extends Migration
{
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'position' => $this->string(100)->notNull()->unique(),
            'company' => $this->string(200)->notNull(),
            'url' => $this->string(200),
            'location' => $this->string(),
            'description' => $this->string(),
            'logo' => 'blob',
            'type' => "ENUM('full-time', 'part-time', 'freelancer')",
            'category_id' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
