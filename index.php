<?php

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use App\Pagination\Builder;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
$config = new Configuration();

$connection = DriverManager::getConnection([
    'dbname' => getenv('DB_NAME'),
    'user' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
    'host' => getenv('DB_HOST'),
    'driver' => getenv('DB_DRIVER')
]);

$queryBuilder = $connection->createQueryBuilder();
$queryBuilder->select('*')->from('users');

$builder = new Builder($queryBuilder);
$users = $builder->paginate($_GET['page'] ?? 1, 10);

foreach ($users->get() as $user) {
    echo $user['id'] . ' : ' . $user['first_name'] . '<br>';
}

echo $users->render(['order' => $_GET['order'], 'gender' => $_GET['gender']]);
