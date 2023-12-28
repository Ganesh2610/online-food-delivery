<?php
// echo "Result";
?>
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

?>

<?php
// Database connection settings (same as process.php)

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['exampleInputAmount'])) {
    $search = $_GET['exampleInputAmount'];

    $sql = "SELECT * FROM restaurant WHERE title LIKE '%$exampleInputAmount%'";
    $result = $conn->query($sql);
     
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "title: " . $row['title'] . "<br>";
            echo 'Akash';
        }
    } else {
        echo "No results found.";
    }
}

$conn->close();
?>
<?php
