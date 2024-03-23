<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
   <head>
     <meta charset="UTF-8"/>
	 <meta http-equiv="X-UACompatible" content="IE=edge,chrome=1"/>
	 <meta name="description" content="..."/>
	 <meta name="keywords" content="1,2,3,4,5,6,"/>
	 <link rel="shortcut icon" href="cupcake123.PNG">
	 <link rel="stylesheet" href="Anteiku.css" type="text/css">
	 <link rel="stylesheet" href="Anteiku3.css" type="text/css">
	 <link rel="stylesheet" href="css/fontello.css" type="text/css">
	 <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap" rel="stylesheet">
	 <title>🧁-あんていく-🧁-デザート-🧁</title>

   </head>
   <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
	<body> 
		<div class="mainby2">
			<div class="butt" style=" left: 15px; top:15px; position: absolute; margin-top:15px;"> 
		 	<!----><a href="index.php"> 
	 		<!----><div class="main_butt">あ</div>
	 		<!----></a>
			</div>

			<div class="part1">
				<div class="form_php">
					<p>フィルター <i>/</i> クエリ</p>
					<form method="post">
						名前:<input type="search" name="_name_"><br/>
						価格 ¥ (0&#60;価格) :<input type="number" name="_price_"/><br/>
						いちご:<input type="checkbox" name="_trusk_"/><br/>
						チョコレート:<input type="checkbox" name="_czeko_"/><br/>
						バニラ:<input type="checkbox" name="_vanilia_"/><br/>
						カーメル:<input type="checkbox" name="_karmel_"/><br/>
						<b>シュガー</b> はい<input type="radio" name="fav_language"  value="y">
						番号			   <input type="radio" name="fav_language"  value="n"><br/>
						<b>グルテン</b> はい<input type="radio" name="fav_language1" value="y">
						番号			   <input type="radio" name="fav_language1" value="n"><br/>
						<input type="reset"><br/>
						<input type="submit"><br/>
					</form>
					<?php
						echo '<br>';
						$stack = array();
						if(isset($_POST['_name_']) && $_POST['_name_'] != "") 
						{
							$var1 = $_POST['_name_'];//Name1
							array_push($stack , $var1 );
						}
						if(isset($_POST['_price_']) && $_POST['_price_'] != NULL)
						{
							$var2 = $_POST['_price_'];//1234567890
							array_push($stack , $var2 );
						}
						if(isset($_POST['_trusk_']))
						{
							$var3 = $_POST['_trusk_'];//true false
							$stack['trusk'] = $var3;
							//array_push($stack , 'trusk'=>$var3 );
						}
						if(isset($_POST['_czeko_']))
						{
							$var4 = $_POST['_czeko_'];//true false
							$stack['czeko'] = $var4;
							//array_push($stack , 'czeko'=>$var4 );
						}
						if(isset($_POST['_vanilia_']))
						{
							$var5 = $_POST['_vanilia_'];//true false
							$stack['vanil'] = $var5;
							//array_push($stack , 'vanilia'=>$var5);
						}
						if(isset($_POST['_karmel_']))
						{
							$var6 = $_POST['_karmel_'];//true false
							//array_push($stack , 'karmel'=>$var6 );
							$stack['karmel'] = $var6;
						}
						if(isset($_POST['fav_language']))
						{
							$var7 = $_POST['fav_language'];// "y" "n"
							$stack['sugar'] = $var7;
							//array_push($stack , 'sugar'=>$var7 );
						}
						if(isset($_POST['fav_language1']))
						{
							$var8 = $_POST['fav_language1'];// "y" "n"
							$stack['gluten'] = $var8;
							//array_push($stack , 'gluten'=>$var8 );
						}
						//print_r($stack);
						?>
				</div>

				<img src="touka.png" alt="no toka" style="height:95%; align-self:flex-end;  "/>
			</div>

			<div class="part2">
				
				<div id="content">
						<?php 
						require_once "./_Login_/connect.php";
						$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
						$sql = 'SELECT * FROM dessert  WHERE ';
						if(empty($stack))
						{
							
						}
						else
						{
							foreach($stack as $z)
							{
								if(isset($var1))
								{
									if($z === $var1  )
									{
										$sql .= 'NAME = "'.$var1.'"';
									}
								}
								if(isset($var2))
								{
									if($z === $var2)
									{
										$sql .= " (PRICE BETWEEN 0 AND ".$var2.")";
									}
								}
								
								if(key($stack) == 'trusk')
								{
									$sql .= " STRAWBERRY = 1";
								}
								if(key($stack) == 'czeko')
								{
									$sql .= " CHOCOLATE = 1";
								}
								if(key($stack) == 'vanil')
								{
									$sql .= " VANILIA = 1";
								}
								if(key($stack) == 'karmel')
								{
									$sql .= " CARMELL = 1";
								}
								if(key($stack) == 'sugar')
								{
									$sql .= " SUGAR = ";
									if($z == 'y'){ $sql .="1"; }else{$sql .="0";}
								}
								if(key($stack) == 'gluten')
								{
									$sql .= " GLUTEN = ";
									if($z == 'y'){ $sql .="1"; }else{$sql .="0";}
								}
								next($stack);
								$sql .= " AND";
							}
						}
						echo"<br/>";
						$sql .= "  1=1 ;";//echo $sql;

						$wynik = mysqli_query($polaczenie,$sql);

						while($row = mysqli_fetch_array($wynik))
						{
							echo '<div class="desrt_des">';
							echo '<img  src="./_cofimg_/_desserts_/'.$row['IMAGE'].'" />';
							echo '<p>'.$row['NAME'].'</p>';
							echo '品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭エリラ碁載65
							士5右もむゆま玲堀ソフ慢祥ぴ際女づよでの殿説張ゆっやぴ。他カキ一文拡づ済二けんへ府
							善がやばし変画き新書ゅでをげ馬予タ参識じとめあ法別累スイル人他ネニユ更荒衝貨げわま
							。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウソ本敗イチ活能づレぱ腹開や
							り骨碁ト球実ゅ障将格増推はめーラ。';
							echo '</div>';
						}
						?>


				<!--	
						
					
						
			
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x2.jpg" alt="x"/>
						<p>デザート 2</p>
						品ヱネオセ陸事闘は芸骨メクムフ報地路他カキ一文拡づ済二けんへ府善がやばし変画き新
						書ゅでをげ馬予タ参識じとめあ法別累スイル人他ネニユ更荒衝貨げわま。公べリさ支質
						委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウソ本敗イチ活能づレぱ腹開やり骨碁
					</div>
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x4.jpg" alt="">
						<p>デザート 3</p>
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭エ
						っやぴ。他カキ一文拡づ済二けんへ府善が識じとめあ法別累スイル人他ネニユ
						更荒衝貨げわま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴ際他カ変画き新書ゅでをげ馬予
						タ参識じとめあ法別累スイル人他ネニユ更荒衝貨げわま。公べリさ支質委
						っイ間武ワヒキ野名ゅーお要服サ後弘ミテウソ本敗イチ活能づレぱ腹開や
						り骨碁ト球実ゅ障将格増推はめーラ。
					</div> 
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x1010.jpg" alt="">
						<p>デザート 4</p>
						品ヱネオセ陸事闘は芸骨
						慢祥ぴ際女づよでの殿説張ゆっやぴ。他カキ一文拡づ済二け
						んへ府善がやばし変画き新書
						ゅでをげ馬予タ参識じとめあ
						法別累スイル人他ネニ
					</div> 
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x1111.jpg" alt="">
						<p>デザート 5</p>
						わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴ
						わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴ
					</div> 
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x12.jpg" alt="">
						<p>デザート 6</p>
						陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクム増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
					</div> 
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x1313.jpg" alt="">
						<p>デザート 7</p>
						陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
					</div> 
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x5.jpg" alt="">
						<p>デザート 8</p>
						陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
					</div> 
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x6.jpg" alt="">
						<p>デザート 9</p>
						陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭さ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
					</div> 
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x7.jpg" alt="">
						<p>デザート 10</p>
						陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
					</div>
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x8.jpg" alt="">
						<p>デザート 11</p>
						わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴ士5右もむゆま玲堀ソフ慢祥ぴ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴ
					</div>  
					<div class="desrt_des">
						<img src="./_cofimg_/_desserts_/x9.jpg" alt="">
						<p>デザート 12</p>
						わま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イわま。公べリさ支質委っイ間武ワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴワヒキ野名ゅーお要服サ後弘ミテウ
						ソ本敗イチ活能づレぱ腹開やり骨碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴ碁ト球実ゅ障将格増推はめーラ。
						品ヱネオセ陸事闘は芸骨メクムフ報地路トぼう紙所薄なぴざ聞同レカロ悪祭
						エリラ碁載65士5右もむゆま玲堀ソフ慢祥ぴ
						<br>
						<button>能づレやり</button>
						<button>レぱ腹開やり</button>
					</div> -->
				</div>

				<div id="wrapper_b">
					<img class="imq" src="_gify_/f1.gif"/>
					<img class="imq" src="_gify_/f2.gif"/>
					<img class="imq" src="_gify_/f3.gif"/>
					<img class="imq" src="_gify_/f4.gif"/>
					<img class="imq" src="_gify_/f1.gif"/>
					<img class="imq" src="_gify_/f2.gif"/>
					<img class="imq" src="_gify_/f3.gif"/>
					<img class="imq" src="_gify_/f4.gif"/>
					<img class="imq" src="_gify_/f1.gif"/>
					<img class="imq" src="_gify_/f2.gif"/>
					<img class="imq" src="_gify_/f3.gif"/>
					<img class="imq" src="_gify_/f4.gif"/>
					<img class="imq" src="_gify_/f1.gif"/>
				</div>
			</div>
		</div>
   </body>
</html>
