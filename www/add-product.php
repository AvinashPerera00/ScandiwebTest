
<?php

require 'classes/Database.php';
require 'classes/Product.php';
require 'classes/Book.php';
require 'classes/Dvd.php';
require 'classes/Furniture.php';
require 'includes/url.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new Database();
  $conn = $db->getConn();

  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $productType = $_POST['productType'];
  
  switch ($productType) {
    case 'book':
        $book = new Book($sku, $name, $price);
        $book->setWeight($_POST['weight']);
        $book->save($conn);
        break;
    case 'dvd':
        $dvd = new DVD($sku, $name, $price);
        $dvd->setSize($_POST['size']);
        $dvd->save($conn);
        break;
    case 'furniture':
        $furniture = new Furniture($sku, $name, $price);
        $furniture->setDimensions($_POST['height'], $_POST['width'], $_POST['length']);
        $furniture->save($conn);
        break;
    default:
        break;
}

    header("Location: /index.php");
    exit();

}

?>



<?php require 'includes/header.php';?>

<form id="product_form" method="post">
  <div>
    <label> SKU </label>
    <input type="text" name="sku" id="sku" required>
  </div>
  <div>
    <label> Name </label>
    <input type="text" name="name" id="name">
  </div>
  <div>
    <label> Price </label>
    <input type="text" name="price" id="price">
  </div>
  <div>

    <label>Type Switcher</label>
    <select name="productType" id="productType">
      <option value="selectT">Select type</option>
      <option value="dvd">DVD</option>
      <option value="book">Book</option>
      <option value="furniture">Furniture</option>
    </select>
  </div>

  <div id="dvd_details" style="display: none;">
    <label>Size</label>
    <input type="text" name="size" id="size">
    <p style="color:red">Please, provide size!</p>
  </div>

  <div id="book_details" style="display: none;">
    <label>Weight</label>
    <input type="text" name="weight" id="weight">
    <p style="color:red">Please, provide weight!</p>
  </div>

  <div id="furniture_details" style="display: none;">
    <label>Height:</label>
    <input type="text" name="height" id="height">
    <label>Width:</label>
    <input type="text" name="width" id="width">
    <label>Length:</label>
    <input type="text" name="length" id="length">
    <p style="color:red">Please, provide dimensions!</p>
  </div>

  <button type="submit">Save</button>
  <button type="reset" onclick="window.location.replace('/index.php')">Cancel</button>

</form>
<?php require 'includes/footer.php';?>

   