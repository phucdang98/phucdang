console.log('connected');
// var imgLoading=$("#image-preview").attr("src");
$(document).ready(function(){
	getProduct();
	getCategory();
	getLoai();
	$('#product-table').DataTable({
		responsive: false,
		autoWidth: false,
		
	});
	$("#add-btn").click(function(event){
		var productForm = document.querySelector("#add-product-form");
		
		$.ajax({
			method: "POST",
			url : "addProduct.php",
			dataType: 'json',
			processData: false,
			contentType: false,
			data: new FormData(productForm),
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
		var soluong = $(this).parents("tr").find(".soluongban").text();
		var speed = $(this).parents("tr").find(".speed").text();
		var description = $(this).parents("tr").find(".description").text();
		var category = $(this).parents("tr").find(".category").text();
		var loai = $(this).parents("tr").find(".loai").text();
		var price = $(this).parents("tr").find(".price").text();
		var img =$(this).parents("tr").find(".thumbnail").attr('src');
		
		// Hiá»ƒn thá»‹ thĂ´ng tin form cáº­p nháº­t
		$("#uid").val(id);
		$("#uname").val(name);
		$("#usoluongban").val(soluong);
		$("#uspeed").val(speed);
		$("#udescription").val(description);
		$("#uprice").val(price);
		$("#ucategory").val(category);
		$("#uloai").val(loai);
		$("img.img-update").attr('src', img);
		// hien thi popup
		$("#updateModal").modal();
	}) // End update
	// Xá»­ lĂ½ submit form cáº­p nháº­t
	$("#usave-btn").click(function(e){
		var productForm = document.querySelector("#update-product-form");
		
		$.ajax({
			method: "POST",
			url : "updateProduct.php",
			dataType: 'json',
			processData: false,
			contentType: false,
			data: new FormData(productForm),

		}).done(function(data){

			console.log(data.sql);
			if(data.result) {
			// 
			$("#updateModal").modal("hide");
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
			url :"deleteProduct.php",
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
		url: 'getProduct.php',
		method: 'POST',
		dataType: 'json',
		//data
	}).done(function(data){

		if (data.result) {
			var rows = "";
			$.each(data.product, function(index, product){

				rows += "<tr id='"+product.id+"'>";
				rows += "<td class='image'><img class='thumbnail'style='width: 300px;' src='"+product.image+"'></td>";
				rows += "<td class='name'>"+product.product_name+"</td>";
				rows += "<td class='soluongban'>"+product.soluongban+"</td>";
				rows += "<td class='speed'>"+product.speed+"</td>";
				rows += "<td class='description'>"+product.description+"</td>";
				rows += "<td class='price'>"+product.prices+"</td>";
				rows += "<td class='category'>"+product.category_id+"</td>";
				rows += "<td class='loai'>"+product.loaiid+"</td>";
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
function getCategory(){
	 $.ajax({
  url: 'getCategory.php',
  method: 'POST',
  dataType: 'json',
  // data: 
 }).done(function(data){

  if(data.result){
   var rows = "";
   $.each(data.categories, function(index, category){
    rows += "<option value='"+category.cateid+"'>"+category.Name+"</option>";
   })
   $("#category").html(rows);
   $("#ucategory").html(rows);
  }
 }).fail(function(jqXHR, statusText, errorThrown){
  console.log("Fail:"+ jqXHR.responseText);
  console.log(errorThrown);
 }).always(function(){
 
 })

}

function getLoai(){
	 $.ajax({
  url: 'getLoai.php',
  method: 'POST',
  dataType: 'json',
  // data: 
 }).done(function(data){

  if(data.result){
   var rows = "";
   $.each(data.loai_id, function(index, loai){
    rows += "<option value='"+loai.loaiid+"'>"+loai.name+"</option>";
   })
   $("#loai").html(rows);
   $("#uloai").html(rows);
  }
 }).fail(function(jqXHR, statusText, errorThrown){
  console.log("Fail:"+ jqXHR.responseText);
  console.log(errorThrown);
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
