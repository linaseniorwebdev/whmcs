$( document ).ready(function() {
	checkContainer();

    $( "select[name='billingcycle']" ).change(function() {
	 	var that = this;
	 	dataPrice = $( that ).find(':selected').attr('data-price-today');
	 	var month = 1;
                if ($(that).val() == 'quarterly') 
                {
	 		month = 3;
	 	}
	 	else if ($(that).val() == 'semiannually') 
                {
	 		month = 6;
	 	}
                else if ( $(that).val() == 'annually' ) {
			month = 12;
	 	} else if ( $(that).val() == 'biennially' ) {
	 		month = 24;
	 	}
                else if ($(that).val() == 'triennially') 
                {
	 		month = 36;
	 	}
		$('.renew-date').html('<p> El plan es renovado '+moment().add(month, 'month').format('MMMM Do, YYYY')+' @ $' + dataPrice +'</p>');
	});

    $( "#products-dropdown" ).change(function() {
	 	setTimeout(function(){ 
	 		checkContainer();
	 	}, 1000);
	});

});

function checkContainer () {
  if( $('#billingcycle').is(':visible') ){ //if the container is visible on the page
    var dataPrice = $( "select[name='billingcycle']" ).find(':selected').attr('data-price-today');
    var dataBilling = $( "select[name='billingcycle']" ).find(':selected').val();
    var month = 1;
    
        if (dataBilling == 'quarterly') 
        {
                month = 3;
        }
 	else if (dataBilling == 'semiannually') 
        {
 		month = 6;
 	}
        else if ( dataBilling == 'annually' ) 
        {
		month = 12;
 	}
        else if ( dataBilling == 'biennially' ) 
        {
 		month = 24;
 	}
        else if (dataBilling == 'triennially') 
        {
                month = 36;
        }
        
	$('.renew-date').html('<p> El plan es renovado '+moment().add(month, 'month').format('MMMM Do, YYYY')+' @ $' + dataPrice +'</p>');	
  } else {
    setTimeout(checkContainer, 50); //wait 50 ms, then try again
  }
}