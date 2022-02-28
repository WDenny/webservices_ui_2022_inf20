<!DOCTYPE html>

<html lang="de">
	<head>
		<title>test</title>
		<meta charset="utf-8">
		<link rel="stylesheet"
			  href="../css/style.css">
	</head>
	<body>
		<h1>Warenkorb</h1>
		
		<div class="table">
			<?php
			$rows = 5; 
			$column = 3; 
			$value="12,45€";
			
			echo "<table>";
			echo "<tr><th>picture</th><th>article</th><th>price</th></tr>";
			for($tablerow=1;$tablerow<=$rows;$tablerow++){
			
				echo "<tr>";
					echo "<td>picture ".$tablerow."</td>";
					echo "<td>article ".$tablerow."</td>";
					echo "<td>price ".$tablerow."</td>";
				echo "</tr>";
			}			
			echo "</table>";
			?>
			<br>
		</div>
		<div class="continue">
			
			<form action="../adresse.html" method="post" id="continue">  
				<label for="fname"><?php echo $value ?></label> 
			</form>
			<button type="submit" form="continue" value="submit">Click Me!</button>
		</div>
	</body>
</html>