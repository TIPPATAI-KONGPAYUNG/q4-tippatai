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
<script>
    async function getDataFromAPI() {
        try {
            let response = await fetch('http://202.44.40.193/~aws/JSON/priv_hos.json');
            let rawData = await response.text();
            let objectData = JSON.parse(rawData);
            let result1 = document.getElementById('result1');
            let result2 = document.getElementById('result2');
            let result3 = document.getElementById('result3');
            

            for (let i = 0; i < objectData.features.length; i++) {
                let hospital = objectData.features[i].properties;
                if(hospital.num_bed > 90){
                    let content = 'ชื่อโรงพยาบาล: ' + hospital.name + ' (' + hospital.num_bed + ' เตียง)';
                    let li = document.createElement('li');
                    li.innerHTML = content;
                    result1.appendChild(li);
                }
                else if(hospital.num_bed > 30){
                    let content = 'ชื่อโรงพยาบาล: ' + hospital.name + ' (' + hospital.num_bed + ' เตียง)';
                    let li = document.createElement('li');
                    li.innerHTML = content;
                    result2.appendChild(li);
                }
                else{
                    let content = 'ชื่อโรงพยาบาล: ' + hospital.name + ' (' + hospital.num_bed + ' เตียง)';
                    let li = document.createElement('li');
                    li.innerHTML = content;
                    result3.appendChild(li);
                }
                
                
            }
        } catch (error) {
            console.error("Error fetching or parsing data:", error);
        }
    }
    getDataFromAPI();
</script>
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
    <h1>โรงพยาบาลเอกชน ในกทม.</h1>
        <ol id="result1" style="font-size: large;">โรงพยาบาลขนาดใหญ่</ol>
        <ol id="result2" style="font-size: large;">โรงพยาบาลขนาดกลาง</ol>
        <ol id="result3" style="font-size: large;">โรงพยาบาลขนาดเล็ก</ol>
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