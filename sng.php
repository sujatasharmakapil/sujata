<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>report</title>
	<style>
		table {
				  text-align: center;
				  border: solid;
			}

thead {
  background-color: green;
  color: white;
  padding: 8px;
  font-size: medium;
}

td {
  border: solid 1px;
}
th {
	padding: 10px;
}

	</style>
</head>
<body>

	<form name="form9" method="post" >
		<input type="hidden" name="user_id" value="9">
				<input type="radio"  value="Working"  name="status">
				<label>Working</label><br><br>

	        	<input type="text" name="work" style="display: none;" id="Working" placeholder="Working" /><br><br>

				<input type="radio"   value="Away" name="status">
				<label>Away</label><br><br>
				<input type="text" style="display: none;" name="away" id="Away"   placeholder="Away" /><br><br>

				<input type="radio"  value="Practice" name="status">
				<label>Practice</label><br><br>
				<input type="text" style="display: none;" name="practice" id="Practice"   placeholder="Practice" /><br><br>

				<input type="radio"   value="Lunch" name="status">
				<label>Lunch</label><br><br>
				<input type="submit" name="btn" value="submit">
			

				<?php

				if(isset($_POST['btn'])){
					
					$user_id = $_POST['user_id'];
					$status = $_POST['status'];
					if ($status == 'Working') {
					$msg = $_POST['work'];
					}else if($status == 'Away'){
					$msg = $_POST['away'];
					}else if($status == 'Practice'){
					$msg = $_POST['practice'];
					}else{
						$msg="";
					}
					$current_timee = date('Y-m-d H:i:s');


					$conn = mysqli_connect("localhost","root","","test")or die("error in connection".mysqli_connect_error());
					$q = "insert into report(user_id,status,msg,current_timee) values ('$user_id','$status','$msg','$current_timee')";
					$result = mysqli_query($conn,$q);
					

						if($result)
						{
						    print "success";
						}
						  else
						{
						    print "failure";
						}
					}
					

					// show data
			$conn = mysqli_connect("localhost","root","","test")or die("error in connection".mysql_connect_error());

			$sql = "SELECT * FROM report";
			$result = mysqli_query($conn,$sql);

			if (mysqli_num_rows($result) > 0) {
			  // output data of each rows
			  while($row = mysqli_fetch_assoc($result)) {
			  	if($row){
			    echo "
			    <marquee behavior='alternate' scrollamount='16'>
			    <table>
			    	<thead>
			    		<th>ID</th>
			    		<th>User_Id</th>
			    		<th>Status-ID</th>
			    		<th>Work</th>
			    		<th>Away</th>
			    		<th>Practice</th>
			    		<th>Current_Time</th>
			    	</thead>
			    	<tbody>
			    	<tr>
			    		<th>".$row['id']."</th>
			    		<th>".$row['user_id']."</th>
			    		<th>".$row['status']."</th>
			    		<th>".$row['current_timee']."</th>
			    		</tr>
			    	</tbody>
			    		</table></marquee>
			    		";
			    	 }
			  }
			} else {
			  echo "0 results";
			}

			mysqli_close($conn);
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

	$('[name="status"]').click(function(){
		// console.log('yeah');
		var value = $('[name="status"]:checked').val();
		if(value=="Working"){
          $("#Working").show();
          $('#Away').hide();
		  $("#Practice").hide();
		}else if(value=="Away"){
			$("#Away").show();
			$("#Working").hide();
			$("#Practice").hide();
		}else if(value=="Practice"){
		console.log(value)
			$("#Practice").show();
			$("#Away").hide();
			$("#Working").hide();
			}
			else{
			$("#Practice").hide();
			$("#Away").hide();
			$("#Working").hide();
			}
	});
</script>
</form>
</body>
</html>

				
			
					