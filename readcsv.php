<?php
$fh = fopen('awards.csv', 'r');
$fhg = fopen('contracts.csv', 'r');
while (($data = fgetcsv($fh, 0, ",")) !== FALSE) {
    $awards[]=$data;
}
while (($data = fgetcsv($fhg, 0, ",")) !== FALSE) {
    $contracts[]=$data;
}

for($x=0; $x<count($contracts);$x++)
{
    if($x==0){
        unset($awards[0][0]);
        $line[$x]=array_merge($contracts[0],$awards[0]); //header
    }
    else{
        $deadlook=0;
        for($y=0; $y <= count($awards);$y++)
        {
            if($awards[$y][0] == $contracts[$x][0])
            {


                unset($awards[$y][0]);
                $line[$x]=array_merge($contracts[$x],$awards[$y]);
                $deadlook = 1;

            }

        }

        if($deadlook==0)
            $line[$x]=$contracts[$x];

    }
    error_reporting(0);
}

$fp = fopen('final.csv','w');//output file set here
//$fields =array();
foreach ($line as $fields) {
    fputcsv($fp, $fields);
}
echo "<h2>The files awards.csv and contract.csv are successfully merged.</h2><br>";
//read the content of final.csv
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
echo "The total current contract amount is ".$abc;

fclose($file);
fclose($fp);
fclose($fhg);
fclose($fh);
?>
