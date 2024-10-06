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

require_once 'vendor/autoload.php';

/***** Tasks */
try {
    $b24ServiceTasks = ServiceBuilderFactory::createServiceBuilderFromWebhook('https://b24-kjhrrq.bitrix24.by/rest/1/2tm20nh3vfysrwly/');
    /** Получить список задач*/
    var_dump($b24ServiceTasks->core->call('tasks.task.list')->getResponseData()->getResult());

    /** Добавить задачу */
    var_dump($b24ServiceTasks->core->call('tasks.task.add', array(
        "fields" =>
            array(
                "TITLE" => "Тестовая задача sdk",
                "RESPONSIBLE_ID" => 1
            )
    )));

    /** Добавить пользователя */
    var_dump($b24ServiceTasks->core->call('user.add', array(
        "EMAIL" => "newuser2@example.com",
        "MESSAGE_TEXT" => "Привет. Заходи к нам на портал!",
        "UF_DEPARTMENT" => [1]
    )));
} catch (InvalidArgumentException $exception) {
    print ('ERROR IN CONFIGURATION OR CALL ARGS: ' . $exception->getMessage());
    print ($exception::class);
    print ($exception->getTraceAsString());
} catch (Throwable $throwable) {
    print ('FATAL ERROR: ' . $throwable->getMessage());
    print ($throwable::class);
    print ($throwable->getTraceAsString());
}
