<?php

$request = explode('/', $_GET['path']);
//$request = $_SERVER['REQUEST_URI'];
switch ($request[0]) {
    case '/' :
        require __DIR__ .'/views/index.php';
        break;
    case '':
        require __DIR__ .'/views/index.php';
        break;
    case 'create':
        require __DIR__ .'/views/create.php';
        break;
    case 'do_create':
        require __DIR__ .'/views/do_create.php';
        break;
    case 'delete':
        require __DIR__ .'/views/delete.php';
        break;
    case 'do_delete':
        require __DIR__ .'/views/do_delete.php';
        break;
    default:
        echo 'Запрашиваемая страница не существует: '.$path[0];
        break;
}
