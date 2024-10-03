<?php
///Получить контакты
$ch = curl_init('https://b24-kjhrrq.bitrix24.by/rest/1/s1cqjhhnj02fvek5/crm.contact.list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$contacts = curl_exec($ch);
curl_close($ch);
echo $contacts;

///Добавить новый контакт
$user = array(
    "fields" =>
        array(
            "NAME" => "Максим",
            "SECOND_NAME" => "Максимович",
            "LAST_NAME" => "Мирон",
            "OPENED" => "Y",
            "TYPE_ID" => "CLIENT",
        ),
    "params" => array("REGISTER_SONET_EVENT" => "Y")
);
$ch = curl_init('https://b24-kjhrrq.bitrix24.by/rest/1/s1cqjhhnj02fvek5/crm.contact.add');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($user, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);
echo $html;
