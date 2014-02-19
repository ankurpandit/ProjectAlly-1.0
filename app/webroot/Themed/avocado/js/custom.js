$(document).ready(function() {
	$('.feedDetail').hide();
	$('.feedDetail:lt(5)').show();  
}); 

$('#view_more_feeds').click(function(){
	var data_resultcount = parseInt($(this).attr('data-resultcount'),10);
	var result_count = (data_resultcount + 5);
	$('.feedDetail:lt('+data_resultcount+')').show();
	$('#view_more_feeds').attr('data-resultcount',result_count);
	if($('.feedDetail').last().css('display')=='block')
	{
		$('#view_more_feeds').css('display','none');
	}       
		     
}); 