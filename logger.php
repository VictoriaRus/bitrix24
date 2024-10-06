<?php
declare(strict_types=1);

use Monolog\Handler\RotatingFileHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\UidProcessor;

$rotatingFileHandler = new RotatingFileHandler('b24-crm-scope-debug', 7, Level::Debug);
$rotatingFileHandler->setFilenameFormat('/logs/' . '{filename}-{date}.log', 'Y-m-d');

$logger = new Logger('crm-sdk');
$logger->pushHandler($rotatingFileHandler);
$logger->pushProcessor(new MemoryUsageProcessor(true, true));
$logger->pushProcessor(new UidProcessor());

//$logger->debug("test");
//$logger->error('Error', ["Запрос" => "Не удалось получить..."]);
//$logger->warning('Warning');