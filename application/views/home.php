<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SWMail</title>
    </head>
    <body>
        Este é o HTML Inicial!
        <table>
        <?php
            foreach ($r as $item) {
                echo "<tr>";
                echo "<td>".$item->id."</td>";
                echo "<td>".$item->nome."</td>";
                echo "<td>".$item->email."</td>";
                echo "</tr>";
            }
        ?>
        </table>
    </body>
</html>
