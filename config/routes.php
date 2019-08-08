<?php

return array(
    'create' => 'create/index',
    'create/process' => 'create/create',
    'delete/([0-9]+)/ask' => 'delete/ask/$1',
    'delete/([0-9]+)/process' => 'delete/process/$1',
    'error' => 'error/index',
    '' => 'site/index'
);
