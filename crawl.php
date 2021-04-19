<?php
$databaseHost = 'localhost';
$databaseName = 'todo';
$databaseUsername = 'root';
$databasePassword = '';
$mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);

if(isset($_POST['Submit'])) 
{
    $main_url = $_POST['url'];
    $str = file_get_contents($main_url);
    //id
    //title
    if(strlen($str)>0)
 	{
  	$str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
  	preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
  	$title=$title[1];
	}
    //description
    $b =$main_url;
 	@$url = parse_url( $b );
 	@$tags = get_meta_tags($url['scheme'].'://'.$url['host'] );
 	$description=$tags['description'];
    //price
    $p =$main_url;
 	@$url = parse_url( $p );
 	@$tags = get_meta_tags($url['scheme'].'://'.$url['host'] );
 	$price=$tags['price'];
    //image
    $i =$main_url;
 	@$url = parse_url( $i );
 	@$tags = get_meta_tags($url['scheme'].'://'.$url['host'] );
 	$image=$tags['image'];
    //model
    $m =$main_url;
 	@$url = parse_url( $m );
 	@$tags = get_meta_tags($url['scheme'].'://'.$url['host'] );
 	$model=$tags['model'];
    //sku 
    $s =$main_url;
 	@$url = parse_url( $s );
 	@$tags = get_meta_tags($url['scheme'].'://'.$url['host'] );
 	$sku=$tags['sku'];
}
$result = mysqli_query($mysqli, "INSERT INTO web_page_details(id,title,description,price,image,model,sku) VALUES('$id','$title','$description','$price','$image','$model','$sku')");  


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Crawl A web Page</title>
  </head>
  <body>
     <div class="container">
     	<div class="jumbotron">
     		<div class="card-body"></div>
     		<form method="POST" action="">
     			<label for="url">Paste Url:</label><br><br>
  				<input class="form-control"type="text" id="url01" name="url" value=""><br><br>
  				<input type="submit" value="Crawl" name="Submit" class="btn btn-danger">
     		</form>
     		</div>
     	</div>
     </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
