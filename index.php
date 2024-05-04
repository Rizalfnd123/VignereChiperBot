<?php
function encrypt($plaintext, $key) {
	//strlen : menentukan panjang string
	for ($i=0, $j=0, $n=strlen($key); $i < strlen($plaintext); $i++) {
	//n = key
	//strtolower = mengubah huruf besar menjadi huruf kecil
	//ord = 
		$key_n = $j % $n;
		if (ord($plaintext[$i]) >= 65 && ord($plaintext[$i]) <= 90) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97;
			$steb_2 = (ord($plaintext[$i]) - 65 + $steb_1) % 26;
			echo chr($steb_2 + 65);
			$j++;
		}
		elseif (ord($plaintext[$i]) >= 97 && ord($plaintext[$i]) <= 122) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97;
			$steb_2 = (ord($plaintext[$i]) - 97 + $steb_1) % 26;
			echo chr($steb_2 + 97);
			$j++;
		}
		else {
			echo $plaintext[$i];
		}
	}
}
function decrypt($ciphertext, $key) {
	for ($i=0, $j=0, $n=strlen($key); $i < strlen($ciphertext); $i++) {
		$key_n = $j % $n;
		if (ord($ciphertext[$i]) >= 65 && ord($ciphertext[$i]) <= 90) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97;
			$steb_2 = (ord($ciphertext[$i]) - 65 - $steb_1) % 26;
			$steb_3 = (($steb_2 < 0) ? 26+$steb_2 : $steb_2) % 26;
			echo chr($steb_3 + 65);
			$j++;
		}
		elseif (ord($ciphertext[$i]) >= 97 && ord($ciphertext) <= 122) {
			$steb_1 = ord(strtolower($key[$key_n])) - 97;
			$steb_2 = (ord($ciphertext[$i]) - 97 - $steb_1);
			$steb_3 = (($steb_2 < 0) ? 26+$steb_2 : $steb_2) % 26;
			echo chr($steb_3 + 97);
			$j++;
		}
		else {
			echo $ciphertext[$i];
		}
	}
}

error_reporting(0);
$cipher = $_POST['cipher'];
$text = $_POST['text'];
$key = $_POST['key'];

?>
<html>
<head>
	<title>Vigenere Cipher</title>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
</head>
<body style="background: #f9f9f9;">
</div>
<center>
<div class="ui container" style="padding: 4em 15em; background:#e0e0e0; ">
<button class ="ui button" id="tes">COPYRIGHT</button>
<div class = "ui page dimmer">
			<div class = "content">
				<div class = "center">
					<div class ="ui inverted icon header">
						<i class = "users icon"></i>
							<h1>Klompok1</h1>
							<h1>PIF6D</h1>
							<h1>ALL RIGHT RESERVED</h1>
							<h1>THIS APP FOR FULFILLING LAST ASSIGNMENT</h1>
							<h1>OF KRIPTOGRAFI</h1>
					</div>
				</div>
			</div>	
		</div>
				<br>
<form class="ui form" action="" method="POST">
	<div class="field">
		<h1>Vigenere Cipher</h1>
		<label><br>Plaintext</label>
		<textarea name="text" rows="3" cols="50"></textarea>
		<label><br>Key</label> 
		<input type="text" name="key" >
		<!-- 
		[A-Za-z]
	-->
	<br />
	</div>
	<div class="inline fields" style="padding: 0em 19em">
		<div class="field" >
			<div class="ui radio checkbox">
				<input type="radio" name="cipher" checked="" value="encrypt">
				<label>Encrypt</label><br />
			</div>
		</div>
		<div class="field">
			<div class="ui radio checkbox">
				<input type="radio" name="cipher" value="decrypt">
				<label>Decrypt</label><br />
			</div>
		</div>
	</div>
	<!-- <div class="ui submit button">Submit</div>	 -->
<input class="ui green button" type="submit" value="Submit" >
</form>
<?php
if (isset($cipher) && ctype_alpha($key)) {
	?>
	<div class="ui floating message">
		<p>
			<?php
			if ($cipher == "encrypt") {
				encrypt($text, $key);
			}
			elseif($cipher == "decrypt") {
				decrypt($text, $key);
			}
		}
		else {
			if (empty($text) && empty($key)) {

			}
			else {
	?>
	<div class="ui floating message">
		<p>
			<?php
				echo '<p style="color:red ;">Please, complete the fields correctly</p>';
			}

		}
?>
  </p>
</div>
</div>
</center>
</body>
<script type="text/javascript" src="semantic/dist/semantic.min.js"></script>
	<script>
		$('#tes').click(function(){$('.ui.dimmer').dimmer("toggle")})
	</script>
</html>