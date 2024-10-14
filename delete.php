<html>
<head><meta charset="utf-8"></head>
<body>
<?php
    $pdo = new PDO("mysql:host=localhost;dbname=sec2_7;charset=utf8", "Tstd7", "w50rehrB");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
?>
<?php
    
    $username = $_GET["username"];
    
    
    $uploadDir = '../mphoto/';
    $imageName = $username . '.jpg'; 
    $imagePath = $uploadDir . $imageName;

    
    if (file_exists($imagePath)) {
        if (unlink($imagePath)) {
            echo "Image for user '$username' has been deleted.<br>";
        } else {
            echo "Failed to delete image for user '$username'.<br>";
        }
    } else {
        echo "No image found for user '$username'.<br>";
    }

    $stmt = $pdo->prepare("DELETE FROM member WHERE username = ?");
    $stmt->bindParam(1, $username);
    if ($stmt->execute()) {
        header("location: db6.php");
    }
?>
</body>
</html>
