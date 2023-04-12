<?php

class m0001_initial extends \evuru\chintuaphpmvc\Migration {
    public function up(){

        if ($this->table_exists('users')===1){
            echo "'Users already table exists'".PHP_EOL;
            return;
        }


        $a= 0;
        //$db = \evuru\chintuaphpmvc\Application::$app->writeDB;
        $sql = $this->db->prepare("CREATE TABLE IF NOt EXISTS 
            users(
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL ,
                firstname VARCHAR(255) NOT NULL,
                lastname varchar(255) NOT NULL ,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )ENGINE=INNODB;");
//        $sql->bind_param('i',$a);
        $sql->execute();


        echo "CREATED users table".PHP_EOL;



    }

    public function down(){
        //$db = \evuru\chintuaphpmvc\Application::$app->writeDB;
        $sql = "DROP TABLE users";
        $this->db->prepare($sql)->execute();

        echo "DROPPED userS table".PHP_EOL;

    }



}