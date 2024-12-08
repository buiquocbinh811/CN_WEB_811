<?php
class Product {
    private $products;

    public function __construct() {
        $this->products = &$_SESSION['products'];
    }

    public function add($name, $price, $image) {
        $id = time();
        $this->products[$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'image' => $image
        ];
        return $id;
    }

    public function update($id, $name, $price, $image) {
        if (isset($this->products[$id])) {
            $this->products[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image
            ];
            return true;
        }
        return false;
    }

    public function delete($id) {
        if (isset($this->products[$id])) {
            unset($this->products[$id]);
            return true;
        }
        return false;
    }

    public function getAll() {
        return $this->products;
    }

    public function getById($id) {
        return isset($this->products[$id]) ? $this->products[$id] : null;
    }
}