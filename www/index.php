<?php

require 'classes/Database.php';

$db = new Database();
$conn = $db->getConn();

$sql = "SELECT *
        FROM product
        ORDER BY id;";

$stmt = $conn->query($sql);

if ($stmt === false) {
    $conn->errorInfo();
} else {
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
}

?>

<?php require 'includes/header.php'; ?>

    <main>
        <?php if (empty($products)): ?>
            <p>No products found.</p>
        <?php else: ?>

            <ul>
                <?php foreach ($products as $product): ?>
                    <li>
                        <article>
                            <p><?= $product['sku']; ?></p>
                            <p><?= $product['name']; ?></p>
                            <p><?= $product['price']; ?></p>
                            <p><?= $product['size']; ?></p>
                            <p><?= $product['height']; ?></p>
                            <p><?= $product['width']; ?></p>
                            <p><?= $product['length']; ?></p>
                            <p><?= $product['weight']; ?></p>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
        <button onclick="window.location.replace('/add-product.php')"> ADD</button>
    </main>

<?php require 'includes/footer.php'; ?>
