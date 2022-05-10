<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ajax</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div id="div"></div>
<div id="div2"></div>
<script>
	$.ajax({
		url: "https://api.coingecko.com/api/v3/coins",
		success: function (result) {
			
			// console.log(result[0].market_data.price_change_24h);
			var table = "<table class='table table-striped'><th>ID</th><th>Name</th><th>Time</th>";
			var length = result.length;
			for(i=0; i<length; i++){
				var block = result[i].block_time_in_minutes;
			 if(result[i].block_time_in_minutes == null) {
			 	block = '-';

				}
			table +="<tr><td>"+result[i].name+"</td><td>"+result[i].market_data.price_change_24h+"</td><td>"+block+"</td></tr>";
                     }
                    

			table +='</table>';
			// console.log(table);
			$('#div').html(table);
			
		}
	})

</script>
</body>
</html>