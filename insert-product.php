<?php
$pdo = new PDO("mysql:host=localhost;dbname=sec2_7;charset=utf8", "Tstd7", "w50rehrB");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("INSERT INTO product (pname, pdetail, price) VALUES (?, ?, ?)");
$stmt->bindParam(1, $_POST["pname"]);
$stmt->bindParam(2, $_POST["pdetail"]);
$stmt->bindParam(3, $_POST["price"]);
$stmt->execute(); 
$pid = $pdo->lastInsertId();


if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $imageName = $pid . '.jpg'; 
    $uploadDir = 'pphoto/'; 
    $uploadFile = $uploadDir . $imageName;


    if (move_uploaded_file($tmp_name, $uploadFile)) {
        $uploadStatus = "Image successfully uploaded as " . htmlspecialchars($imageName);
    } else {
        $uploadStatus = "Failed to upload image.";
    }
} else {
    $uploadStatus = "No image uploaded or there was an upload error.";
}

header("location: list-product.php");
?>
<html>
<head><meta charset="UTF-8"></head>
<body>

</body>
</html>
