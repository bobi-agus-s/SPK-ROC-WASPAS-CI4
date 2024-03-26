// hapus semua 
$(document).on('click', '.btn-hapus-semua', function(event) {
	event.preventDefault()
	const link = $(this).attr('href')

	Swal.fire({
	  title: 'Apa anda yakin?',
	  // text: "Data yang telah dihapus tidak bisa dikembalikan",
	  icon: 'warning',
	  showCancelButton: true,
	  cancelButtonText: 'batal',
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'hapus'
	}).then((result) => {
	  if (result.isConfirmed) {
	    document.location.href = link
	  }
	})
});

// hapus  
$(document).on('click', '.btn-hapus', function(event) {
	event.preventDefault()
	const link = $(this).attr('href')

	Swal.fire({
	  title: 'Apa anda yakin?',
	  icon: 'warning',
	  showCancelButton: true,
	  cancelButtonText: 'batal',
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'hapus'
	}).then((result) => {
	  if (result.isConfirmed) {
	    document.location.href = link
	  }
	})
});

//  ================= agama =================

// Agama
$(document).on('click', '.btn-edit', function(event) {
	var link = $(this).attr('href')
	var id = $(this).attr('data-id')
	var updateLink = $('#form_edit_agama').attr('action') + id

	$.ajax({
	  url: link,
	  type: 'get',
	  dataType: 'json',
	  success: function(res) {
	  		$('.card_tambah_agama').addClass('d-none')
	  		$('.btn_tambah_agama').removeClass('d-none')
	  		$('.card_edit_agama').removeClass('d-none')

	  		$('#input_edit_agama').val(res.data.nama_agama)

	  		$('#btn_edit_agama').removeClass('d-none')
	  		$('#form_edit_agama').attr('action', updateLink)
	  },
	  error: function(data) {

	  }
	});
});

// tambah agama
$(document).on('click', '.btn_tambah_agama', function(event) {
	$('.card_tambah_agama').removeClass('d-none')
	$('.btn_tambah_agama').addClass('d-none')
	$('.card_edit_agama').addClass('d-none')
});

//  ================= dusun =================

// dusun
$(document).on('click', '.btn-edit', function(event) {
	var link = $(this).attr('href')
	var id = $(this).attr('data-id')
	var updateLink = $('#form_edit_dusun').attr('action') + id

	$.ajax({
	  url: link,
	  type: 'get',
	  dataType: 'json',
	  success: function(res) {
	  		$('.card_tambah_dusun').addClass('d-none')
	  		$('.btn_tambah_dusun').removeClass('d-none')
	  		$('.card_edit_dusun').removeClass('d-none')

	  		$('#input_edit_dusun').val(res.data.nama_dusun)

	  		$('#btn_edit_dusun').removeClass('d-none')
	  		$('#form_edit_dusun').attr('action', updateLink)
	  },
	  error: function(data) {

	  }
	});
});

// tambah dusun
$(document).on('click', '.btn_tambah_dusun', function(event) {
	$('.card_tambah_dusun').removeClass('d-none')
	$('.btn_tambah_dusun').addClass('d-none')
	$('.card_edit_dusun').addClass('d-none')
});

//  ================= periode =================

// periode
$(document).on('click', '.btn-edit', function(event) {
	var link = $(this).attr('href')
	var id = $(this).attr('data-id')
	var updateLink = $('#form_edit_periode').attr('action') + id

	$.ajax({
	  url: link,
	  type: 'get',
	  dataType: 'json',
	  success: function(res) {
	  		$('.card_tambah_periode').addClass('d-none')
	  		$('.btn_tambah_periode').removeClass('d-none')
	  		$('.card_edit_periode').removeClass('d-none')

	  		$('#input_edit_periode').val(res.data.periode)

	  		$('#btn_edit_periode').removeClass('d-none')
	  		$('#form_edit_periode').attr('action', updateLink)
	  },
	  error: function(data) {

	  }
	});
});

// tambah periode
$(document).on('click', '.btn_tambah_periode', function(event) {
	$('.card_tambah_periode').removeClass('d-none')
	$('.btn_tambah_periode').addClass('d-none')
	$('.card_edit_periode').addClass('d-none')
});

//  ==================== penduduk ===================

function getClick(link, id, status_pengajuan) {

	if (status_pengajuan == 0) {
		status_pengajuan = 1
	} else {
		status_pengajuan = 0
	}

	link += "/" + id + "/" + status_pengajuan

	window.location.href = link
}


// ------------- auth ----------------
$(document).on('click', '#show_password', function(event) {

    if($('#input_password').attr('type') == 'password'){
         $('#input_password').prop('type', 'text');
    }else{
         $('#input_password').prop('type', 'password');
    }

});



//  ================= user =================

// user
$(document).on('click', '.btn-edit', function(event) {
	var link = $(this).attr('href')
	var id = $(this).attr('data-id')
	var updateLink = $('#form_edit_user').attr('action') + id

	$.ajax({
	  url: link,
	  type: 'get',
	  dataType: 'json',
	  success: function(res) {
	  		$('.card_tambah_user').addClass('d-none')
	  		$('.btn_tambah_user').removeClass('d-none')
	  		$('.card_edit_user').removeClass('d-none')

	  		$('#input_edit_id_user').val(res.data.id_user)
	  		$('#input_edit_nama_user').val(res.data.nama_user)
	  		$('#input_edit_username').val(res.data.username)
	  		$('#input_edit_password').val(res.data.password)

	  		if (res.data.user_level == 'administrator') {
	  			$('#administrator').attr('selected', '')
	  		} else if (res.data.user_level == 'kasi_kesejahteraan') {
	  			$('#kasi_kesejahteraan').attr('selected', '')
	  		} else {
	  			$('#user').attr('selected', '')
	  		}

	  		$('#btn_edit_user').removeClass('d-none')
	  		$('#form_edit_user').attr('action', updateLink)
	  },
	  error: function(data) {

	  }
	});
});

// tambah user
$(document).on('click', '.btn_tambah_user', function(event) {
	$('.card_tambah_user').removeClass('d-none')
	$('.btn_tambah_user').addClass('d-none')
	$('.card_edit_user').addClass('d-none')
});


// -------------- hak akses ----------------

// $(document).ready(function() {
//     $(".checkMenu").click(function() {
//     		//cek on off checkbox
//     		var akses = $(this).attr('data-akses')
//     		// id menu
//     		var menu = $(this).attr('data-menu')

//     		if (akses == 1) {
//     			$(this).attr('data-akses', '0')
// 			$('.form-switch input.menu-'+menu).attr('disabled', '')
// 			// $(this).attr('value', menu+',0')
//     		} else {
//     			$(this).attr('data-akses', '1')
// 			$('.form-switch input.menu-'+menu).removeAttr('disabled')
// 			// $(this).attr('value', menu+',1')
//     		}

//     });                 
// });