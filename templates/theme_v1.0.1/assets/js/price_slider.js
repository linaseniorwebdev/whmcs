var ram_arr = new Array('2 Core','4 Core','4 Core','4 Core','16 Core');
var slots_arr = new Array('16 GB','16 GB','24 GB','32 GB','8 GB');
var bandwidth_arr  = new Array('100GB','150GB','200GB','250GB');
var support_arr = new Array('Mod Pack Support','Mod Pack Support','Mod Pack Support','Mod Pack Support','Mod Pack Support');
var protection_arr = 	new Array('100GB','150GB','200GB','250GB','Unlimited');
var price_arr = 	new Array('$19.19','$53.43','$85.54','$99.65','$139.75');
var link_arr = 		new Array('10','25','50','75','100');
var b_url = 'https://www.your-domain.com/?cmd=cart&action=add&id=';

// This is what you want the default position to be
var def_pos = 1;

$(document).ready(function(){

	$( "#slider" ).slider({
        
         orientation: "horizontal",
		range: 'min',
		animate: true,
		min: 1,
		max: 4,
		paddingMin: 100,
		paddingMax: 220,
		//step: 0.1,
		slide: function( event, ui ) {
			$('.slider-container #ram_val span.value').html(ram_arr[ui.value-1]);
			$('.slider-container #slots_val span.value').html(slots_arr[ui.value-1]);
			$('.slider-container #bandwidth_val span.value').html(bandwidth_arr[ui.value-1]);
			$('.slider-container #support_val span.value').html(support_arr[ui.value-1]);
			$('.slider-container #protection_val span.value').html(protection_arr[ui.value-1]);
			$('.slider-container #price_val').html(price_arr[ui.value-1]);
			$('.slider-container a.buynow-button').attr('href', b_url + link_arr[ui.value-1]);
			$(".slider-container div.price_rangetxt div").removeClass("current");
			for(var i=0;i<ui.value;i++)
				$(".slider-container div.price_rangetxt div#icon-"+i).addClass("current");
		},
		change: function( event, ui ) {
			$('.slider-container #ram_val span.value').html(ram_arr[ui.value-1]);
			$('.slider-container #slots_val span.value').html(slots_arr[ui.value-1]);
			$('.slider-container #bandwidth_val span.value').html(bandwidth_arr[ui.value-1]);
			$('.slider-container #support_val span.value').html(support_arr[ui.value-1]);
			$('.slider-container #protection_val span.value').html(protection_arr[ui.value-1]);
			$('.slider-container #price_val').html(price_arr[ui.value-1]);
			$('.slider-container a.buynow-button').attr('href', b_url + link_arr[ui.value-1]);
			for(var i=0;i<ui.value;i++)
				$(".slider-container div.price_rangetxt div#icon-"+i).addClass("current");
		}
	});
	$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) );
	$('#slider').slider('value', def_pos);
	$('.icon').click(function() {
		ch_value= parseInt(this.id.slice(5)) + 1;
		$(".slider-container div.price_rangetxt div").removeClass("current");
		$('#slider').slider('value', ch_value);
	});
});