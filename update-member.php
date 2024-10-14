<?php

$pdo = new PDO("mysql:host=localhost;dbname=sec2_7;charset=utf8", "Tstd7", "w50rehrB");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE member SET password = ?, name = ?, address = ?, mobile = ?, email = ? WHERE username = ?");
    
    $stmt->bindParam(1, $_POST["password"]);
    $stmt->bindParam(2, $_POST["name"]);
    $stmt->bindParam(3, $_POST["address"]);
    $stmt->bindParam(4, $_POST["mobile"]);
    $stmt->bindParam(5, $_POST["email"]);
    $stmt->bindParam(6, $_POST["username"]);

    $stmt->execute();

    $username = $_POST["username"]; 

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $imageName = $username . '.jpg'; 
        $uploadDir = 'mphoto/'; 
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
    
}
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
  </head>

  <body>

    <header>
      <div class="logo">
        <img src="cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <div class="search">
        <form>
          <input type="search" placeholder="Search the site...">
          <button>Search</button>
        </form>
      </div>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
      <article>
        <h1>Product</h1>
        อัพเดทลูกค้าสำเร็จ <?=$username?><br>
        <?=$uploadStatus?>
      </article>
      <?php include_once('nav.php');?>
      <aside>
        <h2>Aside</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit libero sit amet nunc ultricies, eu feugiat diam placerat. Phasellus tincidunt nisi et lectus pulvinar, quis tincidunt lacus viverra. Phasellus in aliquet massa. Integer iaculis massa id dolor venenatis scelerisque.
          <br><br>
        </p>
      </aside>
    </main>
    <footer>
      <a href="#">Sitemap</a>
      <a href="#">Contact</a>
      <a href="#">Privacy</a>
    </footer>
  </body>
</html>