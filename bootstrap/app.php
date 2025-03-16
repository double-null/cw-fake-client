<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../src/Entities'],
    isDevMode: true,
);

$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'dbname' => 'cw',
    'user' => 'root',
    'password' => 'root',
    'host' => 'mysql',
    'charset' => 'utf8mb4',
]);

$em = new EntityManager($connection, $config);

$env = new Symfony\Component\Dotenv\Dotenv;
$env->load(__DIR__ . "/../.env");