<?php
define('APP_PATH', dirname(__FILE__) . '/../');

require('functions.php');
require('config.php');
require('data/data.class.php');
require('data/filedataprovider.class.php');
require('data/mysqldataprovider.class.php');


//Data::initialize(new FileDataProvider(CONFIG['data_file']));
Data::initialize(new MySqlDataProvider(CONFIG['db']));
