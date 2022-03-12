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



// BUTTON EDIT
$('.btn-edit').on('click', function(e){
    $('.modal-title').text('Edit Data Widyaiswara');
	$('#form_validation').attr('action', 'http://localhost/website/github/aplikasi-si-pena-pintar/widyaiswara/edit');
    $('#wi-nip').attr('readonly', 'true');
});
// END BUTTON EDIT


