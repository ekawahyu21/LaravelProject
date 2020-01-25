$('.delete').click(function(){
	var id = $(this).attr('id');
	swal({
	  title: "Yakin",
	  text: "Yakin Ingin Menghapus Data ini?",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	  	if ($(this).hasClass('kamar')) {
	  		window.location = "kamar/hapus/"+id+"";	  	
	  	} else if ($(this).hasClass('tamu')) {
	  		window.location = "tamu/hapus/"+id+"";	  	
	  	} else if ($(this).hasClass('trans')) {
	  		window.location = "transaksi/hapus/"+id+"";	  	
	  	}
	  } else {
	    swal("Data batal dihapus!");
	  }
	});
});