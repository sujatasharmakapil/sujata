<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ajax practice</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
	<div id="id"></div>
	

	<script>
             $.ajax({
             	url: "https://api.coingecko.com/api/v3/coins",
             	success: function(result){
	 		console.log(result)
             		var length = result.length;
	 		$('#id').append(result.length)//array length
	 		for(var i=0; i<length; i++){
	 		  $('#id').append(result[i].id + ' , ')
	 		  console.log(i)

             	}
             	}
             });
		
	</script>

</body>
</html>