<?php

require_once 'Database.php';

/**
 * Product
 *
 * Abstract class
 */
abstract class Product
{
    
    protected $id;

   
    protected $sku;
   
    protected $name;

  
    protected $price;

   
    protected $type;

   
    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;
    }

   
    public function getSku()
    {
        return $this->sku;
    }

   
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

   
    public function getName()
    {
        return $this->name;
    }

  
    public function setName($name)
    {
        $this->name = $name;
    }

  
   
    public function getPrice()
    {
        return $this->price;
    }

  
    public function setPrice($price)
    {
        $this->price = $price;
    }

    

    public function getType() {
        return $this->type;
    }

   
    public function setType($type) {
        $this->type = $type;
    }

  
    abstract public function save($conn);
}
