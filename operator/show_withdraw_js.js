var gentable = null;
$(document).ready(function(){
	var id_wdw = $('#query_str').val();
	
	gentable=$('#tbl_deposit').DataTable({
		processing:true,
		responsive:true,
		ajax:'read_withdraw.php?id='+id_wdw+'',
		columns:[
		{data:'username'},
		{data:'amount_withdraw'},
		{data:'date_time_req_wdw'},
		{data:'eth_addr'},
		
		{"className": "action text-center",
		"data": null,
		"bSortable": false,
		"defaultContent": "" +
		"<button class='confirm btn btn-success btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='left' title='Confirm'><i class='fa fa-check'></i></button>"
         +"<div class='btn-group' role='group'>" +
          "<button class='edit  btn btn-primary btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit'></i></button>" +
          " <button class='delete btn btn-danger btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button>" +
          "</div>"
		}
		]
	});
	var sbody = $('#tbl_deposit tbody');
	sbody.on('click','.confirm',function(){
		var dataget = gentable.row($(this).parents('tr')).data();
		id_wdw =dataget.id_withdraw;
		$('#modal_confirm_withdraw').modal('show');
	}).
	on('click','.delete',function(){
		var data = gentable.row($(this).parents('tr')).data();
		$.ajax({
				url:'delete_wdw.php',
				type:'POST',
				dataType:'json',
				data:{'id_wdw':data.id_withdraw},
				beforeSend:function(){
					$(this).attr('disabled',true);
				},
				success:function(data){
					if(data>0)
					{
						gentable.ajax.reload();
					}
				},
				complete:function()
				{
					$(this).removeAttr('disabled');
				}
			});
	}).
	on('click','.edit',function(){
		$('#idwdw').val(0);
		var data = gentable.row($(this).parents('tr')).data();
		$('#idwdw').val(data.id_withdraw);
		$('#eth_address').val(data.eth_addr);
		$('#amount_spend').val(data.amount_withdraw).attr('max',data.amount_withdraw);
		$('#parent-form').show('slow');
		
	});
	$('#btn-submit-withdraw').click(function(){
			//e.preventDefault();
			$.ajax({
				type:'POST',
				url:'save_confirm_withdraw.php',
				data:{'id_wdw':id_wdw},
				beforeSend:function()
				{
					$(this).attr('disabled',true);
				},
				success:function(data){
					if(data>0)
					{
						gentable.ajax.reload();
					}
				},
				error:function(xhr,textStatus,errMsg)
				{
					console.log(errMsg + " "+ " "+xhr.status+textStatus);
				},
				complete:function()
				{
					$('#modal_confirm_withdraw').modal('hide');
					$(this).removeAttr('disabled');
				}
				
			});
			
		});
	$('body').tooltip({
			selector: '[rel=tooltip]'
		});
	$('#frm_depo').submit(function(e){
		e.preventDefault();
		var data =$(this).serialize();
		var url =$(this).attr('action');
		$('#parent-form').hide('slow');
		$.ajax({
				url:url,
				type:'POST',
				dataType:'json',
				data:data,
				success:function(data){
					if(data>0)
					{
						gentable.ajax.reload();
						
					}else{
						console.log('gagal');
					}
				},
				complete:function()
				{
					$(this).trigger('reset');
				}
			});
	});
});