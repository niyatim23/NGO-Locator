var count=0;
var id_ngo=[];

$(document).ready(function(){
	console.log("Document Loaded");
	$("#toys_button").click(function(){
        init_table();
    });
});

function init_table(){
	$.ajax({
		type:'POST',
		url: 'toys.php',
		dataType: 'json',
		success: handle_success_data,
		error: handle_error
	});
}

function handle_error(){
	alert("Error");
}

function handle_success_data(){
	$.each(function(i,item){
		var tmp=item;
		var name=tmp.name;
		var address=tmp.address;
		updateTable(name,address);
	});
}

function updateTable(name,address){
	var tr1="<tr>";
	var tr2="</tr>";
	var th1="<th>";
	var th2="</th>";
	var input_text=name;
	var input_text2=address;
	var row;
	row+=tr1;
	row+=th1;
	row+=input_text;
	row+=th2;
	row+=th1;
	row+=input_text2;
	row+=th2;
	row+=tr2;
	$("#table_body").append(row);
}

