<?php
session_start();
require_once './definition.php';
if(isset($_POST['select'])) {

    $records = unserialize($_SESSION['activities']);
    $select = $_POST['select'];

    $selected_activities = unserialize($_SESSION['selected']);
    foreach($select as $index) {
        $activity = $records[$index];
        $isExist = false;
        
        if(!empty($selected_activities)) {
            foreach($selected_activities as $choose) {
                if ($choose->name == $activity->name) {
                    $isExist = true;
                }
            }
        }

        if (!$isExist) {
            array_push($selected_activities, $activity);
        }
    }
    $_SESSION['selected'] = serialize($selected_activities);
}

if(!isset($_SESSION['selected'])) {
    $_SESSION['selected'] = serialize(array());
}
$selected_activities = unserialize($_SESSION['selected']);

if(!empty($selected_activities)) {
    usort($selected_activities, 'func_sort');
    print <<<EOT
    <h2>Activities list：</h2>
    <table cellpadding="0" cellspacing="0" border="1" width="90%">
        <tr>
        <td>Date</td>
        <td>Activity</td>
        <td>Location</td>
        </tr>
    EOT;
    
    foreach($selected_activities as $atv) {
        print <<<EOT
        <tr>
        <td>$atv->date</td>
        <td>$atv->name</td>
        <td>$atv->location</td>
        </tr>
        EOT;
    }
} else {
    echo "No activities!";
}
print <<<EOT
</form>
<form>
<a href="../main.php"><input type="button" value="Back to Main Page"></a>
</form>

EOT;
?>

