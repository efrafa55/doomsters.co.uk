<?php
$connectionInfo = array("UID" => "doomapi", "PWD" => "Th3H34d5", "Database"=>"DOOMSTERS");  
$serverName = "localhost\sqlexpress";  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  
  
if( $conn )  
{  
     echo "Connection established.<br>";  
}  
else  
{  
     echo "Connection could not be established.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  


$sql = "SELECT [id], [data] FROM testtable";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['id']."  ".$row['data']."<br />";
}

sqlsrv_free_stmt( $stmt);




sqlsrv_close( $conn);
?>