<?php
require_once 'connect.php';
$user_id = $_POST['user_id'];
$stuff_id = $_POST['stuff_id'];

$query = "
INSERT INTO stuff_record 
(stuff_id, borrower_id) 
VALUES ($stuff_id,'$user_id')
";

$result = mysqli_query($conn,$query);

if($result)
{
    echo "success";
}
else{
    
    echo $query;
}

?>