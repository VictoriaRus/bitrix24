<?php
/**
 * This file is part of the bitrix24-php-sdk package.
 *
 * © Maksim Mesilov <mesilov.maxim@gmail.com>
 *
 * For the full copyright and license information, please view the MIT-LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Bitrix24\SDK\Services\ServiceBuilderFactory;

require_once './vendor/autoload.php';
require_once './logger.php';

$webhookUrl = 'https://b24-kjhrrq.bitrix24.by/rest/1/s1cqjhhnj02fvek5/';

try {
    /***** CRM */
    $b24Service = ServiceBuilderFactory::createServiceBuilderFromWebhook(
        webhookUrl: $webhookUrl,
        logger: $logger
    );

    /** Получить контакты */
    var_dump($b24Service->getCRMScope()->contact()->list([], [], [], 1)->getContacts());
    $logger->info('Get contacts', ['contacts' => 'all']);

    /** Добавить новый контакт */
    var_dump($b24Service->core->call('crm.contact.add', [
        "fields" =>
            [
                "NAME" => "Миша",
                "SECOND_NAME" => "Мишаня",
                "LAST_NAME" => "Мухов",
                "OPENED" => "Y",
                "ASSIGNED_BY_ID" => 1,
                "TYPE_ID" => "CLIENT",
                "SOURCE_ID" => "SELF",
            ],
        "params" => ["REGISTER_SONET_EVENT" => "Y"]
    ]));

} catch (InvalidArgumentException $exception) {
    $logger->error('Error', ["Запрос" => "Не работает"]);
    print ('ERROR IN CONFIGURATION OR CALL ARGS: ' . $exception->getMessage());
    print ($exception::class);
    print ($exception->getTraceAsString());
} catch (Throwable $throwable) {
    print ('FATAL ERROR: ' . $throwable->getMessage());
    print ($throwable::class);
    print ($throwable->getTraceAsString());
}