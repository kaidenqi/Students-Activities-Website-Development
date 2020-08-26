
<form method="POST">
    <p>Credit Card: <input type="text" name="card" /></p>
    <p>First Name: <input type="text" name="fname" /></p>
    <p>Last Name: <input type="text" name="lname" /></p>
    <p>Address: <input type="text" name="addr" /></p>
    <p>City: <input type="text" name="city" /></p>
    <p>Sate: <input type="text" name="state" /></p>
    <p>Zip Code: <input type="text" name="zip" /></p>
    <input type="submit" value="Pay"/>
</form>



<?php
session_start();
require_once './order.php';

if(!empty($_POST)) {
    echo '<p>Purchase successed!</p>';

    $order = unserialize($_SESSION["order"]);

    // check if spend over 200 on books
    $subtotal = $order->calculate();
    $bookSum = $subtotal['book'];
    $login = $_SESSION['loginid'];
    if($bookSum >= 200) {
        $connected = mysqli_connect("localhost", "root", "", "Student_Activity_DB");
        $query = "UPDATE registrationform SET VIP=1 WHERE id='$login'";
        $result = mysqli_query($connected, $query);
        mysqli_close($connected);
    }
    
    $order->cleanItems();    // because has bought items in cart, need to clean up the cache
    updateSession($order);
    echo '<a href="../main.php"><input type="button" value="Back to Main Page"></a>';
}
?>