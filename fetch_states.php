<?php 
include('db_connect.php');

if(isset($_GET['q']))
{
$sql = "SELECT DISTINCT state FROM csc_names where country='".$_GET['q']."' ORDER BY state ASC";
$result = $conn->query($sql);
echo '<option value="">Select State </option>'; 
while($row = $result->fetch_assoc()) {
    echo '<option  value="' . htmlspecialchars($row["state"]) . '">' . htmlspecialchars($row["state"]) . '</option>';
    //print_r($row);
    // var_dump($row["country"]);
}
            
               
}else{

    $sql = "SELECT DISTINCT city FROM csc_names where state='".$_GET['state']."' ORDER BY city ASC";
    $result = $conn->query($sql);
    echo '<option value="">Select City </option>'; 
    while($row = $result->fetch_assoc()) {
        echo '<option  value="' . htmlspecialchars($row["city"]) . '">' . htmlspecialchars($row["city"]) . '</option>';
        //print_r($row);
        // var_dump($row["country"]);
    }
    

}           
                
?>
