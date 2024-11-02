<?php
    require_once 'includes/config.inc.php';

    $stmt = $pdo->query("SELECT COUNT(*) as count FROM items");
    $totalItems = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    $stmt = $pdo->query("SELECT SUM(item_qty) as total_qty FROM items");
    $totalStocks = $stmt->fetch(PDO::FETCH_ASSOC)['total_qty'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="div1">
            <div class="">
                <h1 class="lbl_dashboard">Dashboard</h1>
                <div class="div1_dashboard">
                    <p>Total Items: <?php echo $totalItems ?></p>
                    <p>Total Stocks: <?php echo $totalStocks ?: 0 ?></p>
                </div>
            </div>
        </div>

        <div class="div2">
            <div class="add">
                <h2>Add</h2>
                <form action="includes/insert_item.inc.php" method="POST" class="add_form">
                    <label for="item">Item: </label>
                    <input type="text" name="item" id="item">
                    <label for="qty">Qty: </label>
                    <input type="number" name="qty" id="qty">
                    <input type="submit" value="Save">  
                </form>
            </div>

            <div class="delete">
                <h2>Delete</h2>
                <form action="includes/delete_item.inc.php" method="POST">
                    <label for="items">Items: </label>
                    <select name="items" id="items">
                        <?php
                            $stmt = $pdo->query("SELECT * FROM items");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='{$row['item_id']}'>{$row['item_name']}</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" value="Delete">
                </form>
            </div>
        </div>
    </div>
</body>
</html>