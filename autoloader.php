<?php
function libsFolderAutoloader($className) {
    $fileName = 'lib' . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($fileName)) {
        require_once $fileName;
        return true;
    }
    return false;
}
spl_autoload_register('libsFolderAutoloader');
