<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial;
        margin: 0;
    }

    textarea {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        resize: none;
    }

    input[type=submit] {
        width: 100%;
        background-color: #019ADE;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<?php
    function make_editable_fields($products_list) {
        echo "<div style=\"margin-left: 15%; margin-top: 10%; width: 70%\">";
        echo "<form method=\"POST\">";

        //echo "<label for=\"input_field_text\">Ваш текст</label>";  
        echo "<center><p1><b>Ваш текст</b></p1></center>";
        echo "<textarea rows='15' name='input_field_text' placeholder='Ваш текст...'>";
        if (isset($_POST['input_field_text'])) { echo $_POST['input_field_text'];}
        echo "</textarea>";

        echo "<input type=\"submit\" name=\"submit\" value=\"Подтвердить\" action=\"index.php\">";
        if (isset($_POST['submit'])) {
            $text = $_POST['input_field_text'];
            if (strlen($text) > 0) {
                $pattern = '/(?<=[[:<:]][a-zа-я0-9ё]{6}).*?(?=[[:>:]])/ui';
                $replacement = '*';
                echo preg_replace($pattern, $replacement, $text);
            }
            else {
                echo "Заполните поле ввода!";
            }
        }
        echo "</div>";
    }
?>

</head>
<body>
    <?php
        make_editable_fields($products_list);
    ?>
</body>
</html>