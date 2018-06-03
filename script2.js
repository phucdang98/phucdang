console.log('connected');
// var imgLoading=$("#image-preview").attr("src");
$(document).ready(function(){
	getProduct();

	$('#product-table').DataTable({
		responsive: false,
		autoWidth: false,
		
	});

	
	
	// Delete Product
	$("tbody").on("click", ".delete", function(){
		var id = $(this).parents("tr").attr("id");
		$('#did').val(id);
		// Hiá»ƒn thá»‹ popup
		$("#delete").modal();
	}) // End update
	// Xá»­ lĂ½ submit form cáº­p nháº­t
	$("#udelete-btn").click(function(){
		//event.preventDefault();
		var formData = $("#delete-product-form").serialize();
		console.log(formData);
		$.ajax({
			method: "POST",
			url :"deleteProduct2.php",
			// dataType: 'json',
			data: formData ,
		}).done(function(data){
			if(data.result) {
			// TODO ÄĂ³ng modal
			$(".fade").modal("hide");
			// TODO XoĂ¡ trá»‘ng cĂ¡c input
			// Äá»c láº¡i danh sĂ¡ch sáº£n pháº©m
			$("#modal fade").modal("hide");
			getProduct();
			}else{

			}
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})
}) // End document ready

function getProduct(){
	$.ajax({
		url: 'getProduct2.php',
		method: 'POST',
		dataType: 'json',
		//data
	}).done(function(data){
		console.log(data);
		if (data.result) {
			var rows = "";
			$.each(data.product, function(index, product){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+product.id+"'>";
				
				rows += "<td class='name'>"+product.username+"</td>";
				rows += "<td class='code'>"+product.pass+"</td>";
				rows += "<td class='prices'>"+product.fname+"</td>";
				rows += "<td class='description'>"+product.lname+"</td>";
				rows += "<td class='category'>"+product.phone+"</td>";
				rows += "<td>";
				
				rows += "<button class='btn btn-danger delete'><i class='fa fa-trash'>Delete</i></button>";
				rows += "</td>";
				rows += "</tr>";
			})
			$("tbody").html(rows);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+jqXHR.responseText);
		console.log(statusText);
	}).always(function(){

	})
}
