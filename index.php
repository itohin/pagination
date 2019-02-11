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
$builder->paginate(5, 10);
