 var shopid = [];
 var itemid = [];
 
 var ah = 0;
 var nomor = false;

 var shops = false;
 var itemss = false;
 var shippings = false;

 // var keyword = document.getElementById('keyword').value = 'kemeja pria';
 // var jumlah = document.getElementById('jumlah').value = '101';

 document.getElementById("button1").addEventListener("click", function(event){
 	event.preventDefault()
 	var keyword = document.getElementById('keyword').value;
 	var jumlah = document.getElementById('jumlah').value;

 	var halaman_sekarang = 1;

 	while (halaman_sekarang <= jumlah) {
 		total = halaman_sekarang * 1;
 		//ambil id
 		$.ajax({
 			type:'GET',
 			url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=1&newest='+total+'&order=desc&page_type=search&version=2',

 			// url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=100&newest='+total+'&order=desc&page_type=search&version=2',
 			success: function(items){

 				var itemid = items.items[0].itemid;
 				var shopid = items.items[0].shopid;
 				// console.log(items.items[0].itemid);

 				//get shop
 				$.ajax({
 					url : 'https://shopee.co.id/api/v2/shop/get?shopid='+shopid,
 					type : 'GET',
 					dataType: 'json',
 					success: function(shop){
 						shops = shop;
 					},
 					async: false
 				});

 				// //get item
 				$.ajax({
 					url : 'https://shopee.co.id/api/v2/item/get?itemid='+itemid+'&shopid='+shopid,
 					type : 'GET',
 					dataType: 'json',
 					success: function(item){
 						ah++;
 						nomor = ah;
 						itemss = item;
 					},
 					async: false
 				});

				//get shipping
				$.ajax({
					url :'https://shopee.co.id/api/v0/shop/'+shopid+'/item/'+itemid+'/shipping_info_to_address/?city=KOTA%20JAKARTA%20PUSAT&district=MENTENG&state=DKI%20JAKARTA',
					type : 'GET',
					dataType: 'json',
					success: function(shipping){
						if (shipping.logistic_service_types.regular !== undefined) {
							var regular = "Reguler, ";
						}else{
							var regular = '';
						}

						if (shipping.logistic_service_types.next_day !== undefined) {
							var next_day = "Next Day, ";
						}
						else{
							var next_day = '';
						}

						if (shipping.logistic_service_types.instant !== undefined) {
							var instant = "Instant, ";
						}
						else{
							var instant = '';
						}

						if (shipping.logistic_service_types.same_day !== undefined) {
							var same_day = "Same Day, ";
						}
						else{
							var same_day = '';
						}

						if (shipping.logistic_service_types.shopee_logistics !== undefined) {
							var shopee_logistics = "Shopee Logistics, ";
						}
						else{
							var shopee_logistics = '';
						}

						if (shipping.logistic_service_types.regular_cargo !== undefined) {
							var regular_cargo = "Reguler (Cargo), ";
						}
						else{
							var regular_cargo = '';
						}

						var pengiriman = regular + same_day + shopee_logistics + regular_cargo + instant + next_day;
						shippings = pengiriman.slice(0, -2);

					},
					async: false
				});

				console.log(nomor);

				$('#tai').append(`
					<tr class="aha">
					<th scope="row">`+nomor+`</th>
					<td id="satu">`+itemss.item.name+`</td>
					<td id="dua">`+shops.data.name+`</td>
					<td id="tiga">`+shippings+`</td>
					</tr>
					`);

				// document.getElementById("tai").innerHTML.reload;
				// $( "#tai" ).load(window.location.href + " #tai" );

			}
		});
		halaman_sekarang++;
	}
});