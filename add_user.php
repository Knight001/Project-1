<?php include('includes/header.php'); ?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <?php include('includes/sidebar.php'); ?>
</div><!--/.sidebar-->
		
	<div class="col-sm-6 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Add User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">B W Kahari </h1>
			</div>
		</div><!--/.row-->
        <div class="row">
        <div class="col-lg-12">
           <?php
            if(isset($_POST['add_user'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $deprtment = $_POST['department'];
                $role = $_POST['role'];
                $password = $_POST['password'];
                
                $sql = "INSERT INTO users(fname,lname,username,email,department,role,password) VALUES('{$fname}','{$lname}','{$username}','{$email}','{$deprtment}','{$role}','{$password}')";

            if (mysqli_query($connection, $sql)) {
                echo "<center><h1 style='color:green'>New record created successfully</h1></center>";
            } 
                    else {
                echo "<center><h1 style= 'color: red'>Failed</h1></center>";
            }

                
            }
            
            ?>
           
            <div class="panel panel-default">
                <div class="panel-heading">Add User</div>
                <div class="panel-body">
                    
                    <div class="col-md-9">
                        <form role="form" action=""  method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                             <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name">
                            </div>
                               <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="example@bwkahari.com">
                            </div>
                            
                            <div class="form-group">
									<label> Department</label>
									<select name="department" class="form-control">
										<option value="0">--Choose Department----- </option>
										<?php
                                            $query = "SELECT*FROM departments";
                                            $select_department_query = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($select_department_query)){
                                                $department_id = $row['department_id'];
                                                $department = $row['Department'];
                                                
                                                echo "<option value='$department'>$department </option>";
                                            }

                                        ?>y
										
									</select>
								</div>
                       			<div class="form-group">
									<label>Role</label>
									<select name="role" class="form-control">
										<option value="0">--Assign Role-- </option>
										<option value="admin">Admin </option>
										<option value="employee">Employee </option>										
									</select>
								</div>
                                <div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="***************">
								</div>
								
                       
                       <button type="submit" name="add_user" class="btn btn-success">Add</button>                       
				      <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include('includes/footer.php'); ?>