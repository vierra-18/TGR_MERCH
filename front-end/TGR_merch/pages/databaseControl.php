<!-- Sorry Robin labyu <3-->
<?php
include('databaseConnect.php');
$tableDB = "orders";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Insert title here</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>

<body>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Customer Number</th>
                <th>Customer Email</th>
                <th>Customer Address</th>
                <th>Order Date</th>
                <th>Merch Type</th>
                <th>Merch Price</th>
                <th>Courier Choice</th>
                <th>Courier Number</th>
                <th>Order Status</th>
                <th>Payment Image</th>
                <th>Payment Status</th>
            </tr>
            <?php
            function outputMySQLToHTMLTable(pdo $pdo, string $table)
            {
                $tableNames = $pdo
                    ->query('SHOW TABLES')
                    ->fetchAll(PDO::FETCH_COLUMN);
                $stmt = $pdo->query('SELECT * FROM ' . $table);
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $columnCount = $stmt->columnCount();
                if ($data) {
                    foreach ($data as $row) {
                        echo '<tr>';
                        foreach ($row as $cell) {
                            echo '<td>' . htmlspecialchars($cell) . '</td>';
                        }
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="' .
                        $columnCount .
                        '">No records in the table!</td></tr>';
                }
                echo '</table>';
            }

            outputMySQLToHTMLTable($pdo, $tableDB);
            ?>
        </table>
    </div>
    <?php if (isset($_POST['insert'])) {
        $OrderID = $_REQUEST['OrderID'];
        $LastName = $_REQUEST['LastName'];
        $FirstName = $_REQUEST['FirstName'];
        $CustomerNumber = $_REQUEST['CustomerNumber'];
        $CustomerEmail = $_REQUEST['CustomerEmail'];
        $CustomerAddress = $_REQUEST['CustomerAddress'];
        $OrderDate = $_REQUEST['OrderDate'];
        $MerchType = $_REQUEST['MerchType'];
        $MerchPrice = $_REQUEST['MerchPrice'];
        $CourierChoice = $_REQUEST['CourierChoice'];
        $CourierNumber = $_REQUEST['CourierNumber'];
        $OrderStatus = $_REQUEST['OrderStatus'];
        $PaymentImage = $_REQUEST['PaymentImage'];
        $PaymentStatus = $_REQUEST['PaymentStatus'];
        $sql = "INSERT INTO $tableDB (`OrderID`, `LastName`, `FirstName`, `CustomerNumber`, `CustomerEmail`, `CustomerAddress`, 'OrderDate',`MerchType`, `MerchPrice`, `CourierChoice`, `CourierNumber`, `OrderStatus`, 'PaymentImage' ,`PaymentStatus`) 
                    VALUES ('$OrderID', '$LastName', '$FirstName', '$CustomerNumber', '$CustomerEmail', '$CustomerAddress','$OrderDate' , '$MerchType', '$MerchPrice', '$CourierChoice', '$CourierNumber', '$OrderStatus', '$PaymentImage','$PaymentStatus')";
        if ($pdo->query($sql)) {
            echo '<h3>Successful</h3>';
            header('Location:databaseControl.php?status=SUCCESS');
        } else {
            echo '<h3>Unsuccessful, Retry</h3>';
        }
    } else {
        echo '<h3>Failure</h3>';
    } ?>
    <h3>Insert</h3>
    <form action="#" method="post">
        <input type="text" name="OrderID" class="form-field" placeholder="Order ID" />
        <input type="text" name="LastName" class="form-field" placeholder="Last Name" />
        <input type="text" name="FirstName" class="form-field" placeholder="First Name" />
        <input type="text" name="CustomerNumber" class="form-field" placeholder="Customer Number" />
        <input type="text" name="CustomerEmail" class="form-field" placeholder="Customer Email" />
        <input type="text" name="CustomerAddress" class="form-field" placeholder="Customer Address" />
        <input type="text" name="OrderDate" class="form-field" placeholder="Order Date" />
        <input type="text" name="MerchType" class="form-field" placeholder="Merch Type" />
        <input type="text" name="MerchPrice" class="form-field" placeholder="Merch Price" />
        <input type="text" name="CourierChoice" class="form-field" placeholder="CourierChoice" />
        <input type="text" name="CourierNumber" class="form-field" placeholder="CourierNumber" />
        <input type="text" name="OrderStatus" class="form-field" placeholder="Order Status" />
        <input type="text" name="PaymentImage" class="form-field" placeholder="Payment Image" />
        <input type="text" name="PaymentStatus" class="form-field" placeholder="Payment Status" />
        <input type="submit" value="Insert" name="insert" />
    </form>

    <h3>Update</h3>
    <form action="#" method="post">
        <input type="text" name="ID" class="form-field" placeholder="ID" />
        <label for="dataColumn">Column</label>
        <select id="dataColumn" name="dataColumn">
            <option value="OrderID">Order ID</option>
            <option value="LastName">Last Name</option>
            <option value="FirstName">First Name</option>
            <option value="CustomerNumber">Customer Number</option>
            <option value="CustomerEmail">Customer Email</option>
            <option value="CustomerAddress">Customer Address</option>
            <option value="OrderDate">Order Date</option>
            <option value="MerchType">Merch Type</option>
            <option value="MerchPrice">Merch Price</option>
            <option value="CourierChoice">Courier Choice</option>
            <option value="CourierNumber">Courier Number</option>
            <option value="OrderStatus">Order Status</option>
            <option value="PaymentImage">Payment Image</option>
            <option value="PaymentStatus">Payment Status</option>
        </select>
        <input type="text" name="dataReplacement" class="form-field" placeholder="Insert Data" />
        <input type="submit" value="Insert" name="Update" />
    </form>
    <?php if (isset($_POST['Update'])) {
        $dataColumn = $_POST['dataColumn'];
        $dataReplacement = $_POST['dataReplacement'];
        $id = $_POST['ID'];
        $sql = "UPDATE $tableDB SET $dataColumn='$dataReplacement' WHERE ID=$id";
        if ($pdo->query($sql) === true) {
            echo '<h3>Successful</h3>';
            header('Location:databaseControl.php?status=SUCCESS');
        }
    } ?>

    <h3>Delete</h3>
    <form method="POST">
        <input type="text" name="ID" class="form-field" placeholder="ID" />
        <input type="submit" value="Delete" name="delete" />
    </form>
    <?php if (isset($_POST['delete'])) {
        $id = $_POST['ID'];
        $sql = "DELETE FROM $tableDB WHERE ID = $id";
        // echo "Are you sure to delete $id?";
        // echo '<input type="submit" name="yes" value="Yes"></input> <input type="submit" name="no" value="No"></input>';
        // if(isset($_POST['yes']))
        // {
        if ($pdo->query($sql) === true) {
            echo '<h3>Successful</h3>';
            header('Location:databaseControl.php?status=SUCCESS');
        }
        //}
    } ?>

</body>

</html>