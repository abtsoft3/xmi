var refreshNotif = function()
{
	var strhtml='';
	var ballhtml='';
	$.ajax({
			url:'getNotificationDepositMember.php',
			type:'GET',
			dataType:'json',
			success:function(getdata)
			{
				$('#icon-ball').remove();
				if(getdata.length > 0)
				{
					ballhtml+='<span id="icon-ball" class="indicator text-warning d-none d-lg-block"> \
								<i class="fa fa-fw fa-circle"></i> \
								</span>';
					$.each(getdata,function(i,item){
						strhtml+='<h6  class="dropdown-header">New Alerts:</h6>';
						strhtml+='<div class="dropdown-divider"></div>';
						strhtml+='<a class="dropdown-item" href="show_deposits.php?id='+
									getdata[i].id_transaction_deposit+'">';
						strhtml+='<span class="text-success">';
						strhtml+='<strong><i class="fa fa-long-arrow-up fa-fw"></i>'+
									getdata[i].amount_spend+' ETH</strong>';
						strhtml+='</span>';
						strhtml+='<span class="small float-right text-muted">'+
									getdata[i].date_time_spend+'</span>';
						strhtml+='<div class="dropdown-message small">'+
									getdata[i].username+' Your deposit is successfully invested!</div>';
						strhtml+='</a>';
					});
					$('#ball-notif-deposit').after(ballhtml);
					
				}
				else
				{
					strhtml+='<h6 class="dropdown-header">Empty</h6>';
					$('#icon-ball').remove();
				}
				$('#notif-deposit').html(strhtml);
			},
			error:function(xhr,textStatus,errormessage)
			{
				console.log(errormessage + " "+ " "+xhr.status+textStatus);
			}
		});
}

var withdrawNotif = function()
{
	var strhtml='';
	var ballhtml='';
	$.ajax({
			url:'getNotificationWithDrawMember.php',
			type:'GET',
			dataType:'json',
			success:function(getdata)
			{
				$('#icon-ball-withdraw').remove();
				if(getdata.length > 0)
				{
					console.log('masuk');
					ballhtml+='<span id="icon-ball-withdraw" class="indicator text-primary d-none d-lg-block"> \
					<i class="fa fa-fw fa-circle"></i></span>';
					$.each(getdata,function(i,item){
						strhtml+='<h6 class="dropdown-header">New Messages:</h6>';
						strhtml+='<div class="dropdown-divider"></div>';
						strhtml+='<a class="dropdown-item" href="show_withdraw.php?id='+getdata[i].id_withdraw+'">';
						strhtml+='<strong>'+getdata[i].amount_withdraw+'</strong>';
						strhtml+='<span class="small float-right text-muted">'
								+getdata[i].date_time_req_wdw+'</span>';
						strhtml+='<div class="dropdown-message small">Your withdraw is successfuly sent to your address</div>';
						strhtml+='</a>';
						
					});
					$('#ball-notif-withdraw').after(ballhtml);
					
				}
				else
				{
					strhtml+='<h6 class="dropdown-header">Empty</h6>';
					
				}
				$('#notif-withdraw').html(strhtml);
			},
			error:function(xhr,textStatus,errMsg)
			{
				console.log(errMsg.message + " "+ " "+xhr.status+textStatus);
			}
		});
}
$(document).ready(function(){
	refreshNotif();
	withdrawNotif();
	setInterval(function(){
		
 		refreshNotif();
	}, 5000);
	setInterval(function(){
		
 		withdrawNotif();
	}, 5000);
	
});