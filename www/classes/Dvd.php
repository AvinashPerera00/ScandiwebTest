<?php

require_once 'Product.php';
require_once 'Database.php';

class Dvd extends Product
{
    
    private $size;


    
    public function getSize()
    {
        return $this->size;
    }

   
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function save($conn)
    {

        $sql = "INSERT INTO product (sku, name, price, type, size) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssdss", $this->getSku(), $this->getName(), $this->getPrice(),$this->getType(), $this->getSize());
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
