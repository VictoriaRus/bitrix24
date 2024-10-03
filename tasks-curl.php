<?php
///Получить список задач
$ch = curl_init('https://b24-kjhrrq.bitrix24.by/rest/1/2tm20nh3vfysrwly/tasks.task.list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$tasks = curl_exec($ch);
curl_close($ch);
echo $tasks;

///Добавить новую задачу
$task = array(
    "fields" =>
        array(
            "TITLE" => "Тестовая задача curl",
            "RESPONSIBLE_ID" => 1
        )
);

$ch = curl_init('https://b24-kjhrrq.bitrix24.by/rest/1/2tm20nh3vfysrwly/tasks.task.add');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($task, JSON_UNESCAPED_UNICODE));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

$res = json_encode($res, JSON_UNESCAPED_UNICODE);
print_r($res);

///Добавить нового пользователя
$user = array(
    "EMAIL" => "newuser@example.com",
    "MESSAGE_TEXT" => "Привет. Давай учиться вместе!",
    "UF_DEPARTMENT" => [1]
);

$ch = curl_init('https://b24-kjhrrq.bitrix24.by/rest/1/2tm20nh3vfysrwly/user.add');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($user, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);
echo $html;