<div class="migas">
    <?php
    $path = $_SERVER["PHP_SELF"];
    $parts = explode('/', $path);
    if (count($parts) < 4) {
        echo ("Inicio");
    } else {
        echo ("<a href=\"/\">Inicio</a> &raquo; ");
        for ($i = 1; $i < count($parts); $i++) {
            if (!strstr($parts[$i], ".")) {
                echo ("<a href=\"");
                for ($j = 0; $j <= $i; $j++) {
                    echo $parts[$j] . "/";
                }
                ;
                echo ("\">" . str_replace('-', ' ', $parts[$i]) . "</a> » ");
            } else {
                $str = $parts[$i];
                $pos = strrpos($str, ".");
                $parts[$i] = substr($str, 0, $pos);
                echo str_replace('-', ' ', $parts[$i]);
            }
            ;
        }
        ;
    }
    ;
    ?>
</div>