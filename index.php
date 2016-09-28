<?php include('includes/header.php'); ?>
    
<?php    


$query = "SELECT*FROM departments";
$select_department_query = mysqli_query($connection, $query);
$department_count = mysqli_num_rows($select_department_query);

$query6 = "SELECT*FROM files";
$select_files_query = mysqli_query($connection, $query6);
$file_count = mysqli_num_rows($select_files_query);

$querys = "SELECT*FROM files WHERE status = 'unapproved'";
$select_pending_query = mysqli_query($connection, $querys);
$pending_approval_count = mysqli_num_rows($select_pending_query);

$query_draft = "SELECT*FROM drafts";
$select_draft_query = mysqli_query($connection, $query_draft);
$draft_count = mysqli_num_rows($select_draft_query);




    ?>          
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<?php include('includes/sidebar.php'); ?>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Files</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent"><?php echo $file_count; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Departments</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent"><?php echo $department_count; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Pending Approval</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent"><?php echo $pending_approval_count; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Drafts</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent"><?php echo $draft_count; ?></span>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<?php include('includes/footer.php'); ?>