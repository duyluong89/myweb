block = {
	init: function(){
		block.add();
		block.remove();
	},
	show: function(){
		alert("show");
	},
	changeStatus: function(blockId,status){
		$.ajax({
			type: "POST",
			url: "/admin/block/changeStatus",
			data: { blockId: blockId, status: status }
		}).done(function(msg) {
			if(msg=="success"){
				$('.top-left').notify({
					    message: { text: 'Changed successfuly status of block!' }
					  }).show()
				$(this).delay(500000);
				location.reload();
			}else{
				alert(msg);
			}
		});
	},
	add: function(){
		$("#save").click(function(){
			$("form#addBlock").submit();
		});
	},
	remove: function(){
		var blockId ;
		$(".remove").click(function(){
			 blockId = $(this).data('id');
		});
		$(".btn.btn-danger").click(function(){
			$.ajax({
			type: "POST",
			url: "/admin/block/delete",
			data: { blockId: blockId}
			}).done(function(msg) {
				if(msg=="success"){
					$('tr#' + blockId + 'row').remove();
					 $('.top-left').notify({
					    message: { text: 'Deleted successfuly a block!' }
					  }).show();
				}else{
					$('.top-left').notify({
					    message: { text: 'Deleted error!, please check again.' }
					  }).show();
				}
			});
		});
	}
}
$(document).ready(function(){
	block.init();
});