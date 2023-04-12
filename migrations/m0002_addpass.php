<?php


class m0002_addpass extends \evuru\chintuaphpmvc\Migration {
    public function up()
    {

        if ($this->table_exists('users') === 0) {
            echo "'Users does not exist'" . PHP_EOL;
            return;
        }


        //$db = \evuru\chintuaphpmvc\Application::$app->writeDB;
        $sql = $this->db->prepare("ALTER TABLE users ADD COLUMN password varchar(255) NOT NULL AFTER lastname");
        $sql->execute();


        echo "Added password column to users table" . PHP_EOL;


    }

    public function down()
    {
        //$db = \evuru\chintuaphpmvc\Application::$app->writeDB;
        $sql = "ALTER TABLE users DROP COLUMN password";
        $this->db->prepare($sql)->execute();

        echo "DROPPED password column from users table" . PHP_EOL;

    }



}