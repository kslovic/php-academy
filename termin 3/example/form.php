<!DOCTYPE html>

<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        input, textarea { display: block; }
    </style>
</head>
<body>

<header>
    <ul>
        <li><a href="index.php">Naslovnica</a></li>
        <li><a href="form.php">Prijavi se</a></li>
        <li>Login (za admine)</li>
    </ul>
</header>

<main>

    <h1>Prijavnica za PHP akademiju</h1>

    <p>Prijavnica za prvo osječko izdanje PHP akademije koju Inchoo pokreće u suradnji s FERITom.</p>
    <p>Prijave traju do 10.10., pa požuri i svoje mjesto rezerviraj već sad.</p>
    <p>Više informacija na:
        <a href="http://inchoo.hr/php-akademija-2016/" target="_blank">http://inchoo.hr/php-akademija-2016/</a>
    </p>

    <!-- fix form -->
    <form method="post" action="form.php">
    <label for="name">Ime i prezime</label>
    <input id="name" placeholder="npr.Kristina Slović" name="name" required/>

    <label for="email">Mail adresa</label>
    <input id="email" placeholder="npr. kslovic@etfos.hr "name="email" type="email" required/>

    <label for="smjer">Smjer</label>
    <input id="smjer" placeholder="npr. Diplomski studij računarstva" name="smjer" required/>

    <label>Godina studija</label>
    <div class="radio">
        <label><input name="godina" type="radio" value="1"/><span>1</span></label>
    <label><input name="godina" type="radio" value="2"/><span>2</span></label>
    <label><input name="godina" type="radio" value="3"/><span>3</span></label>
    <label><input name="godina" type="radio" value="4"/><span>4</span></label>
    <label><input name="godina" type="radio" value="5"/><span>5</span></label>
    </div>
    <label>Što te motiviralo da se prijaviš?</label>
    <textarea required rows="10" cols="60">

    </textarea>


    <label>Imaš li predznanje vezano uz web development?</label>
    <textarea required rows="10" cols="60">

    </textarea>

    U kojim jezicima si do sada programirao?
    <label><input name="godina" type="checkbox" value="C"/>C</label>
    <label><input name="godina" type="checkbox" value="C#"/>C#</label>
    </form>
    
    <form method="post" action="form.php"  enctype="multipart/form-data">
    Uploadaj primjer svoga koda:
    <input type="file"/>
    <input type="submit" value="Uploadaj datoteku"/>
    </form>
</main>

<footer>
    <p>&copy; PHP Akademija, 2016</p>
</footer>

</body>
</html>