
//variables
var myType = "btn-warning";
var myIcon = "icon-remove-circle";
var months = [ "january", "february", "march", "april", "may", "june",
    "july", "august", "september", "october", "november", "december" ];
var year = new Date().getFullYear();
var paidData = '';
var allPaid = 0;
var noPaid = 0;
var noUnpaidHtml = '<li id="allPaid"><div class="news-item-detail"><a href="javascript:;" class="news-item-title">You currently have no invoices due.</a><p class="news-item-preview">Thank you for using our service.</p></div><div class="news-item-date"><span class="news-item-day"></span><span class="news-item-month"></span></div></li>';
var noPaidHtml = '<li id="noPaid"><div class="news-item-detail"><a href="javascript:;" class="news-item-title">You currently have no paid invoices.</a><p class="news-item-preview">Thank you for using our service.</p></div><div class="news-item-date"><span class="news-item-day"></span><span class="news-item-month"></span></div></li>';

//functions
function getDueMonth(month, year) {
var monthDue = month + 1;
if(monthDue == 12) { year == year++; monthDue = 0;  }
return months[monthDue]+' '+year;
}

function loadInvoices() {
$.getJSON('/invoices/json/', function(data) {
	var html = '';
	var type = '';
	//alert(JSON.stringify(paidData));
	var d = new Date();
	//alert(data.length);
	for(i=0; i<data.length; i++) { var year = data[i].year;
		for(m=0; m<months.length; m++) {
			if (data[i][months[m]] == 'btn-primary') { var type = 'Permanent'; var cost = 150; }
			else if (data[i][months[m]] == 'btn-success') { var type = 'Hot-Desk'; var cost = 100; }
			else if (data[i][months[m]] == 'btn-inverse') { var type = 'Off Peak'; var cost = 75; }
			if (data[i][months[m]] !== 'btn-warning') {	
			var isPaid = '';		
					for(p=0; p<paidData.length; p++) {
					
					var paidYear = paidData[p].year;
					var paidMonth = paidData[p].month;
					if((year == paidYear) && (months[m] == paidMonth) ) { isPaid = 'true'; } }
					if(isPaid == 'true') {
							noPaid++;
						var html = html + '<li class="paidIn"><div class="news-item-detail"><button href="" title="'+data[i][months[m]]+'/'+year+'/'+months[m]+'" class="btn btn-large allPaid"><i class="icon-save"></i> Download</button><a href="javascript:;" class="news-item-title">' + type + ': $'+cost+'</a><p class="news-item-preview">Due: 1st '+getDueMonth(m, year)+'</p></div><div class="news-item-date"><span class="news-item-day">'+year+'</span><span class="news-item-month">'+months[m]+'</span></div></li>'; 
				
					} else {
					allPaid++;
					var html = html + '<li class="unpaidIn"><div class="news-item-detail"><button href="" title="'+data[i][months[m]]+'/'+year+'/'+months[m]+'" class="btn btn-large paid"><i class="icon-ok"></i> Mark as paid</button><a href="javascript:;" class="news-item-title">' + type + ': $'+cost+'</a><p class="news-item-preview">Due: 1st '+getDueMonth(m, year)+'</p></div><div class="news-item-date"><span class="news-item-day">'+year+'</span><span class="news-item-month">'+months[m]+'</span></div></li>'; 
					}
			}
		}
	}

	$('.payment-items').html(html).hide().fadeIn("slow");
	$('.payment-items').append(noUnpaidHtml);
		$('.paidIn').hide();	
		$('#allPaid').hide();	
		$('#noPaid').hide();	
		if(allPaid == 0){ $('#allPaid').fadeIn('slow'); } else { $('#allPaid').fadeOut('slow'); } 
})
.success(function() { })
.error(function() { alert('error') })
.complete(function() { });
}
	
//DOM
jQuery(document).ready(function($) {
		//generate whole invoice page
		$.getJSON('/invoices/getpaid/', function(pdata) { paidData = pdata; loadInvoices(); })
		.success(function() { })
		.error(function() { 
		$.getJSON('/invoices/json/', function(data) {
			var html = ''; var type = ''; var d = new Date();
			//denerate html data
			for(i=0; i<data.length; i++) { var year = data[i].year;
				for(m=0; m<months.length; m++) {
					if (data[i][months[m]] == 'btn-primary') { var type = 'Permanent'; var cost = 150; }
					else if (data[i][months[m]] == 'btn-success') { var type = 'Hot-Desk'; var cost = 100; }
					else if (data[i][months[m]] == 'btn-inverse') { var type = 'Off Peak'; var cost = 75; }
					if (data[i][months[m]] !== 'btn-warning') { allPaid++;
					var html = html + '<li class="unpaidIn"><div class="news-item-detail"><button href="" title="'+data[i][months[m]]+'/'+year+'/'+months[m]+'" class="btn btn-large paid"><i class="icon-ok"></i> Mark as paid</button><a href="javascript:;" class="news-item-title">' + type + ': $'+cost+'</a><p class="news-item-preview">Due: 1st '+getDueMonth(m, year)+'</p></div><div class="news-item-date"><span class="news-item-day">'+year+'</span><span class="news-item-month">'+months[m]+'</span></div></li>'; 
					}
				}
			}
			$('.payment-items').html(html).hide().fadeIn("slow");
			$('.payment-items').append(noUnpaidHtml);
			$('.paidIn').hide(); $('#allPaid').hide(); $('#noPaid').hide();	
			if(allPaid == 0){ $('#allPaid').fadeIn('slow'); } else { $('#allPaid').fadeOut('slow'); } 	
			}); })
		.complete(function() { });
		
		
	//btn that makes unpaid invoices paid both back/front end
	$('.paid').live("click", function(){ 
		  var extend = $(this).attr('title');
		  var str = '/invoices/sendpaid/' + extend;
		$.ajax({
		  url: str,
		  context: this,
		  error: function() { alert('error'); },
		  success: function() { $(this).html('<i class="icon-refresh"></i> Loading...'); },
		  complete: function() { 
		  $(this).html('<i class="icon-save"></i> Download');
		  $(this).parents('li').removeClass().addClass('paidIn');
		  $(this).parents('li').fadeOut('slow	');
		  allPaid--;
		  noPaid++;
		  //alert(allPaid);
		  if(allPaid <= 0){ $('#allPaid').fadeIn('slow'); }	
		} //ajax
		}); //click on a month button
	});
	
	//sidebar menu displaying paid invoices
	$('#invoicesPaid').live("click", function(){
	$('.payment-items').append(noPaidHtml);
	$('#allPaid').remove();
	$('#invoiceHeading').html('Invoices Paid');
	if(noPaid == 0){  $('#noPaid').fadeIn('slow'); } else { $('#noPaid').fadeOut('slow'); }
	$('#invoiceMenu li').removeClass(); $(this).addClass('active'); 
	$('.paidIn').fadeIn('slow'); $('.unpaidIn').fadeOut('slow'); 
	  });	
	
	//sidebar menu displaying unpaid invoices
	$('#invoicesDue').live("click", function unpaidClick(){
	$('.payment-items').append(noUnpaidHtml);
	$('#noPaid').remove();
	$('#invoiceHeading').html('Invoices Due');
	if(allPaid == 0){  $('#allPaid').show(); } else { $('#allPaid').fadeOut('slow'); }
	$('#invoiceMenu li').removeClass(); $(this).addClass('active'); 
	$('.unpaidIn').fadeIn('slow'); $('.paidIn').fadeOut('slow'); 
	 });
	
	//prep first load
	$('.payment-items').append(noUnpaidHtml);
	$('.payment-items').show();
	$('#allPaid').show(); 
	
}); // load on DOM

	
