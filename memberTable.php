<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "Tstd7", "w50rehrB", "sec2_7");

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_errno();
    exit();
}

mysqli_set_charset($conn, "utf8");

$sql = "SELECT * FROM member WHERE username LIKE ?";
$stmt = mysqli_prepare($conn, $sql);

$keywordParam = "%$keyword%";
mysqli_stmt_bind_param($stmt, "s", $keywordParam);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
?>
<h1>Member</h1>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
    ชื่อสมาชิก: <?= htmlspecialchars($row["name"]) ?><br>
    ที่อยู่: <?= htmlspecialchars($row["address"]) ?><br>
    อีเมล์: <?= htmlspecialchars($row["email"]) ?><br>
    <img src='../week9/mphoto/<?= htmlspecialchars($row["username"]) ?>.jpg' width='100'><br>
    <hr>
<?php endwhile; ?>

<?php
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
