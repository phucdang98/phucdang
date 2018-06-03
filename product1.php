
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>NEWS</title>
		<!-- Bootstrap CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Font Awesome -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- DataTable CSS -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.0/datatables.min.css"/>
		<!-- My CSS -->
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		 <a href="index.php"><img src="images/logo.png" border="0" class="vertical" style="width: 100px;height: 100px;"></a>
		 <a href="product.php"><i class="fa fa-motorcycle fa-3x" aria-hidden="true" style="padding-left: 50px">MOTO</i></a>
		 <a href="product1.php"><i class="fa fa-newspaper-o fa-3x" aria-hidden="true" style="padding-left: 50px" >NEWS</i></a>
		 <a href="chart.php"><i class="fa fa-bar-chart fa-3x" aria-hidden="true" style="padding-left: 50px">CHART</i></a>
		 <a href="product2.php"><i class="fa fa-user fa-3x" aria-hidden="true" style="padding-left: 50px" >USER</i></a>
		 <a href="index.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true" style="padding-left: 50px">LEAVE</i></a>

		<div class="wraper">
			<!-- Trigger the modal with a button -->
			<a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Add</a>
			<br>
			<table class="table table-bordered table-striped" id="">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>date</th>
						<th>Nội dung</th>
						<th>Link</th>
						<th>Số lượng xem</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<!-- Add Product -->
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span>New News</h4>
						</div>
						<div class="modal-body">
							<form id="add-product-form" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" name="product_name" id="name" required>
								</div>
								<div class="form-group">
									<label for="name">Date</label>
									<input type="date" class="form-control" name="date" id="date" required>
								</div>
								<div class="form-group">
									<label for="description">Nội Dung</label>
									<textarea class="form-control" name="description" id="description"></textarea>
								</div>
								<div class="form-group">
									<label for="description">Link</label>
									<textarea class="form-control" name="chitiet" id="chitiet"></textarea>
								</div>
								<div class="form-group">
									<label for="description">Số lượng xem</label>
									<textarea class="form-control" name="soluong" id="soluong"></textarea>
								</div>
								<div class="form-group">
									<label for="fileToUpload">Image</label>
									<input type="file" name="fileToUpload" id="fileToUpload">
									<img class="form-control image-preview" src="#" style="height: 200px ">
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button class='btn btn-info' id="add-btn" style="width: 20%">Add</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End Add Product -->
			<!-- Update Product -->
			<!-- Modal -->
			<div id="update" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<form id="update-product-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>"  enctype="multipart/form-data">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><span class="glyphicon glyphicon-pencil"></span>Edit</h4>
							</div>
							<div class="modal-body">
								
								<input type="hidden" name="id" id="uid">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" name="product_name" id="uname" required>
								</div>
								<div class="form-group">
									<label for="name">Date</label>
									<input type="date" class="form-control" name="date" id="udate" required>
								</div>
								<div class="form-group">
									<label for="description">Nội Dung</label>
									<textarea class="form-control" name="description" id="udescription"></textarea>
								</div>
								<div class="form-group">
									<label for="description">Link</label>
									<textarea class="form-control" name="chitiet" id="uchitiet"></textarea>
								</div>
								<div class="form-group">
									<label for="description">Số lượng xem</label>
									<textarea class="form-control" name="soluong" id="usoluong"></textarea>
								</div>
								<div class="form-group">
									<label for="category">Image</label>
									<input type="file" name="fileToUpload" id="fileToUpload1">
									<img class="form-control img-update image-preview" src="#" style="height: 200px">
								</div>

								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" id="usave-btn" style="width: 20%">Save</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</form>
				</div>
			</div>
			<!-- End Update Product -->
			<!-- Delete Product -->
			<div id="delete" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<form id="delete-product-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span>Delete</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" name="id" id="did">
								<div class="form-group">
									<p>Are you sure?</p>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" id="udelete-btn" style="width: 20%">OK</button>
								<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- End Delete Product -->
			
		</div>
		<!-- JQuery -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- DataTable -->
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.0/datatables.min.js"></script>
		<!-- My Script -->
		<script type="text/javascript" src="script1.js">
		</script>
		

		
	</body>
</html>
