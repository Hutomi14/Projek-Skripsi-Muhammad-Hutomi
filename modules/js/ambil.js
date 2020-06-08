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
				cekpengiriman = "ada";
			}
			else{
				var same_day = '';
				cekpengiriman = 'gada';
			}

			if (shipping.logistic_service_types.shopee_logistics !== undefined) {
				var shopee_logistics = "Shopee Logistics, ";
				shopeelogistics = "ada";
			}
			else{
				var shopee_logistics = '';
				shopeelogistics = "gada";
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
	// if (shops.data.rating_star>=4.5) {
	// 	if (shops.data.response_rate >=90) {
	// 		if (cekpengiriman=="ada") {
	// 			var status_toko = "Asli";
	// 		}else {
	// 			var status_toko = "Rating Baik";
	// 		}
	// 	}
	// 	else {
	// 		var status_toko = "Rating Normal";
	// 	}
	// }
	// else {
	// 	var status_toko = "Palsu";
	// }
	
	// if (shops.data.rating_star>=4.5 && shops.data.response_rate >=90 && cekpengiriman=="ada") {
	// 	var status_toko = "Asli";
	// }

	// if (shops.data.rating_star>=4.5 || shops.data.rating_star>=4.5 && shops.data.response_rate >=90) {
	// 	var status_toko = "Rating Baik";
	// }

	if (shops.data.rating_star<=4.5 || shops.data.rating_star<=4.5 && shops.data.response_rate <=90 && cekpengiriman == "gada" || shopeelogistics=="ada") {
		var status_toko = "Palsu";
	} else {
		
		if (shops.data.rating_star>=4.5 && shops.data.response_rate >=90 && cekpengiriman=="ada") {
			var status_toko = "Asli";
		}else {
			var status_toko = "Rating Baik";
		}
		
	}

	// buat format rupiah
	var bilangan = parseInt(itemss.item.price/100000);
	var	reverse = bilangan.toString().split('').reverse().join(''),
	rupiah 	= reverse.match(/\d{1,3}/g);
	rupiah	= "Rp "+rupiah.join('.').split('').reverse().join('');

	//cek null produk
	if (itemss.item.historical_sold === null) {
		var produk_terjual = 0;
	} else {
		var produk_terjual = itemss.item.historical_sold;
	}

	if (itemss.item.item_rating.rating_star === null) {
		var rating_produk = 0;
	} else {
		var rating_produk = itemss.item.item_rating.rating_star.toFixed(1);
	}

	if (itemss.item.item_rating.rating_count[0] === null) {
		var jumlah_penilai = 0;
	} else {
		var jumlah_penilai = itemss.item.item_rating.rating_count[0];
	}

	if (itemss.item.item_rating.rating_count[5] === null) {
		var bintang5 = 0;
	} else {
		var bintang5 = itemss.item.item_rating.rating_count[5];
	}

	if (itemss.item.item_rating.rating_count[4] === null) {
		var bintang4 = 0;
	} else {
		var bintang4 = itemss.item.item_rating.rating_count[4];
	}

	if (itemss.item.item_rating.rating_count[3] === null) {
		var bintang3 = 0;
	} else {
		var bintang3 = itemss.item.item_rating.rating_count[3];
	}

	if (itemss.item.item_rating.rating_count[2] === null) {
		var bintang2 = 0;
	} else {
		var bintang2 = itemss.item.item_rating.rating_count[2];
	}

	if (itemss.item.item_rating.rating_count[1] === null) {
		var bintang1 = 0;
	} else {
		var bintang1 = itemss.item.item_rating.rating_count[1];
	}

	if (itemss.item.item_rating.rcount_with_image === null) {
		var ratingdgnfoto = 0;
	} else {
		var ratingdgnfoto = itemss.item.item_rating.rcount_with_image;
	}

	if (itemss.item.item_rating.rcount_with_context === null) {
		var ratingdgntext = 0;
	} else {
		var ratingdgntext = itemss.item.item_rating.rcount_with_context;
	}

	//cek null toko
	if (shops.data.rating_star === null) {
		var rating_toko = 0;
	} else {
		var rating_toko = shops.data.rating_star.toFixed(1);
	}

	if (shops.data.item_count === null) {
		var jumlah_produk = 0;
	} else {
		var jumlah_produk = shops.data.item_count;
	}

	if (shops.data.rating_good === null) {
		var rating_baik = 0;
	} else {
		var rating_baik = shops.data.rating_good;
	}

	if (shops.data.rating_normal === null) {
		var rating_normal = 0;
	} else {
		var rating_normal = shops.data.rating_normal;
	}

	if (shops.data.rating_bad === null) {
		var rating_buruk = 0;
	} else {
		var rating_buruk = shops.data.rating_bad;
	}

	if (shops.data.follower_count === null) {
		var follower = 0;
	} else {
		var follower = shops.data.follower_count;
	}

	if (shops.data.account.following_count === null) {
		var following = 0;
	} else {
		var following = shops.data.account.following_count;
	}

	
	

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
		<tr><td>Produk Terjual</td><td>`+produk_terjual+` produk</td></tr>
		<tr><td>Rating Produk</td><td>`+rating_produk+` (`+jumlah_penilai+` penilai)</td></tr>
		<tr><td>Responden</td><td>`+jumlah_penilai+` penilai</td></tr>
		<tr><td rowspan="7"><img src="https://cf.shopee.co.id/file/`+itemss.item.image+`" height="200px"></td>
		<td>Bintang 5 (`+bintang5+`)</td></tr>
		<tr><td>Bintang 4 (`+bintang4+`)</td></tr>
		<tr><td>Bintang 3 (`+bintang3+`)</td></tr>
		<tr><td>Bintang 2 (`+bintang2+`)</td></tr>
		<tr><td>Bintang 1 (`+bintang1+`)</td></tr>
		<tr><td>Rating dengan foto (`+ratingdgnfoto+`)</td></tr>
		<tr><td>Rating dengan text (`+ratingdgntext+`)</td></tr>
		</table>
		</div>
		<div class="ho">
		<table width="100%">
		<tr><td width="150px">Jumlah Produk</td><td>`+jumlah_produk+` unit</td></tr>
		<tr><td>Pemilik Toko</td><td>`+shops.data.account.username+`</td></tr>
		<tr><td>Lokasi Toko</td><td>`+shops.data.place+`</td></tr>
		<tr><td>Pengriman</td><td>`+shippings+`</td></tr>
		<tr><td>Rating Toko</td><td>`+rating_toko+` (`+parseInt(shops.data.rating_good+shops.data.rating_normal+shops.data.rating_bad)+` penilaian)</td></tr>
		<tr><td>Rating Baik</td><td>`+rating_baik+` penilai</td></tr>
		<tr><td>Rating Normal</td><td>`+rating_normal+` penilai</td></tr>
		<tr><td>Rating Buruk</td><td>`+rating_buruk+` penilai</td></tr>
		<tr><td>Follower</td><td>`+follower+`</td></tr>
		<tr><td>Following</td><td>`+following+`</td></tr>
		<tr><td>Response Rate</td><td>`+shops.data.response_rate+`</td></tr>
		

		</table>
		</div>

		</td>
		</tr>
		`);
	// console.log(rupiah); <tr><td>Response Rate</td><td>`+shops.data.response_rate+`</td></tr>

	//post data
	$.ajax({
		type:'POST',
		url: 'modules/insertdata.php',
		data:{

			shopid : shop,
			nama_toko : shops.data.name,
			jumlah_produk : jumlah_produk,
			lokasi_toko : shops.data.place,
			rating_toko : rating_toko,
			pemilik_toko : shops.data.account.username,
			rating_baik : rating_baik,
			rating_normal : rating_normal,
			rating_buruk : rating_buruk,
			following : following,
			follower : follower,
			status : status_toko,
			response_rate : shops.data.response_rate,

			pengiriman : shippings,

			itemid : item,
			nama_produk : itemss.item.name,
			harga_produk : rupiah,
			produk_terjual : produk_terjual,
			status_produk : itemss.item.item_status,
			rating_produk : rating_produk,
			ratingdgnfoto : ratingdgnfoto,
			ratingdgntext : ratingdgntext,
			jumlah_penilai : jumlah_penilai,
			bintang1 : bintang1,
			bintang2 : bintang2,
			bintang3 : bintang3,
			bintang4 : bintang4,
			bintang5 : bintang5,
			gambar_produk : itemss.item.image
		}
	});
	$("#keyword").val('');
	$("#jumlah").val('');
}

document.getElementById("button1").addEventListener("click", function(event){
	event.preventDefault()
	$('#data-tabel').html("");
	$('#status').html("");
	$('#jumlah-toko').html("");

	keyword = $("#keyword").val();
	jumlah = $("#jumlah").val();

	console.log(keyword +" "+ jumlah);

	if (keyword !="" && jumlah !="") {
		// console.log("mantap");

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

				//buat antrian array
				if (jumlah <= 100) {
					$.ajax({
						type:'GET',
						url:'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='+keyword+'&limit=100&newest='+jumlah+'&order=desc&page_type=search&version=2',
						success: function(items){
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
 								console.log("Link ke-"+i+" : itemid:"+item + " shopid:" + shop);

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
 						console.log("Link ke-"+i+" : itemid:"+item + " shopid:" + shop);

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

			}
		});
		
	} else {
		console.log("isi data");
	}


});