<?php
require_once('easyregex.php');

$class= new easyRegex('http://savascanaltun.com.tr/app/html/ulli.html');


$baslik=$class->get('<title>::s::</title>',true,'string');




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $baslik[0];?></title>
</head>
<body>
	
	<?php
		foreach ($class->get('<li>::s::</li>',true) as $deger) {

		echo $class->encode($deger)."<br/>";
	}
	?>
</body>
</html>