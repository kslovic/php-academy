<html>
    <body>

    <h1>$_COOKIE</h1>
    <pre><?php

        var_dump($_COOKIE);
/*
        if(!isset($_COOKIE['my-name'])) {*/
            setcookie('my-name', 'Kikiriki', time()-24*3600);
       // }

    ?></pre>
</body>
</html>
