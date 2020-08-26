

<?php
 // session_start();
// require_once '../query_sql/connect.php';
class Items {
    public string $category = "";  // book, meal, ticket
    public string $itemName = "";
    public int $quality = 0;
    public float $price = 0.0;
    

    public function __construct($aCategory, $aName, $aQuality, $aPrice) {
        $this->category = $aCategory;
        $this->itemName = $aName;
        $this->quality = $aQuality;
        $this->price = $aPrice; 
    }

    public function getItemAsArray() {
        $arr = array();
        array_push($arr, $this->category);
        array_push($arr, $this->itemName);
        array_push($arr, $this->quality);
        array_push($arr, $this->price);
        return $arr;
    }
}


class Order {
    private static $_instance;
    private $_userName;
    private $_items = array();

    private function __construct() {
        
    }

    private function __clone() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function checkVIP() {
        $login = $_SESSION['loginid'];
        $connected = mysqli_connect("localhost", "root", "", "Student_Activity_DB");
        $query = "SELECT * FROM registrationform where id = '$login'";
        $result = mysqli_query($connected, $query);
        $records = array();
        while($obj = mysqli_fetch_object($result))
        {
            array_push($records, $obj);
        }
        if(count($records) == 1) {
            $obj = $records[0];
            return $obj->VIP;
        } else {
            return 0;
        }
    }

    public function setUserName($userName) {
        $this->_userName = $userName;
    }

    public function pushItem($item) {
        // check if this item exist, add quality
        $isExist = false;
        foreach($this->_items as &$element) {
            if($element->category == $element->category 
                && $element->itemName == $item->itemName) {
                $isExist = true;
                ++$element->quality;
            }
        }
        if(!$isExist) {
            array_push($this->_items, $item);
        }

        unset($element);
    }

    public function getItems() {
        return $this->_items;
    }
    
    public function cleanItems() {
        unset($this->_items);
    }

    public function calculate() {
        $bookSum = 0.0;
        $mealSum = 0.0;
        $ticketSum = 0.0;

        foreach($this->_items as $item) {
            if($item->category == "book") {
                $bookSum += $item->price * $item->quality;
            } elseif($item->category == "meal") {
                $mealSum += $item->price * $item->quality;
            } else {
                $ticketSum += $item->price * $item->quality;
            }
        }

        if($bookSum >= 200.0) {
            $discount = 1.0;
            if ($this->checkVIP() == 1) {
                $discount = 0.90;
            } 
            $bookSum = $bookSum * $discount;
        }

        if($mealSum >= 1800.0) {
            $mealSum = $mealSum * 0.95;
        }

        $total = array('book'=>$bookSum, 'meal'=>$mealSum, 'ticket'=>$ticketSum);
        return $total;
    }
}

function updateSession(&$order) {
    $_SESSION['order'] = serialize($order);
}
?>

