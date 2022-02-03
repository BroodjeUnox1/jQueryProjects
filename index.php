<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<title></title>
	<style type="text/css">
		.center {
			display: flex;
			height: 100vh;
			justify-content: space-around;
    		align-items: center;
		}

		.bg-offwhite {
			background:	#F9F9F9;
		}

		input {
			width: 100%;
			margin: .2rem;
		}
	</style>
</head>
<body>

		<div class="center">
			<div class="col-md-4 bg-offwhite text-center">
				<div class="col-md-12"><h1>Password strenght</h1></div>
				<div class="col-md-12 text-left">
					<label>Test</label>
					<input type="text" placeholder="Name">
				</div>

				<div class="col-md-12 text-left">
					<label>test</label>
					<input type="password" placeholder="Password" minlength="6" maxlength="32" oninput="checkstrenght(this)">
				</div>
			</div>	
		</div>

	<script type="text/javascript">
		//set default protection to false
		let special = false;
		let number = false;
		let upper = false;

		function checkstrenght(object) {
			//sets everything to false if you initiate this function so if you delete char then it wont be true
			special = false;
			number = false;
			upper = false;
			//set selector
			let test = $([object])
			//check every char if condition right set to true

			for(let i = 0; i < object.value.length; i ++) {
				checkForSpecial(object.value[i])
				checkForNumber(object.value[i])
				checkUpper(object.value[i])
			}

			console.log(object.value.length)
			
			if(object.value.length < 7){
				test.css("border", "5px solid #ffcccb")
				return
			}
			//check if everything is true
			if(special && number && upper && object.value.length >= 7) {
				test.css("border", "5px solid green")
			}else {
				if (object.value.length >= 7) {
					test.css("border", "5px solid red")
				}
			}
		}
		function checkUpper(char) {
			if(upper)return;
			const uppers = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]
			if($.inArray(char, uppers) >= 0){upper=true}
		}

		function checkForNumber(char) {
			if(number)return;
			if(Number.parseInt(char)) {number = true}		
		}

		function checkForSpecial(char) {
			if(special)return;
			const specials = ["!","@","#","$","%","^","&","*","(",")"]
			if($.inArray(char, specials) >= 0){special=true}
		}
	</script>
	
</body>
</html>

