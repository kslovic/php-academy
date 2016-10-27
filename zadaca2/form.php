<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>PHP akademija-prijava</title>
    <style>
	
        input[type=text], textarea, label { display: block; }
		main{
			border:5px solid olivedrab;
			border-radius: 25px;
			margin:20px;
			padding:20px;
			color:olivedrab;
			
		}
		 h1{
	color:olivedrab;
	font-size:25px;
		}
		p{
			font-size:17px;
			font-weight: bold;
		}
		ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: olivedrab;
}
a{
		color:black;
	}
	input[type=submit], input[type=file]{
		background-color:olivedrab;
		color:white;
	}
	input[type=submit]:hover, input[type=file]{
    background-color: yellowgreen;
}
    </style>
</head>
<body>

<header>
    <ul>
        <li><a href="index.php">Naslovnica</a></li>
        <li><a href="form.php">Prijavi se</a></li>
        <li><a href="login.php">Prijavi se(kao admin)</a></li>
    </ul>
</header>
<?php
if(isset($_POST['prijava'])){
   if($_FILES['code']['name']) {
$uploadpath = "uploads/";
$filename=$_FILES['code']['name'];
$cleanfile=mysql_escape_string($_FILES['code']['name']);
$temp = explode(".", $_FILES["code"]["name"]);
$newfilename = $_POST['name'] . 'Code.txt';
 if(move_uploaded_file($_FILES["code"]["tmp_name"],  $uploadpath . $newfilename)) {?> <p> <?php echo "Vaš kod je uspješno objavljen!"; ?> </p><br> <?php 
 }
}
}
if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['smjer'])&& isset($_POST['godina'])&& isset($_POST['motivacija'])&& isset($_POST['predznanje'])) {
    $jezici=" ";
	$name=array();
	if(isset($_POST['jezik'])){
		$name = $_POST['jezik'];
		foreach($name as $jezik){
		$jezici.=$jezik ." ";

}
	}
	$myfile = fopen("uploads/".$_POST['name'].".txt", "w") or die("Unable to open file!");
	$data ="Ime i prezime:". $_POST['name'] . "\nE-mail:" . $_POST['email'] . "\nSmjer:" . $_POST['smjer'] . "\nGodina:" . $_POST['godina'] . "\nŠto te motiviralo da se prijaviš?" . $_POST['motivacija'] . "\nImaš li predznanje vezano uz web development?" . $_POST['predznanje'] . "\nU kojim jezicima si do sada programirao?" . $jezici;
    $ret = file_put_contents('uploads/'.$_POST['name'].'.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
       ?> <p> <?php echo "Uspješno ste poslali prijavu !!! :)";?> </p><?php
    }
}

else{
?>
<main>

    <h1>Prijavnica za PHP akademiju</h1>

    <p>Prijavnica za prvo osječko izdanje PHP akademije koju Inchoo pokreće u suradnji s FERITom.</p>
    <p>Prijave traju do 10.10., pa požuri i svoje mjesto rezerviraj već sad.</p>
    <p>Više informacija na:
        <a href="http://inchoo.hr/php-akademija-2016/" target="_blank">http://inchoo.hr/php-akademija-2016/</a>
    </p>

    <!-- fix form -->
	
    <form method="post" action="form.php" enctype="multipart/form-data">
    <label for="name">Ime i prezime:</label>
    <input id="name" placeholder="npr.Kristina Slović" name="name" required/>

    <label for="email">Mail adresa:</label>
    <input id="email" placeholder="npr. kslovic@etfos.hr "name="email" type="email" required/>

    <label for="smjer">Smjer:</label>
    <input id="smjer" placeholder="npr. Diplomski studij računarstva" name="smjer" required/>

    <label>Godina studija:</label><br>
    <label><input name="godina" type="radio" value="1" checked/>1</label>
    <label><input name="godina" type="radio" value="2"/>2</label>
    <label><input name="godina" type="radio" value="3"/>3</label>
    <label><input name="godina" type="radio" value="4"/>4</label>
    <label><input name="godina" type="radio" value="5"/>5</label>
    
    <label>Što te motiviralo da se prijaviš?</label>
    <textarea name="motivacija"required rows="10" cols="60">

    </textarea>


    <label>Imaš li predznanje vezano uz web development?</label>
    <textarea name="predznanje" required rows="10" cols="60">

    </textarea>

    U kojim jezicima si do sada programirao?
    <label><input name="jezik[]" type="checkbox" value="C"/>C</label>
    <label><input name="jezik[]" type="checkbox" value="C#"/>C#</label>
	<label><input name="jezik[]" type="checkbox" value="C++"/>C++</label>
    <label><input name="jezik[]" type="checkbox" value="Java"/>Java</label><br>
	Uploadaj primjer svoga koda:
    <input type="file" name="code"/>
	 <input type="submit" name="prijava" value="Predaj prijavu"/>
    </form>
</main>

<footer>
    <p>&copy; PHP Akademija, 2016</p>
</footer>

</body>
</html> <?php }