<?php
$name = getenv('NAME' ,true) ?: 'GDSC MCET';
echo sprintf('%s test page',$name);

echo "<h3>This is just to check if the cloud run and cloud SQL are connecting properly : </h3> <br> change the link to test.php";
echo "<h4>checking if the CI/CD is working properly</h4>";
echo "<h4>is CI/CD is working !</h4>";
?>
