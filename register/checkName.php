<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "Tstd7", "w50rehrB", "sec2_7");

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_errno();
    exit();
}

mysqli_set_charset($conn, "utf8");

$takenUsernames = array();

$sql = "SELECT username FROM member";
$objQuery = mysqli_query($conn, $sql);

if ($objQuery && mysqli_num_rows($objQuery) > 0) {
    while ($row = mysqli_fetch_assoc($objQuery)) {
        $takenUsernames[] = $row['username'];
    }
}

sleep(1);

if (!in_array($_GET["username"], $takenUsernames)) {
    echo "okay";
} else {
    echo "denied";
}

mysqli_close($conn);
?>
