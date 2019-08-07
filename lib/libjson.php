<?php

class libJSON {
    private $myFile = __DIR__ . "/../db/data.json";
    private $jsondata;
    private $arr_data;

    public function getArray(): array
    {
        $this->jsondata = file_get_contents($this->myFile);
        $this->arr_data = json_decode($this->jsondata, true);
        return $this->arr_data;
    }
    public function saveArray(): void
    {
        $this->jsondata = json_encode($this->arr_data, JSON_PRETTY_PRINT);
        file_put_contents($this->myFile, $this->jsondata);
    }

    public function deleteItem(int $itemID): void
    {
        $this->getArray();
        $i = 0;
        foreach ($this->arr_data as $item) {
            if ($item[id] == $itemID) {
                unset($this->arr_data[$i]);
            }
            $i++;
        }
        $this->arr_data = array_values($this->arr_data);
        $this->saveArray();
    }

    public function addItem(array $item): void
    {
        $this->getArray();
        $this->arr_data[] = $item;
        $this->saveArray();
    }
}
