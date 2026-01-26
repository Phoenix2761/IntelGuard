<?php
    require realpath(__DIR__ . "/vendor/autoload.php");
    use Dotenv\Dotenv;

    $dotEnvObject = Dotenv::createImmutable(__DIR__);
    $dotEnvObject->load();
    // var_dump($_ENV["INTELGUARD_AWS_ACCESS_KEY"]);
?>