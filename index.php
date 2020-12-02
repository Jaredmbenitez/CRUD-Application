<?php
require_once('../LearnCrud/php/functions.php');
require_once("../LearnCrud/php/operation.php");


createDB();
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <!-- BOOTSTRAP viewport -->
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Homepage </title>

    <!-- FONT AWESOME script -->
    <script src="https://kit.fontawesome.com/ff2891581a.js" crossorigin="anonymous"></script>

 

    <!--BootstrapCDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" type="text/css" >
    


 </head>

</body>
	<main>
		<div class="container text-center">
			<h1 class="card-header"><i class="fas fa-address-card" id ="myHeader"></i> User Database</h1>
			<div class="d-flex justify-content-center">
				<form action="" method="post" class="w-50">
					<div class="py-2">
						<?php 
						inputElement("<i class='fas fa-id-badge'></i>", "id", "id", setID()  );
						inputElement("<i class='fas fa-id-badge'></i>", "Username", "Username","");
						?>
					</div>
					<div class="pt-2">
						<?php 
							inputElement("<i class='fab fa-btc'></i>", "BTC", "BTC","");
							inputElement("<i class='fab fa-ethereum'></i>", "ETH", "ETH","");
							inputElement("<i class='fab fa-microsoft'></i>", "DASH", "DASH","");
						?>
					</div>
					<div class="d-flex justify-content-center">
						<?php
						buttonElement("btn-create",'btn btn-success','<i class="fas fa-plus-circle"></i>','create','dat-toggle="tooltip" data-placement="bottom" title="Create"'); ?>
						<?php buttonElement("btn-read",'btn btn-primary','<i class="fas fa-book"></i>','read','dat-toggle="tooltip" data-placement="bottom" title="Read"');?>
						<?php buttonElement("btn-update",'btn btn-warning','<i class="fas fa-pen"></i>','update','dat-toggle="tooltip" data-placement="bottom" title="Update"');?>
						<?php buttonElement("btn-delete",'btn btn-danger','<i class="fas fa-minus-circle"></i>','delete','dat-toggle="tooltip" data-placement="bottom" title="Delete"');?>
						<?php deleteBTN(); ?>
					</div>
				</form>
			</div>



		<!--Bootstrap Table -->
		<div class="d-flex table-data" id ="here">
			<table class ="table table-striped table-dark">
				<thead class="thead-dark">
					<tr>
						<th> ID </th>
						<th> Username </th>
						<th> BTC </th>
						<th> ETH </th>
						<th> DASH </th>
						<th> Edit </th>
					</tr>
				</thead>
				<tbody>
					
					<?php
							$result = getData();
							if ($result)
							{
								while($row = $result->fetch_assoc())
								{?>
									<tr> 
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['username']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['BTC_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['ETH_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['DASH_holdings']; ?> </td>
										<td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"> </i></td>
									</tr>
								<?php 
								}
							}

						if(isset($_POST['read'])){
							$result = getData();
							if ($result)
							{
								while($row = $result->fetch_assoc())
								{?>
									<tr> 
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['username']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['BTC_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['ETH_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['DASH_holdings']; ?> </td>
										<td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"> </i></td>
									
									</tr>
								<?php 
								}
							}

						} 
						if(isset($_POST['create'])){
							$result = getData();
							if ($result)
							{
								while($row = $result->fetch_assoc())
								{?>
									<tr> 
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['username']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['BTC_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['ETH_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['DASH_holdings']; ?> </td>
										<td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"> </i></td>
									</tr>
								<?php 
								}
							}

						} 
						if(isset($_POST['update'])){
							$result = getData();
							if ($result)
							{
								while($row = $result->fetch_assoc())
								{?>
									<tr> 
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"> <?php echo $row['username']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['BTC_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['ETH_holdings']; ?> </td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['DASH_holdings']; ?> </td>
										<td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"> </i></td>
									</tr>
								<?php 
								}
							}

						}
						
					?>


				</tbody>	
			</table>

						

					
		</div>
		</div>
	</main>



	<!-- BOOTSTRAP SCRIPTS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

	
	<script src="../learnCrud/main.js"> </script>

	<script src="../learnCrud/jquery.js"></script>  

</body>
</html>
