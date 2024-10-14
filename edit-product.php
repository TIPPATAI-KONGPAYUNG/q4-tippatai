<?php
$pdo = new PDO("mysql:host=localhost;dbname=sec2_7;charset=utf8", "Tstd7", "w50rehrB");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("UPDATE product SET pname=?, pdetail=?, price=? WHERE pid=?");
$stmt->bindParam(1, $_POST["pname"]);
$stmt->bindParam(2, $_POST["pdetail"]);
$stmt->bindParam(3, $_POST["price"]);
$stmt->bindParam(4, $_POST["pid"]);

$pid = $_POST["pid"];

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $imageName = $pid . '.jpg'; 
    $uploadDir = 'pphoto/'; 
    $uploadFile = $uploadDir . $imageName;

    $oldImage = $uploadDir . $imageName;
    if (file_exists($oldImage)) {
        unlink($oldImage); 
    }

    
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

header("location: db13.php");

?>
