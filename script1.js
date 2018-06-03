console.log('connected');
// var imgLoading=$("#image-preview").attr("src");
$(document).ready(function(){
	getProduct();
	$('#product-table').DataTable({
		responsive: false,
		autoWidth: false,
		
	});
	$("#add-btn").click(function(event){
		event.preventDefault();
		let productform=document.querySelector("#add-product-form");
		
		$.ajax({
			method: "POST",
			url : "addProduct1.php",
			dataType: 'json',
			processData: false,
			contentType: false,
			data: new FormData(productform),
		}).done(function(data){

			if(data.result) {
			$("#myModal").modal("hide");
			getProduct();
			
			}else{

			}
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	}) // End Add Product
	// Update Product
	$("tbody").on("click", ".edit", function(){
		// Lay thong tin
		var id = $(this).parents("tr").attr("id");
		var name = $(this).parents("tr").find(".name").text();
		var date = $(this).parents("tr").find(".date").text();
		var description = $(this).parents("tr").find(".description").text();
		var chitiet = $(this).parents("tr").find(".chitiet").text();
		var soluong = $(this).parents("tr").find(".soluong").text();
		var img =$(this).parents("tr").find(".thumbnail").attr('src');
		
		// Hiá»ƒn thá»‹ thĂ´ng tin form cáº­p nháº­t
		$("#uid").val(id);
		$("#uname").val(name);
		$("#udate").val(date);
		$("#udescription").val(description);
		$("#uchitiet").val(chitiet);
		$("#usoluong").val(soluong);
		$("img.img-update").attr('src', img);
		// hien thi popup
		$("#update").modal();
	}) // End update
	// Xá»­ lĂ½ submit form cáº­p nháº­t
	$("#usave-btn").click(function(event){
		event.preventDefault();
		let Updata=document.querySelector("#update-product-form");
		
		$.ajax({
			method: "POST",
			url :"updateProduct1.php",
			dataType: 'json',
			processData: false,
			contentType: false,
			data: new FormData(Updata),
			// data: formData ,
		}).done(function(data){
			if(data.result) {
			// TODO ÄĂ³ng modal
			$("#update").modal("hide");
			// TODO XoĂ¡ trá»‘ng cĂ¡c input
			// Äá»c láº¡i danh sĂ¡ch sáº£n pháº©m
			getProduct();
			}else{
			}
				

		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})
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
			url :"deleteProduct1.php",
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
		url: 'getProduct1.php',
		method: 'POST',
		dataType: 'json',
		//data
	}).done(function(data){
		console.log(data);
		if (data.result) {
			var rows = "";
			$.each(data.new, function(index, news){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+ news.id+"'>";
				rows += "<td class='image'><img class='thumbnail'style='width: 300px;' src='"+news.image+"'></td>";
				rows += "<td class='name'>"+news.name+"</td>";
				rows += "<td class='date'>"+news.date+"</td>";
				rows += "<td class='description'>"+news.noidung+"</td>";
				rows += "<td class='chitiet'>"+news.link+"</td>";
				rows += "<td class='soluong'>"+news.soluongxem+"</td>";
				rows += "<td>";
				rows += "<button class='btn btn-primary edit'><i class='fa fa-pencil'>Edit</i></button>";
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




    function loadImage(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $(input).parent().find(".image-preview").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    $("input[type=file]").change(function(){
        loadImage(this);
    });
