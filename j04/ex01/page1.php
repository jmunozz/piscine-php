<?PHP
$str = array($a, $b);
$a = "je suis jordan\n";
$b = "je ne suis pas encore mort\n";
print_r($str);
$s = serialize($str);
file_put_contents('save', $str)
?>
<html><a href='page2.php'>Va sur la page 2 </a></html>
