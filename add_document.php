<?php include('includes/header.php'); ?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <?php include('includes/sidebar.php'); ?>
</div><!--/.sidebar-->
		
	<div class="col-sm-6 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Add Documents</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">B W Kahari </h1>
			</div>
		</div><!--/.row-->
     <?php

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$title = $_POST['title'];
$file_depart_id = $_POST['file_depart_id'];
$file = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$remarks = $_POST['remarks'];

 move_uploaded_file($file_tmp, "./files/$file " );

//Insert Query of SQL
$query = "INSERT INTO files(title, file_depart_id, file, remarks,status) VALUES ('$title', '$file_depart_id', '$file', '$remarks','unapproved')";
$add_document = mysqli_query($connection,$query);

if($add_document){
    
    echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}

?>
       
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Document</div>
                <div class="panel-body">
                    
                    <div class="col-md-10">
                        <form role="form" action=""  method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Document Title">
                            </div>
                            <div class="form-group">
									<label>Department</label>
									<select name="file_depart_id" class="form-control">
										<option>---Select Department---</option>
										<?php 
                                        $query = "SELECT * FROM departments";
                                        $select_department = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($select_department)){                                            
                                            $department_id = $row['department_id'];
                                            $Department = $row['Department'];
                                            
										echo "<option value='$department_id'>$Department </option>";
                                        }
                                        ?>
										
									</select>
								</div>
                       								
								<div class="form-group">
									<label>Upload Document</label>
									<input type="file" name="file">
									 <p class="help-block">File type : word,excel,pdf</p>
								</div>
                                <div class="form-group">
									<label>Remarks(Optional)</label>
									<textarea name="remarks" class="form-control" rows="3"></textarea>
								</div>
                       <button type="submit" name="submit" class="btn btn-success">Save</button>
                       <button type="submit" name="draft" class="btn btn-primary">Save Draft</button>
				      <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include('includes/footer.php'); ?>