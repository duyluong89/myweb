block = {
	init: function(){
		
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
				location.reload();
			}else{
				alert(msg);
			}
		});
	}
}
$(document).ready(function(){
	block.init();
});