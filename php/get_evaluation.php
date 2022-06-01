<?php


require_once 'connect.php';
//取得通知ID和內容
$query = "SELECT rating,evaluation,borrower_id FROM `db-test`.stuff_record where stuff_id=".$_POST['stuff_id']."";
$result = mysqli_query($conn,$query);
$output='<hr>';
foreach($result as $row)
{
    $rating='';
    for($i=0;$i<$row["rating"];$i++){
        $rating.="⭐";
    }
    $output .= '
            <div>
            <a>'.$row["borrower_id"].'</a></br>
            <a>'.$rating.'</a></br>
            <a>'.$row["evaluation"].'</a><hr>
            </div>
            ';
    
}

echo $output;

?>