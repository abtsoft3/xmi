var gentable = null;
var id_transaction_deposit;
var upline;
var amount_spend;
$(document).ready(function(){
	var id = $('#query_str').val();
	
	gentable=$('#tbl_deposit').DataTable({
		processing:true,
		responsive:true,
		ajax:'read_deposit.php?id='+id+'',
		columns:[
		{data:'username'},
		{data:'tx_id'},
		{data:'eth_address'},
		{data:'amount_spend'},
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
	sbody.on('click','.confirm',function()
	{
		var data = gentable.row($(this).parents('tr')).data();
		 id_transaction_deposit =data.id_transaction_deposit;
		 upline =data.upline;
		 amount_spend = data.amount_spend;
		$('#modal_confirm').modal('show');
	}).
	on('click','.delete',function(){
		var data = gentable.row($(this).parents('tr')).data();
		$.ajax({
				url:'delete_deposits.php',
				type:'POST',
				dataType:'json',
				data:{'id_deposit':data.id_transaction_deposit},
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
		$('#idtransactiondeposit').val(0);
		var data = gentable.row($(this).parents('tr')).data();
		$('#idtransactiondeposit').val(data.id_transaction_deposit);
		$('#eth_address').val(data.eth_address);
		$('#amount_spend').val(data.amount_spend).attr('max',data.amount_spend);
		$('#txid').val(data.tx_id);
		$('#parent-form').show('slow');
		
	});
	$('#btn-submit').click(function(){
			$.ajax({
				url:'save_confirm_transaction.php',
				type:'POST',
				dataType:'json',
				data:{upline:upline,id_transaction_deposit:id_transaction_deposit,
				amount_spend:amount_spend},
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
					$('#modal_confirm').modal('hide');
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
						
					}
				},
				complete:function()
				{
					$(this).trigger('reset');
				}
			});
	});
});