<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title></title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@700&family=Roboto:wght@400;500&family=Supermercado+One&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Source+Serif+4&display=swap');
		.center {
			display: flex;
			height: 100vh;
			justify-content: ;
    		align-items: center;
		}

		.bg-offwhite {
			background:	#F9F9F9;
		}

		.special-font {
			font-family: 'Supermercado One', cursive;
			color: #07126a;
		}

		.input {
			width: 100%;
			padding: 8px 10px 8px 10px;
			border-color: rgba(126, 200, 227, .8);
		}

		.input:focus {
			border-color: #07126a;
		}

		.button {
			height: 100%;
			border-top-right-radius: 16px;
			border-bottom-right-radius: 16px;
			background: rgba(126, 200, 227, .8);
			border: none;
			padding: 8px 16px 8px 16px;
		}

		.pr-0 {
			padding-right: 0px;
		}

		.pl-0 {
			padding-left: 0px;
		}

		.text-left {
			text-align: left!important;
			color: #07126a;
			font-family: 'Source Serif 4', sans-serif;
			font-size: 120%;
		}

		.clear{
			color: rgba(239, 60, 60, 0.8);

		}

		p {
			font-size: 120%;
			user-select: none;
		}

		.maxheights {
			max-height: 50vh;
			min-height: 50vh;
			overflow-y: scroll;
			overflow-x: hidden;
		}

		.maxheights::-webkit-scrollbar {
    		display: none;
		}

		.pl-5 {
			padding: 7px;
		}
	</style>

</head>

<body class="bg-offwhite text-center center">
	<div class="container">
		<div class="col-md-12 maxheights">
			<div class="row bg-white roundIt pl-5">
				<div class="col-md-12 text-center">
					<h1 class="special-font mb-5 mt-3">Shopping list</h1>
				</div>
				<div class="col-md-10 pr-0">
					<input type="text" class="input" placeholder="E.g Eggs" on>
				</div>
				<div class="col-md-2 pl-0">
					<button style="width: 100%;" class="button" onclick="add($('.input')[0].value)">Add</button>
				</div>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-12 list">
				</div>
				<div class="col-md-12">
					<hr>
					<h2 class="clear" onclick="clearAll()">Clear all items</h2>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	let myArray = [];
	generatelist()

	$(".input").on("keyup", function(event){
		if(event.keyCode == 13) {
			add($(".input").val())
		}
	})


	function add(value) {
		if (value == "" || $.inArray(value, myArray) >=0 || value.toLowerCase().includes("<script>")) {
			return
		}
		myArray.push(value)
		generatelist()
		$('.input')[0].value = ""
	}

	function editDouble(obj, index) {
		let innerText2 = obj.innerText
		obj.outerHTML = `<input type="text" placeholder="${innerText2}" onchange="Change(${index}, this)" autofocus>`
	}

	function edit(value) {
		let myValue = $(`#${value}`)
		let innerText2 = $(myValue[0].firstElementChild)[0].innerText
		$(myValue[0].firstElementChild).empty() 
		$(myValue[0].firstElementChild).append(`<input type="text" placeholder="${innerText2}" onchange="Change(${value}, this)">`) 
	}

	function Change(index, obj) {
		if($.inArray($(obj).val(), myArray) >= 0) {
			return
		}
		let = oldVal = myArray[index]
		myArray[index] = $(obj).val()
		generatelist()
		swal("Updated!", `You updated ${oldVal} to ${$(obj).val()}`, "success");
	}

	function generatelist() {
		$(".list").empty()
		for(i=0;i<myArray.length;i++) {
			$(".list").append(`
				<div class="row" id="${i}">
					<div class="col-md-10 text-left"><p ondblclick="editDouble(this, ${i})">${myArray[i].replace(/<[^>]*>?/gm, '')}</p></div>
					<div class="col-md-1"><i class="far fa-edit" style="color: rgba(0, 255, 50, 0.8);" onclick="edit(${i})"></i></div>
					<div class="col-md-1"><i class="far fa-trash-alt" style="color: rgba(239, 60, 60, 0.8);" onclick="remove(${i})"></i></div>
				</div>
			`)
		}
	}

	function remove(index) {
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this item.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    	myArray.splice(index, 1)
				$(`#${index}`).remove()
		  } else {
		    swal("Your Item is still there!");
		  }
		});
	}

	function clearAll() {
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this list.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    	$(".list").empty()
				myArray = []
		  } else {
		    swal("Your list is still there!");
		  }
		});
	}

</script>
	
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
