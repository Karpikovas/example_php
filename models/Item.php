<?php

class Item
{


    public static function getItemsList()
    {
        return libJSON::getArray();
    }
    public static function getItemByID($itemID)
    {
        $item = array_filter(
            libJSON::getArray(),
            function ($var) use ($itemID) {
                return $var['id'] == $itemID;
            }
        );
        return $item;
    }
    public static function deleteItem($itemID)
    {
        $items = libJSON::getArray();
        $i = 0;
        foreach ($items as $item) {
            if ($item[id] == $itemID) {
                unset($items[$i]);
            }
            $i++;
        }
        $items = array_values($items);
        libJSON::saveArray($items);
    }
    public static function addItem($name, $secondName, $patr, $birthday)
    {
        $item = [
            'id' => random_int(0, 1000),
            'name' => $name,
            'secondname' => $secondName,
            'patr' => $patr,
            'birthday' => $birthday
        ];

        $items = libJSON::getArray();
        $items[] = $item;
        libJSON::saveArray($items);

    }
    public static function checkName($name)
    {
        if (!preg_match('/^[a-z]{5,20}$/', $name))
        {
            return false;
        }
        return true;
    }
    public static function checkSecondName($secondName)
    {
        if (!preg_match('/^[a-z]{5,20}$/', $secondName))
        {
            return false;
        }
        return true;
    }
    public static function checkPatr($patr)
    {
        if (!preg_match('/^[a-z]{5,20}$/', $patr))
        {
            return false;
        }
        return true;
    }
    public static function checkBirthday($birthday)
    {
        if (!strlen($birthday)) {
            return false;
        }
        return true;
    }

}
