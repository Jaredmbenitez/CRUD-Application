<?php 
require_once("db.php");
require_once("functions.php");

$con = createDB();


if (isset($_POST['create'])){

	##fetchData();
	createData();
	##NewData();

}
if (isset($_POST['update'])){

	#updateData();

}
if (isset($_POST['delete'])){

	deleteRecord();
}
if (isset($_POST['deleteall'])){

	deleteALL();
}

//this function gets data from all of our textboxes and inserts it into our MYSQL database
function createData(){
	$username = textboxValue('Username');
	$BTC = textboxValue('BTC');
	$ETH = textboxValue('ETH');
	$DASH = textboxValue('DASH');

	if($username && $BTC && $ETH && $DASH){
		$sql = "INSERT INTO cryptoholdings(username,BTC_holdings,ETH_holdings,DASH_holdings)
		VALUES('$username','$BTC','$ETH','$DASH')";
		if($GLOBALS['con']->query($sql)){	        ##(mysqli_query($GLOBALS['con'],$sql)) non OO way.
			$GLOBALS['con']->commit();
			textNode("success", "Record Successfully inserted...!") ;		
		}
		else{
			textNode("error", "Error Recording Data <br>". mysqli_error($GLOBALS['con']));
		}
	}
	else{
		textNode("error","Provide all data in textboxes...");

	}


}
//this function gets the value from the textbox.
function textboxValue($value){
	$textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
	if(empty($textbox)){
		return false;
	}
	else{
		return $textbox;
	}

}
// This function creates an h6 header tag with a classname and message.
function textNode($classname,$msg){
	$element = "<h6 class='$classname'>$msg</h6>";
	echo $element; 
}


//This function gets data from MySQL database
function getData(){

	if($GLOBALS['con']->connect_error){
		die("connection failed: " . $con->connect_error);
	}

	$sql = "SELECT * FROM cryptoholdings";
	$result = $GLOBALS['con']->query($sql);

	if($result && ($result->num_rows > 0))
		 return($result);

	
}

//This function updates our data.
function updateData(){
	$id = textboxValue("id");
	$user = textboxValue("Username");
	$BTC = textboxValue("BTC");
	$ETH = textboxValue("ETH");
	$DASH = textboxValue("DASH");

	if($GLOBALS['con']->connect_error){
		die("connection failed: " . $con->connect_error);
	}

	if($id && $user && $BTC && $ETH && $DASH){
		$sql = "
				UPDATE cryptoholdings SET
				id ='$id',
				username ='$user',
				BTC_holdings ='$BTC',
				ETH_holdings ='$ETH',
				DASH_holdings ='$DASH' WHERE id='$id' ";
		if($GLOBALS['con']->query($sql)){

			textNode("success", "Data successfully updated..!");
		}
		else{
			textNode("error", "Enable to update data.");
		}

	}
	else{
		textNode("error","Select data using edit icon.");
	}
}

//This function deletes data manually. (1 record at a time)
function deleteRecord(){
	$id = textboxValue("id");
	$user = textboxValue("Username");
	$BTC = textboxValue("BTC");
	$ETH = textboxValue("ETH");
	$DASH = textboxValue("DASH");



	if($id && $user && $BTC && $ETH && $DASH){
		if($GLOBALS['con']->connect_error)
				die("connection failed: " . $con->connect_error);
			

		$id = (int)textboxValue("id");
		$sql = "DELETE FROM cryptoholdings WHERE id='$id'";

		if($GLOBALS['con']->query($sql)){
			$GLOBALS['con']->commit();
			textNode("success","Record successfully deleted..!");
		}
		else{
			textNode("error", "Enable to delete Record.");
		}
	}
	else{
		textNode("error", "No values in Textboxes to delete.");
	}
}	

function deleteBTN(){
	$result = getData();
	$i = 0;
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			if($i >= 3)
			{
				buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i> Delete All ", "deleteall", "attr");
				return;
		}
	}
	}
}
function deleteALL(){

	$sql = "DROP TABLE cryptoholdings";

	if($GLOBALS['con']->query($sql)){
		$GLOBALS['con']->commit();
		textNode('success',"Table deleted successfully..!");
		createDB();
	}
	else{
		textNode('success', "Error in deleting table...");
	}

}
function setID(){
	$getID = getData();
	$id = 0;
	if($getID){
		while($row=$getID->fetch_assoc()){
			$id = $row['id'];
		}
	}
	return ($id + 1);

}
?>