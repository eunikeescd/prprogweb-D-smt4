<?php
    $n = 5;
    if($n >= 1 && $n <= 3){
        for($i=0; $i<$n; $i++){
            echo "1 ";
        }
    }
    else{
        $angka = [];
        array_push($angka, 1);
        array_push($angka, 1);
        array_push($angka, 1);
        echo str_repeat("1 ", 3);
        for($i=0; $i<$n-3; $i++){
            $nextElement = $angka[$i]+$angka[$i+1]+$angka[$i+2];
            echo $nextElement." ";
            array_push($angka, $nextElement);
        }
    }
?>
