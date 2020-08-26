<?php
class Activity
{
    public string $date = "";
    public string $name = "";
    public string $location = "";

    public function __construct($d, $n, $l) {
        $this->date = $d;
        $this->name = $n;
        $this->location = $l; 
    }
}
?>

<?php

function func_sort($l, $r) {
    $date1 = (new DateTime($l->date))->format('m/d/y');
    $date2 = (new DateTime($r->date))->format('m/d/y');

    if(strtotime($date1) >= strtotime($date2)) {
        return 1;
    } else {
        return -1;
    }
}
?>