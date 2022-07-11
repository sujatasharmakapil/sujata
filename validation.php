<html>
<head>
	<!-- <span>🌞</span> -->
<title>Validation through js🌞</title>
  		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</head>
<body>
	<div>
		<form name="myform" id="form" method="post" >
			<input type="hidden" name="id" id="id">
			<label>Enter Name</label>
			<input type="text" name="name" id="name"><br>
			<label>Enter Email</label>
			<input type="email" name="email" id = "txtEmail"><br>
			<label>Enter Phone-Number</label>
			<input type="tel" name="tel" id="tel"><br>
			<label>Choose Gender</label><br>
			<input type="radio" name="gender" id="gender" value="male">Male</input>
			<input type="radio" name="gender" id="gender" value="female">Female</input>
			<input type="submit" name="btn" value="click9" id="demo">
		</form>
	</div>	
				<?php

					if(isset($_POST['btn'])){
						$id = $_POST['id'];
						$name = $_POST['name'];
						$email = $_POST['email'];
						$tel = $_POST['tel'];
						$gender = $_POST['gender'];
					$conn = mysqli_connect("localhost","root","","test")or die("error in connection".mysql_connect_error());
					$q = "insert into validation(name,email,tel,gender) values ('$name','$email','$tel','$gender')";
					mysqli_query($conn,$q)or die("error in connection".mysql_error());

					$count=mysqli_affected_rows($conn);
						if($count==1)
						{
						    print "success";
						}
						  else
						{
						    print "failure";
						}
					}
					
				?>
				<?php 
					// Create connection
			$conn = mysqli_connect("localhost","root","","test")or die("error in connection".mysql_connect_error());

			$sql = "SELECT * FROM validation";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			  // output data of each rows
			  while($row = mysqli_fetch_assoc($result)) {
			  	if($row){
			    echo "
			    <table>
			    	<tr>
			    		<th>ID</th>
			    		<th>Name</th>
			    		<th>Email</th>
			    		<th>Phone</th>
			    		<th>update</th>
			    	</tr>
			    	<tr>
			    		<th>".$row['id']."</th>
			    		<th>".$row['name']."</th>
			    		<th>".$row['email']."</th>
			    		<th>".$row['tel']."</th>
			    		<th><button id='myButton' class='btn btn-primary'> <a href='update.php?id=".$row['id']."'>UPDATE </button>

			    		</th>
			    	</tr>
			    </table>
			   ";
			  }
			  }
			} else {
			  echo "0 results";
			}

			mysqli_close($conn);
			?>
			<script>
				$(document).ready(function(){
					$("#form").validate({
						rules : {
						name : "required",
						email : "required",
						gender : "required",
						tel : {
							required : true,
							minlength : 5
						},
						email : {
							required : true
						}
					},
					});
				});
			
				    function ValidateEmail(email) {
				        var expr = [a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$;
				        return expr.test(email);
				    };
				    $("#demo").on("click", function () {
				        if (!ValidateEmail($("#txtEmail").val())) {
				            alert("Invalid email address.");
				        }
				        else {
				            alert("Valid email address.");
				        }
				    });
			
				$( "#demo" ).click(function() {
  $("#demo").attr('value', 'Save');

});
			</script>
</body>
</html>