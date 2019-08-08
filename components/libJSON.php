<?php

class libJSON
{

    private static $myFile = __DIR__ . "/../db/data.json";
    private static $jsondata;

    public static function getArray(): array
    {
        self::$jsondata = file_get_contents(self::$myFile);
        return json_decode(self::$jsondata, true);
    }
    public static function saveArray($newArray): void
    {
        self::$jsondata = json_encode($newArray, JSON_PRETTY_PRINT);
        file_put_contents(self::$myFile, self::$jsondata);
    }

//    public function deleteItem(int $itemID): void
//    {
//        $this->getArray();
//        $i = 0;
//        foreach ($this->arr_data as $item) {
//            if ($item[id] == $itemID) {
//                unset($this->arr_data[$i]);
//            }
//            $i++;
//        }
//        $this->arr_data = array_values($this->arr_data);
//        $this->saveArray($this->arr_data);
//    }
//
//    public function addItem(array $item): void
//    {
//        $this->getArray();
//        $this->arr_data[] = $item;
//        $this->saveArray($this->arr_data);
//    }
}
