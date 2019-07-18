<footer>
    <div class="container">
        <div class="bot">
            <p><?php echo COPYRIGHT." ".onepagecheckout_getRedirectSetting('company')['data']->value; ?> </p>
        </div>

    </div>
</footer>



<script type="text/javascript">
	$(document).ready(function ()
	{
		$('[data-toggle="popover"]').popover({
			placement: 'top',
			trigger: 'hover'
		});
	});
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<script src="js/checkout.js"></script>
