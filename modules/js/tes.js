 var shopid = [];
 var itemid = [];
 var $items = $('#item');
 var $shops = $('#shop');
 var $shipping = $('#ship');

 var $satu = $('#satu');
 var $dua = $('#dua');
 var $tiga = $('#tiga');
 var $no = $('#no');

 var total = 0;
 var ah = 0;
 var nomor = false;

 var data = [];
 var shops = false;
 var itemss = false;
 var shippings = false;

 // var keyword = document.getElementById('keyword').value = 'kemeja pria';
 // var jumlah = document.getElementById('jumlah').value = '101';

 document.getElementById("button1").addEventListener("click", function(event){
 	event.preventDefault()
 	var keyword = document.getElementById('keyword').value;
 	var jumlah = document.getElementById('jumlah').value;

 	if (jumlah <= 100) {
 		$.ajax({
 			type:'GET',
 			url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=100&newest='+jumlah+'&order=desc&page_type=search&version=2',
 			success: function(items){
 				console.log(items.items);
 				for (var i = 0; i < jumlah; i++) {
 					var item = items.items[i];
 						// $items.append('<li>'+i+' itemid: '+ item.itemid+' shopid: '+item.shopid+'</li>');
 						//get shop
 						var url = 'https://shopee.co.id/api/v2/shop/get?shopid='+item.shopid;
 						$.getJSON(url, function(shop){
 							// console.log(shop.data.rating_bad);
 							$items.append('<li> rating_bad: '+ shop.data.rating_bad+'</li>');
 						});
 					}
 				// $.each(items.items, function(i = jumlah, item){
 				// 	$items.append('<li>'+i+' itemid: '+ item.itemid+' shopid: '+item.shopid+'</li>');
 				// });
 				
 			}
 		});
 	}else{
 		var berapa = jumlah / 1;
 		var berapa1 = Math.floor(berapa);
 		var halaman_sekarang = 1;
 		var angka = 1;
 		if (berapa > berapa1) {
 			var halaman = berapa1 + 1;
 		}else{
 			var halaman = berapa;
 		}
 		while (halaman_sekarang <= halaman) {
 			total = halaman_sekarang * 1;
 			//ambil id
 			$.ajax({
 				type:'GET',
 				url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=1&newest='+total+'&order=desc&page_type=search&version=2',
 				
 				// url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=100&newest='+total+'&order=desc&page_type=search&version=2',
 				success: function(items){
 					var nilai = angka++ * 1;
 					if (jumlah > nilai){
 						var loh = 1;
 					}else{
 						var loh = 1 - (nilai - jumlah);
 					}
 					
 					for (var i = 0; i < loh; i++) {
 						var itemid = items.items[i].itemid;
 						var shopid = items.items[i].shopid;
 						// console.log("itemid: "+itemid +" shopid: "+shopid);
 						
 						// ini bisa shopnya
 						// var shop = getShop(item.shopid);
 						// console.log(shop.data);

 						// var items = getItem(item.itemid, item.shopid);
 						// console.log(items);

 						// var shipping = getShipping(item.itemid, item.shopid);
 						// console.log(shipping);

 						// //get shop
 						$.ajax({
 							url : 'https://shopee.co.id/api/v2/shop/get?shopid='+shopid,
 							type : 'GET',
 							dataType: 'json',
 							success: function(shop){
 								shops = shop;
 								// console.log(shops);
 								// // document.getElementById("dua").innerHTML = shop.data.name;
 								// $dua.append('<tr class="loh"><td>'+shop.data.name+'</td></tr>');
 								// // $('#dua').html(shop.data.name);
 							},
 							async: false
 						});
 						// // return 
 						// // console.log(shop);

 						// //get item
 						$.ajax({
 							url : 'https://shopee.co.id/api/v2/item/get?itemid='+itemid+'&shopid='+shopid,
 							type : 'GET',
 							dataType: 'json',
 							success: function(item){
 								ah++;
 								nomor = ah;
 								// console.log(nomor);
 								itemss = item;
 								// console.log(item);

 								// // var elem = document.getElementById("myBar");
 								// // elem.style.width = nomor + "%";
 								// // elem.innerHTML = nomor  + "%";
 								// // var noh = 100 / jumlah;
 								// // $('#myBar').append('<a>'+noh+'</a>');
 								// // document.getElementById("satu").innerHTML = item.item.name;
 								// $no.append('<tr class="loh"><td>'+ah+'</td></tr>');
 								// $satu.append('<tr class="loh"><td>'+item.item.name+'</td></tr>');
 								// // $('#no').html(ah);
 								// // $('#satu').html(item.item.name);
 							},
 							async: false
 						});
 						// // items = getItem(itemid, shopid);
 						// url = 'https://shopee.co.id/api/v2/item/get?itemid='+itemid+'&shopid='+shopid;
 						// $.getJSON(url, function(item){
 						// 	itemss = item;
 						// });


 						// //get shipping
 						$.ajax({
 							url :'https://shopee.co.id/api/v0/shop/'+shopid+'/item/'+itemid+'/shipping_info_to_address/?city=KOTA%20JAKARTA%20PUSAT&district=MENTENG&state=DKI%20JAKARTA',
 							type : 'GET',
 							dataType: 'json',
 							success: function(shipping){
 								// shippings = shipping;
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

 								// console.log(shippings);
 								// $('#dua').html(pengiriman);
 								 // $tiga.append('<tr class="loh"><td>'+shippings+'</td></tr>');
 								// $items.append('<li> pengiriman: '+ pengiriman +'</li>');
 								// document.getElementById("tiga").innerHTML = pengiriman;
 							},
 							async: false
 						});

 						// $('#dua').html(JSON.stringify(shippings.logistic_service_types));
 						// console.log(shippings);
 						// console.log(itemss.item);
 						// console.log(shops.data);

 						// data = data.concat(shippings.logistic_service_types, itemss.item, shops.data);
 						// // console.log(JSON.stringify(data));
 						// // $.each(data, function(i, data){
 						// // 	console.log(data);
 						// // });
 						// $items.append('<li> rating_bad: '+ JSON.stringify(data)+'</li>');
 						// nomor++;
 						console.log(nomor);

 						// move(jumlah);
 						

 						$('#tai').append(`
 							<tr class="aha">
 							<th scope="row">`+nomor+`</th>
 							<td id="satu">`+itemss.item.name+`</td>
 							<td id="dua">`+shops.data.name+`</td>
 							<td id="tiga">`+shippings+`</td>
 							</tr>
 							`);


 					}
 				}
 			});

 halaman_sekarang++;
}

}
});