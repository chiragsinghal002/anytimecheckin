<?php 
// $now = date('Y-m-d');
// $date = date('Y-m-d', strtotime('+1 month', strtotime($now)));
// echo $date;

// $list=array();
// $month = 12;
// $year = 2014;

// for($d=1; $d<=$date; $d++)
// {
//     $time=mktime(12, 0, 0, $month, $d, $year);          
//     if (date('m', $time)==$month)       
//         $list[]=date('Y-m-d-D', $time);
// }
// echo "<pre>";
// print_r($list);
// echo "</pre>";




// for($i = 1; $i <=  date('t'); $i++)
// {
//    // add the date to the dates array
//    $dates[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
// }

// // show the dates array
// echo "<pre>";
// print_r($dates);
//var_dump($dates);
?>

<?php
$date = date('Y-m-d');
// $date = '2003-09-01';
//$end = '2003-09-' . date('t', strtotime($date)); //get end date of month
$end = date('Y-m-d', strtotime('+1 month', strtotime($date)));
?>
<table>
    <tr>
    <?php while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('D', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        echo "<td>$day_num <br/> $day_name</td>";
    }
    ?>
    </tr>
</table>