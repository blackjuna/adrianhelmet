$(document).ready(function() {
	$("#pilihharga").change(function() {
		$.ajax({
			type: "GET",
			url: '../vb/produk_id/',
			data: {id : $('#aids').val()},
			dataType: 'json',
			success: function(data) {
				var v = data.harga_satuan;
				if ($("#pilihharga").val() == '0') {
					$("#addStok").css({'display':'block'});
					$(".tampil-harga").css({'display':'block'});
					$("#rin-karton").css({'display':'none'});
					$("#harga").text('');
					$("#jumlah").keyup(function() {
						if ($(this).val() > 0) {
							$("#harga").text($(this).val()*v);
						}else{
							$("#harga").text('');
						}
					});
				}else if($("#pilihharga").val() == '1'){
					$("#jumlah").val('');
					$("#addStok").css({'display':'none'});
					$(".tampil-harga").css({'display':'block'});
					$("#rin-karton").css({'display':'block'});
					$("#harga").text(v*20);
					$("#vharga").val(v*20);
				}
			}
		});
	});

	// Tidak Dicostum warna
	$("#tcos").click(function() {
		if ($(this).prop('checked') === true) {
			$('.pilihwarna').hide();
			$('.pilihtext').hide();
			$('#pilihwarna').prop('selectedIndex',0);
			
		}
	});

		// Tidak Dicostum warna
	$("#txcos").click(function() {
		if ($(this).prop('checked') === true) {
			$('.pilihwarna').hide();
			$('.pilihtext').show();
			$('#pilihwarna').prop('selectedIndex',0);
		}
	});

	// Dicostum warna
	$("#cos").click(function() {
		if ($(this).prop('checked') === true) {
			$('.pilihwarna').hide();
			$('.pilihtext').hide();
			$('#ptext').val('');
		}
	});
});