<?php

$pdo = new PDO("mysql:host=localhost;dbname=sec2_7;charset=utf8", "Tstd7", "w50rehrB");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$stmt->execute();

$username = $_POST["username"];

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $imageName = $username . '.jpg'; 
    $uploadDir = 'mphoto/'; 
    $uploadFile = $uploadDir . $imageName;

    
    if (move_uploaded_file($tmp_name, $uploadFile)) {
        $uploadStatus = "Image successfully uploaded as " . htmlspecialchars($imageName);
    } else {
        $uploadStatus = "Failed to upload image.";
    }
} else {
    $uploadStatus = "No image uploaded or there was an upload error.";
}

if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    echo "Upload error: " . $_FILES['image']['error'];
}

header("location: detail.php?username=" . $username);
?>
<html>
<head><meta charset="UTF-8"></head>
<body>

</body>
</html>
