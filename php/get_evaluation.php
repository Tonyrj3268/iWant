<?php


require_once 'connect.php';
//取得通知ID和內容
$query = "SELECT rating,evaluation,borrower_id FROM `db-test`.stuff_record where stuff_id=".$_POST['stuff_id']." and rating IS NOT NULL";
$result = mysqli_query($conn,$query);
$output='';
foreach($result as $row)
{
    $rating='';
    for($i=0;$i<$row["rating"];$i++){
        $rating.="⭐";
    }
    
    $output .= '
            <div style="width:100%">
            <a>'.$row["borrower_id"].'-'.$rating.'</a></br>
            <a>'.$row["evaluation"].'</a><hr>
            </div>
            ';
    
}

echo $output;

?>