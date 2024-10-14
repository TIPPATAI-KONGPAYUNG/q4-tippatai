<?php $pdo = new PDO("mysql:host=localhost;dbname=sec2_7;charset=utf8", "Tstd7", "w50rehrB");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php

$stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
$stmt->bindParam(1, $_GET["pid"]); 
$stmt->execute(); 
$row = $stmt->fetch(); 
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
        <h1>Edit Product</h1>
        <form action="edit-product.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?=$row["pid"]?>">
            ชื่อสินค้า : <input type="text" name="pname" value="<?=$row["pname"]?>"><br>
            รายละเอียดสินค้า : <br>
            <textarea name="pdetail" rows="3" cols="40"><?=$row["pdetail"]?></textarea><br>
            ราคา: <input type="number" name="price" value="<?=$row["price"]?>"><br>
            รูปภาพ <input type="file" name="image" value="pphoto/<?=$row["pid"]?>.jpg"><br>
            <input type="submit" value="แก้ไขสินค้า">
        </form>
      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li><a href="./mpage.html">Home</a></li>
          <li><a href="./db1.php">Page 01</a></li>
          <li><a href="./list-product.php">list-product</a></li>
          <li><a href="./list-member.php">list-member</a></li>
          <li><a href="./db4.php">Page 04</a></li>
          <li><a href="./db10.php">Page 10</a></li>
          <li><a href="./db11.php">Page 11</a></li>
          <li><a href="./db12.php">Page 12</a></li>
          <li><a href="./db13.php">Page 13</a></li>
          <li><a href="./db14.php">Page 14</a></li>
        </ul>
      </nav>
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