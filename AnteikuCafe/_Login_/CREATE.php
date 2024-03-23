<?php
session_start();
if(isset($_POST['email']))
{
	
		$wszystko_OK=true;
		$nick = $_POST['nick'];
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nickname must be between 3 and 20 characters long!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nickname can only consist of letters and numbers";
		}
		

		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="E-mail incorrect!";
		}
		

		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="The password must be between 8 and 20 characters long!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="The passwords provided are not identical!";
		}	


		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			
			$_SESSION['e_regulamin']="Confirm acceptance of the regulations!";
		}
		/////////////////////////		
		if(isset($_POST['submitxd']))
		{
			$file = $_FILES['file'];
			//print_r($file);
			$fileName = $_FILES['file']['name'];//name
			$fileTName = $_FILES['file']['tmp_name'];//php456.tmp
			$fileSize = $_FILES['file']['size'];// 5678Kb
			$fileError = $_FILES['file']['error'];//no error?
			$fileType = $_FILES['file']['type'];//png jpg gif
		
			$fileExt = explode('.',$fileName);
			$fileActualExt = strtolower(end($fileExt));// JPG -> jpg
		
			$allowed = array('jpg','png','jpeg');
		
			if(in_array($fileActualExt,$allowed))
			{   if($fileError === 0)
				{   if($fileSize < 1000000)//kilo bit
					{
						$newName = uniqid('',true).".".$fileActualExt;//KEY NAME
						$fileDestination = '_images_/'.$newName;
						move_uploaded_file($fileTName,$fileDestination);
					}else{
						$wszystko_OK=false;
						$_SESSION['e_regulamin'] = "  File too Big! / ファイルが大きすぎます";
					}
		
				}else{
					$wszystko_OK=false;
					$_SESSION['e_regulamin'] = "Error File / エラーファイル";
				}
		
			}else{
				$wszystko_OK=false;
				$_SESSION['e_regulamin'] = "Wrong File type / 間違ったファイルタイプ";
			}
			
		}
		
	///////////////////////////////////	
		

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
}
        
    
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{

				$rezultat = $polaczenie->query("SELECT ID FROM account WHERE EMAIL='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="There is already an account associated with this email address!";
				}		

				$rezultat = $polaczenie->query("SELECT ID FROM account WHERE NICK='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="An account with this nickname already exists!.";
				}
				
				if ($wszystko_OK==true)
				{
					
					
					if ($polaczenie->query("INSERT INTO account VALUES (NULL,'$haslo1', '$email', '$nick', './_images_/$newName' )"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Server Error</span>';
			echo '<br />dev info: '.$e;
		}
		
	}
	

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="..."/>
	 <meta name="keywords" content="1,2,3,4,5,6,"/>
	 <link rel="stylesheet" href="../Anteiku.css" type="text/css">
     <link rel="shortcut icon" href="log1.png">
    <title>📃-あんていく-📃-アカウントを作成する-📃</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=DotGothic16&family=Train+One&display=swap');
        html , body {
            height: calc( 100% - 30px );}

        *{margin: 0;
        padding: 0;}

        #main3{ width: calc( 100% - 60px );
                height: 100%;
                background-image: linear-gradient(
                yellow,
                rgb(19, 188, 75) , 
                rgb(143, 78, 14) ,
                 rgb(12, 37, 125)
                );
                border: 30px solid transparent; border-image: url('../s2.png') 28 round;
                position: relative;}

        #content{position: relative;
                z-index: 100;}

        #bk{position: absolute;z-index: 1;top: 0;width: 100%; height: 100%;} #bk2{width: 100%; height: calc( 100% ); opacity:0.5;}

h1{font-size: 50px;
font-family: 'Train One', cursive;
}
     form{
         
         width: 500px;
         min-height: 500px;
         background-image: linear-gradient(aqua , darkseagreen);
         opacity: 0.8;
         border: 6px blue dotted;
         
     }

     input[type="text"] , input[type="password"]
	 {
         height: 30px;width: 410px;
         font-size: 25px;
         margin: 5px 15px 15px 15px;
         border-radius: 10%;
         border: 3px black solid;
         text-align: center;
     }

     input[type="checkbox"]{margin: 12px;}

     button[type="submit"]{margin: 12px;
    width: 170px;
    height: 70px;
    font-size: 30px;}

    .error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}

    </style>
</head>
<body>
    <div id="main3">
        <div id="content">
			<div class="butt" style=" left: 15px; top:15px; position: sticky;"> 
	    		<a href="../index.php"> <!-- href="#uwu"    div id="uwu" WOW-->
	      			<div class="main_butt">あ</div>
	    		</a>
		</div>

        <center><h1>登録</h1></center>
        <center>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
            	ニックネーム:<br>
                <input type="text" value="<?php
				if (isset($_SESSION['fr_nick']))
				{
					echo $_SESSION['fr_nick'];
					unset($_SESSION['fr_nick']);
				}?>" name="nick"/>

							<?php if (isset($_SESSION['e_nick']))
							{
								echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
								unset($_SESSION['e_nick']);
							}?><br>

                Eメール:<br>
                <input type="text" placeholder="@" value="<?php
				if (isset($_SESSION['fr_email']))
				{
					echo $_SESSION['fr_email'];
					unset($_SESSION['fr_email']);
				}?>" name="email"/>

							<?php
							if (isset($_SESSION['e_email']))
							{
								echo '<div class="error">'.$_SESSION['e_email'].'</div>';
								unset($_SESSION['e_email']);
							}?><br>

                パスワード:<br>
                <input type="password" placeholder="******" value="<?php
				if (isset($_SESSION['fr_haslo1']))
				{
					echo $_SESSION['fr_haslo1'];
					unset($_SESSION['fr_haslo1']);
				}?>" name="haslo1"/>

							<?php
							if (isset($_SESSION['e_haslo']))
							{
								echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
								unset($_SESSION['e_haslo']);
							}?>	
                    
                <input type="password" placeholder="******" value="<?php
				if (isset($_SESSION['fr_haslo2']))
				{
					echo $_SESSION['fr_haslo2'];
					unset($_SESSION['fr_haslo2']);
				}?>" name="haslo2"/><br/>
<!--#################################################################-->
                アバターを入手する: <input type="file" name="file" />
				<br/>
<!--#################################################################-->
                <label>
                    <b>ポリシーを受け入れる:</b><input type="checkbox" name="regulamin"  <?php
					if (isset($_SESSION['fr_regulamin']))
					{
						echo "checked";
						unset($_SESSION['fr_regulamin']);
					}?>/>
                </label>

								<?php
								if (isset($_SESSION['e_regulamin']))
								{
									echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
									unset($_SESSION['e_regulamin']);
								}?><br/>

				<button type="submit" name="submitxd">登録</button>
            </form>
        </center>      
    </div>
		<div id="bk">
        	<img src="./create_ant.JPG" alt="no image" id="bk2"/>
    	</div>
    </div>
</body>
</html>