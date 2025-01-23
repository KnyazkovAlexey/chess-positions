<?php
require(__DIR__ . '/vendor/autoload.php');

Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();

(new \Framework\Console\Application())->run();