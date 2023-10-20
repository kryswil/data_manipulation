<?php
require_once 'dbconnect.php';
$query ="select *from staff";
$result = $con->query($query);

if(!$result)
echo mysql_fatal_error();
$rows =$result->num_rows;
echo "<table border=2
<th>First Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Address</th>
";

//this code fetches a single item at a time
for ($j=0; $j<=$rows-1; ++$j){
    $result->data_seek($j);

    //the value firstname is a field in my table. Replace it with the correct field on your table.
    echo '<tr><td>'.htmlspecialchars($result->fetch_assoc()['firstname']).'</td>';
    $result->data_seek($j);
    //the value lastname is a field in my table. Replace it with the correct field on your table.
    echo '<td>'.htmlspecialchars($result->fetch_assoc()['lastname']). '</td>';
    $result->data_seek($j);
    //the value gender is a field in my table. Replace it with the correct field on your table.
    echo '<td>'.htmlspecialchars($result->fetch_assoc()['gender']).'</td>';
    $result->data_seek($j);
    //the value address is a field in my table. Replace it with the correct field on your table.
    echo '<td>'.htmlspecialchars($result->fetch_assoc()['address']).'</td></tr>';

}
echo "</table>";
$result->close();
$con->close();
?>