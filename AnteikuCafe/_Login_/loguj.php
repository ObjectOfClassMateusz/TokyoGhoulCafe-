<?php 
session_start();

if ((!isset($_POST['pass_'])) || (!isset($_POST['email_'])))
{
		header('Location: x.php');
		exit();
}

require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

//////////////////////////////////////////////////////////////
if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['email_'];
		$haslo = $_POST['pass_'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		//https://www.php.net/manual/en/function.sprintf.php
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM account WHERE EMAIL='%s'AND PASSWD='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['ID'] = $wiersz['ID'];
				$_SESSION['PASSWD'] = $wiersz['PASSWD'];
				$_SESSION['EMAIL'] = $wiersz['EMAIL'];
				$_SESSION['NICK'] = $wiersz['NICK'];
				$_SESSION['IMAGE'] = $wiersz['IMAGE'];
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: HELLO.php');
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red; font-size:20px; "><b>不正なログインまたはパスワード！</b></span>';
				header('Location: x.php');
				
			}
			
		}
		
		$polaczenie->close();
	}


?>