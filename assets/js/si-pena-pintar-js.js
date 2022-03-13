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
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/edit');
	});
	
	$('#profile-tab').on('click', function(e){
		$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/edit-akun');
	});

    $('.modal-title').text('Edit Data Widyaiswara');
	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/edit');
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


