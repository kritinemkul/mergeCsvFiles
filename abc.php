<?php
$file = fopen("final.csv","r");
$matrix = array();
while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
    $matrix[] = $row;
}
$col1 = array();
for($i=0;$i<count($matrix);$i++) {
    $col1[] = $matrix[0][$i];
}
$abc = $matrix[3][12] + $matrix[9][12];
echo $abc;
//for($x=0; $x<count($matrix);$x++){
//    if ($matrix[$x][1] == "Current"){
//        echo $matrix[$x][12];
//        $abc += $matrix[$x][12];
//        echo $abc;
//    }
//        error_reporting(0);
//}
fclose($file);

?>