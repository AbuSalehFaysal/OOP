<?php 

	require_once "libs/function.php";
	$obj = new Members();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style3.css">
</head>
<body> 

	<?php 

		if ( isset($_POST['submit']) ) {
			# code...
			$name = $_POST['name'];
			$uname = $_POST['uname'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];

			$email_check = $obj -> checkEmail($email);

			if ( empty($name) || empty($uname) || empty($email) || empty($contact) ) {
				# code...
				$mess = "<p class='alert alert-danger'> Please, fill the form properly!</p>";
			}elseif ($email_check == false) {
				# code...
				$mess = "<p class='alert alert-danger'> Email already exists!</p>";
			} else {
				# code...
				$data = $obj -> insertMember($name, $uname, $email, $contact);

				if ($data == true) {
					# code...
					$mess = "<p class='alert alert-success'> Congartulations!</p>";
				} else {
					# code...
					$mess = "<p class='alert alert-danger'> ERROR: 404!</p>";
				}
				
			}
			
			
		}


	 ?>

	     <div class="mess">
        <?php  

          if( isset($mess) ){
            echo $mess;
          }

        ?>
    </div>

    <div class="all-data">
    	<table class="table">
    		<tr>
    			<td>Name</td>
    			<td>Username</td>
    			<td>Email</td>
    			<td>Contact No</td>
    			<td>Action</td>
    		</tr>

    		<?php 

    			$all_data = $obj -> bringAllData();

    			while ( $single_data = $all_data -> fetch_assoc() ) :

    		 ?>

    		<tr>
    			<td><?php echo $single_data['name']; ?></td>
    			<td><?php echo $single_data['username']; ?></td>
    			<td><?php echo $single_data['email']; ?></td>
    			<td><?php echo $single_data['contact_no']; ?></td>
    			<td>
    				<a class="btn btn-info" href="#">Update</a>
    				<a class="btn btn-danger" href="inc/delete_member.php?id=<?php echo $single_data['members_id'] ?>">Delete</a>
    			</td>
    		</tr>
			
			<?php endwhile ; ?>
    		
    	</table>
    </div>



	

    <div class="data">
        <div class="card">
            <div class="card-header">Add Members</div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input name="uname" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="">Contact No</label>
                        <input name="contact" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        
                        <input name="submit" class="btn btn-success btn-block" type="submit" value="Insert">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

    



</body>
</html>