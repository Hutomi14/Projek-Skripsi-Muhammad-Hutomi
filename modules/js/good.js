 var shopid = [];
 var itemid = [];
 

 var nomor = false;

 var shops = false;
 var itemss = false;
 var shippings = false;
 var cekpengiriman = false;

 var nama = "";
 var keyword = "";
 var jumlah = "";

 // var keyword = document.getElementById('keyword').value = 'kemeja pria';
 // var jumlah = document.getElementById('jumlah').value = '101';

 function ambildata(){
 	var halaman_sekarang = 1;
 	var ah = 0;

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
							cekpengiriman = "ada"
						}
						else{
							var same_day = '';
							cekpengiriman = 'gada';
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

				// var nama = document.getElementById('nama').value;
				// var keyword = document.getElementById('keyword').value;
				// var jumlah = document.getElementById('jumlah').value;


				// console.log(nomor);
				// console.log(nama);
				// console.log(keyword);
				// console.log(jumlah);
				// console.log(itemid);
				// console.log(shopid);

				// $('#data-tabel').append(`
				// 	<tr class="aha">
				// 	<th scope="row">`+nomor+`</th>
				// 	<td id="satu">`+itemss.item.name+`</td>
				// 	<td id="dua">`+shops.data.name+`</td>
				// 	<td id="tiga">`+shippings+`</td>
				// 	</tr>
				// 	`);

				// <div class="oh"></div>
				// 	<div class="oh"></div>

				// <td></td>
				// 	<td colspan="2">
				
				// 		<table cellpadding="1" cellspacing="0" border="0" style="padding-left:10px;">
				// 		<tr><td>Harga</td><td>Rp `+itemss.item.price+`</td></tr>
				// 		<tr><td>Produk Terjual</td><td>`+itemss.item.historical_sold+`</td></tr>
				// 		<tr><td>Rating Produk</td><td>`+itemss.item.item_rating.rating_star+` (`+itemss.item.item_rating.rating_count[0]+` penilai)</td></tr>
				// 		<tr><td rowspan="7"><img src="https://cf.shopee.co.id/file/`+itemss.item.image+`" height="200px"></td>
				// 		<td>Bintang 5 (`+itemss.item.item_rating.rating_count[5]+`)</td></tr>
				// 		<tr><td>Bintang 4 (`+itemss.item.item_rating.rating_count[4]+`)</td></tr>
				// 		<tr><td>Bintang 3 (`+itemss.item.item_rating.rating_count[3]+`)</td></tr>
				// 		<tr><td>Bintang 2 (`+itemss.item.item_rating.rating_count[2]+`)</td></tr>
				// 		<tr><td>Bintang 1 (`+itemss.item.item_rating.rating_count[1]+`)</td></tr>
				// 		<tr><td>Rating dengan foto (`+itemss.item.item_rating.rcount_with_image+`)</td></tr>
				// 		<tr><td>Rating dengan text (`+itemss.item.item_rating.rcount_with_context+`)</td></tr>
				// 		</table>
				// 	</td>
				// 	<td>haha</td>
				var linktoko = "https://shopee.co.id/"+shops.data.account.username;
				var linkproduk = "https://shopee.co.id/"+itemss.item.name.replace(" ", "-")+"-i."+shopid+"."+itemid;
				
				// if (cekpengiriman=="ada" && )
				// var status_toko = "Asli";

				// if (cekpengiriman=="ada" && shops.data.rating_star>=4.5 && itemss.item.item_rating.rating_star >= 4.5 && shops.data.response_rate >=90){
				// 	var status_toko = "Asli";
				// }
				// else if (shops.data.rating_star>=4.5 && itemss.item.item_rating.rating_star >= 4.5 && shops.data.response_rate >=90){ 
				// 	var status_toko = "Rating Baik";
				// }
				// else {
				// 	var status_toko = "Palsu";
				// }

				if (shops.data.rating_star>=4.5) {
					if (shops.data.response_rate >=90) {
						if (cekpengiriman=="ada") {
							var status_toko = "Asli";
						}else {
							var status_toko = "Rating Baik";
						}
					}
					else {
						var status_toko = "Rating Normal";
					}
				}
				else {
					var status_toko = "Palsu";
				}

				// buat format rupiah
				var bilangan = parseInt(itemss.item.price/100000);
				var	reverse = bilangan.toString().split('').reverse().join(''),
				rupiah 	= reverse.match(/\d{1,3}/g);
				rupiah	= "Rp "+rupiah.join('.').split('').reverse().join('');

				$('#data-tabel').append(`
					<tr>
					<td class="toggle details-control"  data-target="`+itemid+`"></td>
					<td>`+nomor+`</td>
					<td><a href="`+linkproduk+`" target="_blank">`+itemss.item.name+`</a></td>
					<td><a href="`+linktoko+`" target="_blank">`+shops.data.name+`</a></td>
					<td>`+status_toko+`</td>
					</tr>
					<tr class="`+itemid+`" style="display: none">
					<td colspan="5">
					<div class="oh">
					<table width="100%">
					<tr><td>Harga</td><td>`+rupiah+`</td></tr>
					<tr><td>Produk Terjual</td><td>`+itemss.item.historical_sold+` produk</td></tr>
					<tr><td>Rating Produk</td><td>`+itemss.item.item_rating.rating_star.toFixed(1)+` (`+itemss.item.item_rating.rating_count[0]+` penilai)</td></tr>
					<tr><td rowspan="7"><img src="https://cf.shopee.co.id/file/`+itemss.item.image+`" height="200px"></td>
					<td>Bintang 5 (`+itemss.item.item_rating.rating_count[5]+`)</td></tr>
					<tr><td>Bintang 4 (`+itemss.item.item_rating.rating_count[4]+`)</td></tr>
					<tr><td>Bintang 3 (`+itemss.item.item_rating.rating_count[3]+`)</td></tr>
					<tr><td>Bintang 2 (`+itemss.item.item_rating.rating_count[2]+`)</td></tr>
					<tr><td>Bintang 1 (`+itemss.item.item_rating.rating_count[1]+`)</td></tr>
					<tr><td>Rating dengan foto (`+itemss.item.item_rating.rcount_with_image+`)</td></tr>
					<tr><td>Rating dengan text (`+itemss.item.item_rating.rcount_with_context+`)</td></tr>
					</table>
					</div>
					<div class="ho">
					<table width="100%">
					<tr><td width="150px">Jumlah Produk</td><td>`+shops.data.item_count+` unit</td></tr>
					<tr><td>Pemilik Toko</td><td>`+shops.data.account.username+`</td></tr>
					<tr><td>Lokasi Toko</td><td>`+shops.data.place+`</td></tr>
					<tr><td>Pengriman</td><td>`+shippings+`</td></tr>
					<tr><td>Rating Toko</td><td>`+shops.data.rating_star.toFixed(1)+` (`+parseInt(shops.data.rating_good+shops.data.rating_normal+shops.data.rating_bad)+` penilaian)</td></tr>
					<tr><td>Rating Baik</td><td>`+shops.data.rating_good+` penilai</td></tr>
					<tr><td>Rating Normal</td><td>`+shops.data.rating_normal+` penilai</td></tr>
					<tr><td>Rating Buruk</td><td>`+shops.data.rating_bad+` penilai</td></tr>
					<tr><td>Follower</td><td>`+shops.data.follower_count+`</td></tr>
					<tr><td>Following</td><td>`+shops.data.account.following_count+`</td></tr>
					<tr><td>Response Rate</td><td>`+shops.data.response_rate+`</td></tr>

					</table>
					</div>

					</td>
					</tr>
					`);
				console.log(rupiah);
				$.ajax({
					type:'POST',
					url: 'modules/insertdata.php',
					data:{

						// kode_pencarian : kode_pencarian,
						shopid : shopid,
						nama_toko : shops.data.name,
						jumlah_produk : shops.data.item_count,
						lokasi_toko : shops.data.place,
						rating_toko : shops.data.rating_star.toFixed(1),
						pemilik_toko : shops.data.account.username,
						rating_baik : shops.data.rating_good,
						rating_normal : shops.data.rating_normal,
						rating_buruk : shops.data.rating_bad,
						following : shops.data.account.following_count,
						follower : shops.data.follower_count,
						status : status_toko,

						pengiriman : shippings,

						itemid : itemid,
						nama_produk : itemss.item.name,
						harga_produk : rupiah,
						produk_terjual : itemss.item.historical_sold,
						status_produk : itemss.item.item_status,
						rating_produk : itemss.item.item_rating.rating_star.toFixed(1),
						ratingdgnfoto : itemss.item.item_rating.rcount_with_image,
						ratingdgntext : itemss.item.item_rating.rcount_with_context,
						jumlah_penilai : itemss.item.item_rating.rating_count[0],
						bintang1 : itemss.item.item_rating.rating_count[1],
						bintang2 : itemss.item.item_rating.rating_count[2],
						bintang3 : itemss.item.item_rating.rating_count[3],
						bintang4 : itemss.item.item_rating.rating_count[4],
						bintang5 : itemss.item.item_rating.rating_count[5],
						gambar_produk : itemss.item.image
						// 'https://cf.shopee.co.id/file/' + 

					}
				});

				// document.getElementById("tai").innerHTML.reload;
				// $( "#tai" ).load(window.location.href + " #tai" );

			}
		});
 halaman_sekarang++;

 // if (halaman_sekarang == (jumlah+1)) {
 // 	var nama = document.getElementById('nama').value = '';
 // 	var keyword = document.getElementById('keyword').value = '';
 // 	var jumlah = document.getElementById('jumlah').value = '';
 // }
}
$("#keyword").val('');
$("#jumlah").val('');
}

























$('#button1').on('keyup', function(e){
	if (e.keyCode === 13) {
 		// panggil fungsi
 	}
 });

document.getElementById("button1").addEventListener("click", function(event){
	event.preventDefault();

// $(".buttonn").click(function(){

	$('#data-tabel').html('');

 	// var nama = document.getElementById('nama').value;
 	// var keyword = document.getElementById('keyword').value;
 	// var jumlah = document.getElementById('jumlah').value;

 	// nama =$("#nama").val();
 	keyword=$("#keyword").val();
 	jumlah = $("#jumlah").val();

 	// console.log(nama);
 	// console.log(keyword);
 	// console.log(jumlah);

 	$.ajax({
 		url : 'modules/insertkeyword.php',
 		method :'POST',
 		// url	: 'modules/insertkeyword.php',
 		data : {
 			// nama : nama,
 			keyword :keyword,
 			jumlah : jumlah
 		},
 		success:function(data){
 		// 	// alert(data);
 		// 	if (confirm(data)) {
			//   // Save it!

			//   console.log('Thing was saved to the database.');
			// }
			//   // Do nothing!
			//   ambildata();
			//   console.log('Thing was not saved to the database.');
			
		}
	});

 	ambildata();

 	
 	
 });