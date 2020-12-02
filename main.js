
let id = $("input[name*='id']");
id.attr("readonly","readonly");

$(".btnedit").click(e=>{
	console.log("icon clicked.");
	let textvalues = displayData(e);
	let user = $("input[name*='Username']");
	let BTC = $("input[name*='BTC']");
	let ETH = $("input[name*='ETH']");
	let DASH = $("input[name*='DASH']");

	id.val(textvalues[0]);
	user.val(textvalues[1]);
	BTC.val(textvalues[2]);
	ETH.val(textvalues[3]);
	DASH.val(textvalues[4]);
	});

function displayData(e){
	let id=0;
	const td = $("tbody tr td");
	let textvalues=[];

	for(const value of td){
		if(value.dataset.id == e.target.dataset.id){
			console.log(e.target.dataset.id);
			textvalues[id++]=value.textContent;

		}
	}
	return textvalues;
}

$(document).ready(function() {

	$("update").click(function(){   
		$("#here").load("load-table.php");
	});



});