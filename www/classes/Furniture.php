<?php

require_once 'Product.php';
require_once 'Database.php';

class Furniture extends Product
{
  
    private $height;

   
    private $width;

   
    private $length;

  
 
    public function getHeight()
    {
        return $this->height;
    }

    
    public function setHeight($height)
    {
        $this->height = $height;
    }

 
    public function getWidth()
    {
        return $this->width;
    }

   
    public function setWidth($width)
    {
        $this->width = $width;
    }

  
    public function getLength()
    {
        return $this->length;
    }

   
   
    public function setLength($length)
    {
        $this->length = $length;
    }

    public function save($conn)
    {

        $sql = "INSERT INTO product (sku, name, price, type, height,width,length) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssdssds", $this->getSku(), $this->getName(), $this->getPrice(),$this->getType(), $this->getHeight(), $this->getWidth(), $this->getLength());
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}