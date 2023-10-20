<?php
//this program will demonstrate how to use insert and select in php.
require_once 'dbconnect.php';
$author = $_REQUEST['author'];
$title = $_REQUEST['title'];
$category = $_REQUEST['category'];
$year = $_REQUEST['year'] ; 
$isbn = $_REQUEST['isbn'] ; 
if(isset($author) && isset($title) && isset($category) && isset($year) && isset($isbn)) {
 $query = "insert into classics values('$author', '$title', '$category','$year','$isbn')";
 if($con -> query($query) === true) {
 echo " records inserted" ;
 }else {
 echo "insert failed";
 }
} 
$query = "select * from classics" ;
$result = $con->query($query);
if(!$result){
 echo die("database access failed") ;
}
$rows = $result->num_rows ;
echo "<table border=2 >
 <th>Author</th>
 <th>Title</th>
 <th>Category</th>
 <th>Year</th>
 <th>ISBN</th>
 
 ";
for($j=0; $j<$rows-1; $j++){
 $row = $result->fetch_array(MYSQLI_ASSOC) ; 
 echo "<tr> 
 <td>". htmlspecialchars($row['author']).
 "</td>";
 echo "<td> ". htmlspecialchars($row['title']).
 "</td>";
 echo "<td>
 ". htmlspecialchars($row['category']).
 "</td>";
 echo "<td>
 ". htmlspecialchars($row['year']).
 "</td>";
 echo "<td>
 ". htmlspecialchars($row['isbn']).
 "</td> </tr>";
}
echo "</table" ;
$result->close();
$con->close()