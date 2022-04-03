// FORM REGISTRASI ULANG
function UpperCase($id) {
    var x = document.getElementById($id);
    x.value = x.value.toUpperCase();
}

$('#check-agree').on('click', function(e){
	$('#registrasi-btn-submit').toggleClass("disabled");
});
// END FORM REGISTRASI ULANG

// SWEET ALERT
const flashdata = $('.flash-data').data('flashdata');
const target    = $('.flash-data').data('target');
if(flashdata){
	swal.fire({
        icon  : "success",
		title : 'Data ' + target,
		text  : 'Berhasil '+ flashdata
	});
}


$('.btn-delete').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');
		swal.fire({
			title : "Apakah Anda Yakin",
			text  : "Data " + target +" akan dihapus",
			icon  : "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			closeOnCancel: false
		}).then((result)=>{
            if(result.isConfirmed){
                document.location.href = href;
            }
            else{
                swal.fire({
                    title : 'Data ' + target,
                    text  : 'Gagal dihapus',
                    icon  : 'error'
                });
            }
        })
});
// END SWEET ALERT



// BUTTON EDIT DAN TAMBAH WIDYAISWARA
$('.wi-btn-tambah').on('click', function(e){
    $('.modal-title').text('Tambah Data Widyaiswara');
	$('#home-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/add');
	});
	
	$('#profile-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/add');
	});

	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/add');
    $('#wi-nip').removeAttr('readonly');
	$('.wi-status-user').css('display','none');
	$('.wi-password').css('display', 'block');
	$('#form_validation')[0].reset();
});

$('.wi-btn-edit').on('click', function(e){
	$('#home-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/edit_pribadi');
	});
	
	$('#profile-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/edit_akun');
	});

    $('.modal-title').text('Edit Data Widyaiswara');
	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/edit_pribadi');
    $('#wi-nip').attr('readonly', 'true');
	const nip  = $(this).data('nip_wi');
	const nama = $(this).data('nama_wi');
	const jabatan = $(this).data('jabatan_wi');
	const no_telp = $(this).data('no_telp_wi');
	const email = $(this).data('email_wi');
	const status_user = $(this).data('status_user_wi');
	$('#wi-nip').val(nip);
	$('#wi-nama').val(nama);
	$('#wi-jabatan').val(jabatan);
	$('#wi-no_telp').val(no_telp);
	$('#wi-email').val(email);
	$('[name="wi-status-user"]').val(status_user).trigger('change');
	$('.wi-status-user').css('display','block');
	$('.wi-password').css('display', 'none');
});
// END BUTTON EDIT


// BUTTON EDIT DAN TAMBAH PENDAMPING
$('.pendamping-btn-tambah').on('click', function(e){
    $('.modal-title').text('Tambah Data Pendamping');
	$('#home-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/add');
	});
	
	$('#profile-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/add');
	});

	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/add');
    $('#pendamping-nip').removeAttr('readonly');
	$('.pendamping-status-user').css('display','none');
	$('.pendamping-password').css('display', 'block');
	$('#form_validation')[0].reset();
});

$('.pendamping-btn-edit').on('click', function(e){
	$('#home-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/edit_pribadi');
	});
	
	$('#profile-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/edit_akun');
	});

    $('.modal-title').text('Edit Data Pendamping');
	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/edit_pribadi');
    $('#pendamping-nip').attr('readonly', 'true');
	const nip  = $(this).data('nip_pendamping');
	const nama = $(this).data('nama_pendamping');
	const jabatan = $(this).data('jabatan_pendamping');
	const status_user = $(this).data('status_user_pendamping');
	$('#pendamping-nip').val(nip);
	$('#pendamping-nama').val(nama);
	$('#pendamping-jabatan').val(jabatan);
	
	$('[name="pendamping-status-user"]').val(status_user).trigger('change');
	$('.pendamping-status-user').css('display','block');
	$('.pendamping-password').css('display', 'none');
});
// END BUTTON EDIT DAN TAMBAH PENDAMPING


// BUTTON EDIT DAN TAMBAH PENDAMPING
$('.pendamping-btn-tambah').on('click', function(e){
    $('.modal-title').text('Tambah Data Pendamping');
	$('#home-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/add');
	});
	
	$('#profile-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/add');
	});

	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/add');
    $('#pendamping-nip').removeAttr('readonly');
	$('.pendamping-status-user').css('display','none');
	$('.pendamping-password').css('display', 'block');
	$('#form_validation')[0].reset();
});

$('.pendamping-btn-edit').on('click', function(e){
	$('#home-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/edit_pribadi');
	});
	
	$('#profile-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/edit_akun');
	});

    $('.modal-title').text('Edit Data Pendamping');
	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/pendamping/edit_pribadi');
    $('#pendamping-nip').attr('readonly', 'true');
	const nip  = $(this).data('nip_pendamping');
	const nama = $(this).data('nama_pendamping');
	const jabatan = $(this).data('jabatan_pendamping');
	const status_user = $(this).data('status_user_pendamping');
	$('#pendamping-nip').val(nip);
	$('#pendamping-nama').val(nama);
	$('#pendamping-jabatan').val(jabatan);
	
	$('[name="pendamping-status-user"]').val(status_user).trigger('change');
	$('.pendamping-status-user').css('display','block');
	$('.pendamping-password').css('display', 'none');
});
// END BUTTON EDIT DAN TAMBAH PENDAMPING



// TAMBAH PEMBAGIAN PESERTA KELOMPOK
$('.kelompok-peserta-btnSubmit').css('display', 'none');
$("#kelompok-peserta-btnFilter").on('click', function(){
	var instansi = $('#kelompok-peserta-instansi').val();
	var golongan = $('#kelompok-peserta-gol').val();

	if(instansi == "-" && golongan == "-"){
		alert("Pilih data");
	}
	else{
		$.ajax({
			type    : 'POST',
			url     : 'http://localhost/website/github/aplikasi-si-pena-pintar/bagi_kelompok/selectPeserta',
			data    : {instansi : instansi, golongan : golongan},
			success : function(response){
			  $(".data-all_peserta-kelompok").html(response);
			}
		});
	}
	$('.kelompok-peserta-btnSubmit').css('display', 'block');
});


// JADWAL PELATIHAN
$('#jadwal-tahun').on('change', function(){
	var id_pelatihan = $('#jadwal-pelatihan').val();
	var tahun        = $(this).val();

	if(id_pelatihan == "" || id_pelatihan == "-"){
		alert('Pelatihan masih kosong');
		return false;
	}
	else if(tahun == "" || tahun == "-"){
		alert('Tahun masih kosong');
		return false;
	}
	else{
		$.ajax({
			type    : 'POST',
			url     : 'http://localhost/website/github/aplikasi-si-pena-pintar/jadwal/selectBatch',
			data    : {id_pelatihan : id_pelatihan, tahun : tahun},
			success : function(response){
			  $("#jadwal-batch").html(response);
			}
		});
	}

});


$('#jadwal-agenda-materi').on('change', function(){
	var id_agenda = $('#jadwal-agenda-materi').val();

	if(id_agenda == "" || id_agenda == "-"){
		alert('Pilih Agenda terlebih dahulu');
		return false;
	}
	
	else{
		$.ajax({
			type    : 'POST',
			url     : 'http://localhost/website/github/aplikasi-si-pena-pintar/jadwal/selectMateri',
			data    : {id_agenda : id_agenda},
			success : function(response){
			  $("#jadwal-materi").html(response);
			}
		});
	}

});


$('#btn-filter-tgl').on('click', function(){
	var id_tanggal = $('#id_tanggal').val();
	var materi 	   = $('#id_mapel').val();
	var mulai 	   = $('#jadwal-pengajar-waktu-mulai').val();
	var selesai    = $('#jadwal-pengajar-waktu-selesai').val();

	$.ajax({
		type    : 'POST',
		url     : 'http://localhost/website/github/aplikasi-si-pena-pintar/jadwal/selectPembimbing',
		data    : {id_tanggal : id_tanggal, materi:materi, mulai : mulai, selesai : selesai},
		success : function(response){
		  $("#jadwal-pengajar-pembimbing").html(response);
		}
	});

	$.ajax({
		type    : 'POST',
		url     : 'http://localhost/website/github/aplikasi-si-pena-pintar/jadwal/selectPendamping',
		data    : {id_tanggal : id_tanggal, mulai : mulai, selesai : selesai},
		success : function(response){
		  $("#jadwal-pengajar-pendamping").html(response);
		}
	});
});
// END JADWAL PELATIHAN




