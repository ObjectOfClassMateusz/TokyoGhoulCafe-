<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: HELLO.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="ja">
   <head>
     <meta charset="UTF-8"/>
	 <meta http-equiv="X-UACompatible" content="IE=edge,chrome=1"/>
	 <meta name="description" content="..."/>
	 <meta name="keywords" content="1,2,3,4,5,6,"/>
	 <link rel="shortcut icon" href="log.png">
	 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=BIZ+UDMincho&family=Reggae+One&display=swap" rel="stylesheet">
	 <title>✐-あんていく-✐-ログイン-✐</title>
	<style>

	body{margin:0; padding:0;
	display: flex;
	justify-content: center; align-items: center;
	background-color: rgb(22, 71, 71);
	animation: _bodycolor_ 2s 0.01s ;
	font-family: 'BIZ UDMincho', serif;}

	p{font-family: 'Reggae One', cursive;font-size: 30px;}

	@keyframes _bodycolor_ 
	{
		from 
		{background-color: aqua;}
		33%
		{background-color: rgb(62, 221, 221);}
		66%
		{background-color: rgb(43, 139, 139);}
		to
		{background-color: rgb(22, 71, 71);}
	}	
	.main
	{
		animation: _show_ 1.5s ;
		width:70% ;height:650px; margin-top: 2%;
		background-image:url('c.jpg');
		border:solid 3px rgb(20, 4, 105);
		background-repeat: no-repeat; 
		background-attachment: fixed;  
		box-shadow: 9px 5px 5px rgb(2, 2, 58);
		background-size: cover;display:flex;
	}
	@keyframes _show_ 
	{
		from{opacity: 0;width: 0%;}
		to{opacity: 1;width: 70%;}
	}

	.F{text-shadow: 2px 2px #9989f5;text-align: center;}
	
	input[type="password"] , input[type="text"]
	{
		margin: 10px; width: 60%;
		background-color:rgb(227, 199, 254);
		border-radius: 10px;
		height: 20px;
		box-shadow: 4px 3px rgb(3, 123, 63);
		opacity: 50%;
		transition: opacity 0.5s , width 0.25s;
	}
	input[type="password"]:focus , input[type="text"]:focus
	{opacity: 100%;width: 66%;}
/*###########################################*/
	input[type="submit"]
	{
		height: 90px;
		width: 90px;
		border-radius: 50px;
		color: red;
		text-shadow: 3px 3px 3px black;
		text-decoration: overline;
		font-size:25px;
		cursor: url(../cursor-kopia.png) , auto;
	}
	input[type="submit"]:hover
	{background-color: rgb(230, 185, 185);}

	button
	{margin-top: 20px;}

	a:hover
    {cursor: url(../cursor-kopia.png) , auto;}
	 
	</style>
</head>
<body>

	<div class="main">
	
			<div style=" width: 50%;"><img src="Nishiki1.png" alt="Nishiki disapeard" style="filter: drop-shadow(0 0 0.5rem rgb(123, 123, 206));
			height:100%;  object-fit: fill;">
			</div>
			
			<div style="color:white;
			display:flex; justify-content: center; align-items:center;
			flex-direction: column;
			width:50%;object-fit: contain;">

			
			<form class="F" action="loguj.php" method="post">
				<p>サインイン</p>

				電子メイル 📧 :<input name="email_" type="text"     placeholder="あいうえお@.com"><br>
				パスワード 👤 :<input name="pass_" type="password" placeholder="******"><br>

				<p>アカウントを作成する</p>
				<input type="submit" value="作成"><br><br>
				<a href="CREATE.php">パスワードをお忘れですか？</a><br>
			</form>

			<?php
			if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
			?>
			
			<a href="../index.php">
			<button style="margin-top:50px;">ページに戻る</button>
			</a>

			</div>
	</div>
</body>
</html>
	<!-- <p>ログアウト</p> -->
	