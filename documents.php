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
                          <div class="row">
                          <?php include('includes/inner_nav.php'); ?>
                           <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <center><th>Name</th> </center>  
                                            <center><th>Date</th></center> 
                                             <center><th>View</th></center>
                                             <center><th>Delete</th></center>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        if(isset($_GET['d_id'])){
                                        $the_file_id = $_GET['d_id'];
                                        }
                                        
                                        $query = "SELECT*FROM files WHERE file_depart_id = '$the_file_id'";
                                        $select_file_query = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($select_file_query)){
                                        $file_id = $row['file_id'];
                                        $file_depart_id = $row['file_depart_id'];
                                        $file_name = $row['title'];
                                        $date = $row['date'];
                                        $query1 = "SELECT*FROM departments WHERE department_id = '$file_depart_id'";
                                        $select_depart_query = mysqli_query($connection, $query1);
                                        $row = mysqli_fetch_assoc($select_depart_query);
                                        $department_id = $row['department_id'];
                                        $Department = $row['Department'];
                                        
                                            echo "<tr class='odd gradeX'>";                                           
                                            echo "<td>$file_name</td>";
                                            echo "<td>$date</td>";
                                            echo "<td class='center'><a href='view_document.php?f_id=$file_id'><center><i class='fa fa-eye fa-2x' aria-hidden='true'></i></center></a></td>";
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
            </div>
</div>
<div class="clear-fix"></div>       
            
<?php include('includes/footer.php'); ?>