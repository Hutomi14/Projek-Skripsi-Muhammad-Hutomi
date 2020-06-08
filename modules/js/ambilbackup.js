 var shopid = [];
 var itemid = [];
 var total = 0;
 var ah = 0;
 var nomor = false;

 var data = [];
 var shops = false;
 var itemss = false;
 var shippings = false;
 var ambil = [];
 var ambill = [];
 var getdata = [];
 var outputArray = []; 

//remove same object
function removeDuplicates(originalArray, prop) {
	var newArray = [];
	var lookupObject  = {};

	for(var i in originalArray) {
		lookupObject[originalArray[i][prop]] = originalArray[i];
	}

	for(i in lookupObject) {
		newArray.push(lookupObject[i]);
	}
	return newArray;
}

//remove same array
function removeusingSet(arr) { 
	let outputArray = Array.from(new Set(arr)) 
	return outputArray 
} 

function ambildata(shop, item, no){

	// var no_ni= 1;

  	//get shop
  	$.ajax({
  		url : 'https://shopee.co.id/api/v2/shop/get?shopid='+shop,
  		type : 'GET',
  		dataType: 'json',
  		success: function(shop){
  			shops = shop;
  		},
  		async: false
  	});

 	//get item
 	$.ajax({
 		url : 'https://shopee.co.id/api/v2/item/get?itemid='+item+'&shopid='+shop,
 		type : 'GET',
 		dataType: 'json',
 		success: function(item){
 			itemss = item;
 			// nomor = parseInt(no_ni) + 1;
 		},
 		async: false
 	});

	//get shipping
	$.ajax({
		url :'https://shopee.co.id/api/v0/shop/'+shop+'/item/'+item+'/shipping_info_to_address/?city=KOTA%20JAKARTA%20PUSAT&district=MENTENG&state=DKI%20JAKARTA',
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


	var linktoko = "https://shopee.co.id/"+shops.data.account.username;
	var linkproduk = "https://shopee.co.id/"+itemss.item.name.replace(" ", "-")+"-i."+shop+"."+item;

	//cek toko
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

	//append data
	$('#data-tabel').append(`
		<tr>
		<td class="toggle details-control"  data-target="`+item+`"></td>
		<td>`+no+`</td>
		<td><a href="`+linkproduk+`" target="_blank">`+itemss.item.name+`</a></td>
		<td><a href="`+linktoko+`" target="_blank">`+shops.data.name+`</a></td>
		<td>`+status_toko+`</td>
		</tr>
		<tr class="`+item+`" style="display: none">
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
	// console.log(rupiah);

	//post data
	$.ajax({
		type:'POST',
		url: 'modules/insertdata.php',
		data:{

			shopid : shop,
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

			itemid : item,
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
		}
	});
	$("#keyword").val('');
	$("#jumlah").val('');
}

document.getElementById("button1").addEventListener("click", function(event){
	event.preventDefault()
	$('#data-tabel').html('');
	keyword =$("#keyword").val();
	jumlah = $("#jumlah").val();

	var y =document.getElementById("hasil");
	if (y.style.display==="none") {
		y.style.display="block";
	}

	var x =document.getElementById("statusbar");
	if (x.style.display==="none") {
		x.style.display="block";
	}

	// Get start time
	startDate = new Date();
	msStart = startDate.getTime();

	//insert keyword
	$.ajax({
		url : 'modules/insertkeyword.php',
		method :'POST',
		data : {
			keyword :keyword,
			jumlah : jumlah
		},
		success:function(data){	
		}
	});

	// console.log(jumlah);

	//buat antrian array
	if (jumlah <= 100) {
		$.ajax({
			type:'GET',
			url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=100&newest='+jumlah+'&order=desc&page_type=search&version=2',
			success: function(items){
				// console.log(items.items);
				$('#status').html("");
				$('#jumlah-toko').html("");
				$('#status').append(`Mengambil data halaman 1`);
				itemid.push(items.items);
				data = itemid.flat(); 

				for (var i = 0; i < jumlah; i++) {
					ambil.push({shopid:data[i].shopid, itemid:data[i].itemid});
				}

				var antrian = removeDuplicates(ambil,"shopid");
				console.log("Jumlah Toko: "+antrian.length);
				console.log(antrian);

				$('#jumlah-toko').append(`Jumlah Toko `+antrian.length+` dari `+jumlah+` Pencarian`);

 				// kunjungi link
 				for (var i = 0; i < antrian.length; i++) {
 					var item = antrian[i].itemid;
 					var shop = antrian[i].shopid;

 					var no = 1 + i;
 					$('#status').html("");
 					$('#status').append(`Mengunjungi link ke-`+no);
 					console.log(item + " " + shop);

 					ambildata(shop, item, no);
 				}

 				endDate = new Date();
 				msEnd = endDate.getTime();

				// End time minus start time to get execution time
				msExec = (msEnd - msStart)/1000;

				console.log('It took: ' + msExec + ' seconds');

				$('#status').html("");
				$('#status').append(`Selesai (`+msExec+` detik)`);
			}
		});
	}else{
		var berapa = jumlah / 100;
		var berapa1 = Math.floor(berapa);
		console.log(berapa);
		console.log(berapa1);
		var halaman_sekarang = 1;
		var angka = 1;
		if (berapa > berapa1) {
			var halaman = berapa1 + 1;
		}else{
			var halaman = berapa;
		}
		while (halaman_sekarang <= halaman) {
			total = halaman_sekarang * 100;
			console.log("ambil halaman "+halaman_sekarang);
			$('#status').html("");
			$('#jumlah-toko').html("");
			$('#status').append(`Mengambil data halaman `+halaman_sekarang);
			$.ajax({
				async: false,
				type:'GET',
 				// url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=1&newest='+total+'&order=desc&page_type=search&version=2',
 				url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=100&newest='+total+'&order=desc&page_type=search&version=2',
 				success: function(items){
 					console.log(items.items);
 					itemid.push(items.items);
 					data = itemid.flat(); 
 				}
 			});
			halaman_sekarang++;
		}

		for (var i = 0; i < jumlah; i++) {
			ambil.push({shopid:data[i].shopid, itemid:data[i].itemid});
		}
	 	// console.log(ambil);
	 	// console.log(ambil.length);
	 	// console.log()
	 	var antrian = removeDuplicates(ambil,"shopid");
	 	console.log("Jumlah Toko: "+antrian.length);
	 	console.log(antrian);

	 	$('#jumlah-toko').append(`Jumlah Toko `+antrian.length+` dari `+jumlah+` Pencarian`);
 		// console.log(JSON.stringify(ambil));
 		// console.log(ambil[1]);
 		// console.log(removeusingSet(data));
 		// kunjungi link
 		for (var i = 0; i < antrian.length; i++) {
 			var item = antrian[i].itemid;
 			var shop = antrian[i].shopid;

 			var no = 1 + i;
 			$('#status').html("");
 			$('#status').append(`Mengunjungi link ke-`+no);
 			console.log(item + " " + shop);

 			ambildata(shop, item, no);
 		}
 		endDate = new Date();
 		msEnd = endDate.getTime();

		// End time minus start time to get execution time
		msExec = (msEnd - msStart)/1000;

		console.log('It took: ' + msExec + ' seconds');

		$('#status').html("");
		$('#status').append(`Selesai (`+msExec+` detik)`);
	}

});