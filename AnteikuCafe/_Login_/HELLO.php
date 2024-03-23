<?php

	session_start();
	if (!isset($_SESSION['zalogowany']))
	{header('Location: x.php'); exit();}
	
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
<?php

?>
	</title>
</head>

<body>
<?php

	echo "<p>Witaj ".$_SESSION['NICK'].'! [ <a href="logout.php">LogOut!</a> ]</p>';
    echo "<p><b>E-mail</b>: ".$_SESSION['EMAIL'];
	echo "<br>";
	echo '<img src="'.$_SESSION['IMAGE'].'" alt="noimage">';
	echo"<br/>";
	echo '<a href="../index.php" >Return to Main Page</a>';
	
?>


</body>
</html>