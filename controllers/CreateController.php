<?php

class CreateController
{
    public function actionIndex()
    {
        require_once(ROOT . '/views/create/index.php');
    }
    public function actionCreate()
    {
        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $secondName = $_POST['secondname'];
            $patr = $_POST['patr'];
            $birthday = $_POST['birthday'];

            $errors = false;

            if (!Item::checkName($name)) {
                $errors[] = 'Error with name';
            }
            if (!Item::checkSecondName($secondName)) {
                $errors[] = 'Error with secondname';
            }
            if (!Item::checkPatr($patr)) {
                $errors[] = 'Error with patr';
            }
            if (!Item::checkBirthday($birthday)) {
                $errors[] = 'Error with birthday';
            }
            if ($errors == false) {
                header('Location: /');
                Item::addItem($name, $secondName, $patr, $birthday);
            }
            else {
                foreach ($errors as $error) {
                    echo '<br/>'.$error;
                }
            }
        }
    }
}
