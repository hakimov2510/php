<?php

use yii\db\Migration;

/**
 * Class m241219_170340_add_email_verification_and_status_to_user
 */
class m241219_170340_add_email_verification_and_status_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241219_170340_add_email_verification_and_status_to_user cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        // `user` jadvaliga ustunlar qo'shish
        $this->addColumn('user', 'email_verification_token', $this->string()->unique());
        $this->addColumn('user', 'status', $this->integer()->defaultValue(0)); // 0 - tasdiqlanmagan, 10 - tasdiqlangan
    }

    public function down()
    {
        // `user` jadvalidan ustunlarni olib tashlash
        $this->dropColumn('user', 'email_verification_token');
        $this->dropColumn('user', 'status');
    }

}
