<?php

$mysql = new mysqli(
    'localhost',
    'root',
    '',
    'prova_cristhian_pedro_samuel'
);

$mysql->set_charset('utf8');

if (!$mysql) {
    echo "Erro na conexão";
}
?>