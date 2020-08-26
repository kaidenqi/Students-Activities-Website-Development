<?php
session_start();
require_once '../shopping_cart/order.php';
$mealPlan = array('month' => 600, 'semester' => 1800);

if(empty($_POST)) {
    // TODO
} else {
    $plan = $_POST['meal'];
    $price = $mealPlan[$plan];

    $str = $_SESSION['order'];
    $order = unserialize($str);
    $item = new Items("meal", $plan, 1, $price);
    $order->pushItem($item);
    updateSession($order);
    header("location: ../main.php");
}
?>