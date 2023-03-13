<?php

require_once 'Product.php';
require_once 'Database.php';

class Book extends Product
{
  
    private $weight;


   
    public function getWeight()
    {
        return $this->weight;
    }

   
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

  
public function save($conn)
    {
        
        $sql = "INSERT INTO product (sku, name, price, type, weight) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssdss", $this->getSku(), $this->getName(), $this->getPrice(),$this->getType(), $this->getWeight());
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
