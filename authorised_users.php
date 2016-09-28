       <?php include('includes/header.php'); ?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <?php include('includes/sidebar.php'); ?>
</div><!--/.sidebar-->
       <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Authorised Users</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">B W Kahari </h1>
			</div>
		</div><!--/.row-->

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>                                            
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $query = "SELECT*FROM users";
                                        $select_users_query = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($select_users_query)){
                                        $user_id = $row['user_id'];
                                        $fname = $row['fname'];
                                        $lname = $row['lname'];
                                        $username = $row['username'];
                                        $email = $row['email'];                                       
                                        $department = $row['department'];
                                        $role = $row['role'];

                                            echo "<tr class='odd gradeX'>";
                                            echo"<td>$fname</td>";
                                            echo "<td>$lname</td>";
                                            echo "<td>$username</td>";
                                            echo "<td class='center'>$email</td>";
                                            echo "<td class='center'>$department</td>";
                                            echo "<td class='center'>$role</td>";
                                            echo "<td class='center'><a href='#'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="clear-fix"></div>       
            
<?php include('includes/footer.php'); ?>