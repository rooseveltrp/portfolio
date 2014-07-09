<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
        $db = ConnectionManager::getDataSource($this->connection);
        $db->cacheSources = false;
        return true;
	}

	public function after($event = array()) {
        if (!isset($event['create']) || !(bool)$event['create']) {
            return true;
        }
        switch($event['create']) {
            case "users":
                $this->createSampleUsers();
                break;
            case "posts":
                $this->createSamplePosts();
                break;
        }
        return true;
	}

    private function createSampleUsers() {
        $User = ClassRegistry::init("User");
        $User->useDbConfig = $this->connection;
        $records = array(
            array(
                "User" => array(
                    "id" => 1,
                    "admin" => 1,
                    "first_name" => "Roosevelt",
                    "last_name" => "Purification",
                    "email_address" => "dummy@roosevelt.guru",
                    "username" => "admin",
                    "password" => "12345"
                )
            ),
            array(
                "User" => array(
                    "id" => 2,
                    "admin" => 0,
                    "first_name" => "Average",
                    "last_name" => "Joe",
                    "email_address" => "joe@averagejoe.com",
                    "username" => "regular",
                    "password" => "12345"
                )
            )
        );
        $User->saveAll($records);
    }

    private function createSamplePosts() {
        $Post = ClassRegistry::init("Post");
        $Post->useDbConfig = $this->connection;
        $records = array(
            array(
                "Post" => array(
                    "id" => 1,
                    "user_id" => 1,
                    "title" => "Welcome to my Blog!",
                    "contents" => "Hi,<br />Welcome to my Sample Blog Application!"
                )
            )
        );
        $Post->saveAll($records);
    }

	public $posts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'autoIncrement' => true),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'contents' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	public $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'autoIncrement' => true),
        'admin' => array('type' => 'integer', 'null' => false, 'default' => 0, 'unsigned' => false),
        'first_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'last_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'email_address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

}
