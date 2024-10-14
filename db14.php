<?php
    $pdo = new PDO("mysql:host=localhost;dbname=sec2_7;charset=utf8", "Tstd7", "w50rehrB");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
?>
<?php
    
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?"); 
    $stmt->bindParam(1, $_GET["username"]); 
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
        <h1>Product</h1>
        <form>
            Username : <input type="text" name="username" value="<?=$row["username"]?>"><br>
            <input type="submit" value="ค้นหา"><br>
        </form>
        <form action="update-member.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?=$row["username"]?>">
            Password : <input type="password" name="password" value="<?=$row["password"]?>"><br>
            Name: <input type="text" name="name" value="<?=$row["name"]?>"><br>
            Address: <input type="text" name="address" value="<?=$row["address"]?>"><br>
            Phone: <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
            Email: <input type="text" name="email" value="<?=$row["email"]?>"><br>
            Image: <input type="file" name="image" value="mphoto/<?=$row["username"]?>.jpg"><br>
            <input type="submit" value="แก้ไขลูกค้า">
        </form>
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