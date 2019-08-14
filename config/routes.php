<?php

return array(
    'login' => 'auth/login',
    'register' => 'auth/register',
    'logout' => 'auth/logout',
    'create' => 'create/index',
    'create/process' => 'validation/index',
    'delete/([0-9]+)/ask' => 'delete/ask/$1',
    'delete/([0-9]+)/process' => 'delete/process/$1',
    'error' => 'error/index',
    '' => 'site/index'
);
