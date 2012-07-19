var myType = "btn-warning";
var myIcon = "icon-remove-circle";
var months = [ "january", "february", "march", "april", "may", "june",
    "july", "august", "september", "october", "november", "december" ];
var year = new Date().getFullYear();

function setType(type,icon) {
myType = type;
myIcon = icon;
}

function loadYear() {
$('#months').fadeOut("slow");
$('#monthHeading').html('Now select month ('+ year +')');
var calUrl = '/dashboard/check/' + year;
$.getJSON(calUrl, function(data) {
	var html = '';
	for(i=0; i<months.length; i++) {
	if (data[months[i]] == 'btn-primary') { var icon = 'icon-heart-empty'; };
	if (data[months[i]] == 'btn-success') { var icon = 'icon-fire'; };
	if (data[months[i]] == 'btn-inverse') { var icon = 'icon-time'; };
	if (data[months[i]] == 'btn-warning') { var icon = 'icon-remove-circle'; };
	var d = new Date();
	if ((i <= d.getMonth()) && (year <= d.getFullYear()) || (year < d.getFullYear()) ) { var html = html + '<a id="'+months[i]+'" title="'+year+'" class="deadBtn"><i class="shortcut-icon '+icon+'"/><span class="shortcut-label">'+months[i]+'</span></a>'; } 
	else { var html = html + '<a id="'+months[i]+'" title="'+year+'" class="shortcut '+data[months[i]]+' btn"><i class="shortcut-icon '+icon+'"/><span class="shortcut-label">'+months[i]+'</span></a>'; }
	} 
	$('#months').html(html).hide().fadeIn("slow");
})
.success(function() {})
.error(function(data) { //create blank calendar
	var html = '';
	for(i=0; i<months.length; i++) {
	if (data[months[i]] == 'btn-primary') { var icon = 'icon-heart-empty'; };
	if (data[months[i]] == 'btn-success') { var icon = 'icon-fire'; };
	if (data[months[i]] == 'btn-inverse') { var icon = 'icon-time'; };
	if (data[months[i]] == 'btn-warning') { var icon = 'icon-remove-circle'; };
	var d = new Date();
	if ((i <= d.getMonth()) && (year <= d.getFullYear()) || (year < d.getFullYear()) ) { var html = html + '<a id="'+months[i]+'" title="'+year+'" class="deadBtn "><i class="shortcut-icon icon-remove-circle"/><span class="shortcut-label">'+months[i]+'</span></a>'; } 
	else {
	var html = html + '<a id="'+months[i]+'" title="'+year+'" class="shortcut btn-warning btn"><i class="shortcut-icon icon-remove-circle"/><span class="shortcut-label">'+months[i]+'</span></a>'; }
	}
	$('#months').html(html).hide().fadeIn("slow");
 })
.complete(function() { });
}

jQuery(document).ready(function($) {
loadYear();

// move cal forward a year
$('#rightMonthBtn').live("click", function(){ 
	year++;
	loadYear();	
}); // move cal forward a year

$('#leftMonthBtn').live("click", function(){ 
	year--;
	loadYear();
}); // move cal forward a year

//get this year data and load months
$('.months .shortcut').live("click", function(){ 
 // var year = $(this).attr("title");
  var type = window.myType;
  var month = $('.shortcut-label', this).html().toLowerCase();
  var str = '/dashboard/update/' + type + '/' + year + '/' + month;
 
$.ajax({
  url: str,
  context: this,
  error: function() { alert('error'); },
  success: function() {
        	$(this).removeClass().addClass('shortcut');
        	$('.shortcut-icon', this).removeClass().addClass('shortcut-icon').addClass('icon-refresh');
  },
  complete: function() { 
		  $(this).removeClass().addClass('shortcut btn').addClass(window.myType);
		  $('.shortcut-icon', this).removeClass().addClass('shortcut-icon').addClass(window.myIcon);
  }
}); //ajax
}); //click on a month button
}); // load on DOM


