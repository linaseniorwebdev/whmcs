var $ = jQuery.noConflict();

$(document).ready(function ()
{
    cart_lang = $("#hdnSession").val();

    $(".sticker").sticky({topSpacing: 0});

    $(':radio[name="paymenttype"]').change(function () {
        var ptype = $(this).filter(':checked').val();
        if (ptype == "authorizecim") {
            $("#creditcard-form").show();
            $("#paypal-form").hide();
            $(".card-wrapper").show();
        } else {
            $("#creditcard-form").hide();
            $(".card-wrapper").hide();
            $("#paypal-form").show();
        }
    });
    var total = 0.00;
    $("tr#longreview").each(function () {
        total += parseFloat($(this).attr('data-price'));
    });
    var totalnow = 0;
    var totaltoday = 0;
    $(".order-item-product").each(function () {
        totaltoday += parseFloat($(this).attr('data-price'));
    });
    $("td#longtotal").html('<strong>$' + total.toFixed(2) + '</strong>');
    $("td#longtotalterm").html('<strong>$' + totalnow.toFixed(2) + '</strong>');
    $("td#totalperterm").html('<strong>$' + totalnow.toFixed(2) + '</strong>');
    $("td#totalpricetoday").html('<strong>$' + totaltoday.toFixed(2) + '</strong>');
});



$(document).on('change', "#vatNumber input", function ()
{
    var country = $.trim($('#country').val());
    var vat_id = $('#vatNumber input').val();
    regexes = {'AT': new RegExp('^U[0-9]{8}$', 'i'), 'BE': new RegExp('^[0-9]{10}$', 'i'), 'BG': new RegExp('^[0-9]{9,10}$', 'i'), 'CY': new RegExp('^[0-9]{8}[a-z]$', 'i'), 'CZ': new RegExp('^[0-9]{8,9,10}$', 'i'), 'DK': new RegExp('^[0-9]{8}$', 'i'), 'EE': new RegExp('^[0-9]{9}$', 'i'), 'FI': new RegExp('^[0-9]{8}$', 'i'), 'FR': new RegExp('^([0-9]{11}|[a-z][0-9]{10}|[0-9]{1}[a-z][0-9]{9}|[a-z]{2}[0-9]{9})$', 'i'), 'GB': new RegExp('^[a-z0-9]{4,12}$', 'i'), 'DE': new RegExp('^[0-9]{9}$', 'i'), 'EL': new RegExp('^[0-9]{9}$', 'i'), 'HU': new RegExp('^[0-9]{8}$', 'i'), 'IE': new RegExp('^([0-9]{7}[a-z]|[0-9]{1}[a-z][0-9]{5}[a-z])$', 'i'), 'IT': new RegExp('^[0-9]{11}$', 'i'), 'LV': new RegExp('^[0-9]{11}$', 'i'), 'LT': new RegExp('^[0-9]{9,12}$', 'i'), 'LU': new RegExp('^[0-9]{8}$', 'i'), 'MT': new RegExp('^[0-9]{8}$', 'i'), 'NL': new RegExp('^[0-9]{9}B[0-9]{2}$', 'i'), 'PL': new RegExp('^[0-9]{10}$', 'i'), 'PT': new RegExp('^[0-9]{9}$', 'i'), 'RO': new RegExp('^[0-9]{2,10}$', 'i'), 'SK': new RegExp('^[0-9]{10}$', 'i'), 'SI': new RegExp('^[0-9]{8}$', 'i'), 'ES': new RegExp('^([a-z][0-9]{8}|[0-9]{8}[a-z]|[a-z][0-9]{7}[a-z])$', 'i'), 'SE': new RegExp('^[0-9]{12}$', 'i')};
    regex = regexes[country];
    if (!regex.exec(vat_id)) {
        $("#vatexempt").val("no");
        $("#vatNumber input").css("border", "2px solid red");
        alert("Vat ID: " + vat_id + " is not valid!");
    } else {
        $("#vatNumber input").css("border", "2px solid green");
        $("#vatexempt").val("yes");
    }
});

function opcupdate(addtocart)
{
    var urlparam = (getQueryVariable('a'));
    var ids = $(".product").map(function ()
    {
        return $(this).val();
    }).get().join("&products[]=");

    var addons = $(document).find(".addons").map(function ()
    {
        if ($(this).prop('checked') == true)
        {
            return $(this).val();
        }
    }).get().join("&addons[]=");

    var formData = $("#placeorder").serializeArray();
    dataObj = {};

    var configopts = '';
    $(formData).each(function (i, field) {
        dataObj[field.name] = field.name;
        dataObj[field.value] = field.value;
        if (dataObj[field.name].indexOf('configoptions') > -1) {
            configopts += "&" + dataObj[field.name] + "=" + dataObj[field.value];
        }
    });

    var customfields = $(document).find(".customfield").map(function ()
    {
        return"&customfields[" + $(this).attr('data-field-id') + "]=" + $(this).val();
    }).get().join("");

    var domainexist = false;
    
    if ($("#domainrt").val() != "")
    {
        domainexist = true;
        var domainstring = "?regdomain=" + $("#domain_select").val() + "&tld=" + $("#domain_select option:selected").attr("data-tld") + "&domaincost=" + $("#domain_select option:selected").attr("data-price")+"&period="+$('#domain-regperiod').val();
    }
    /*
     else if ($("#owndomain").val() != "") 
     {
     var domainstring = "?domain=" + $("#owndomain").val() + "&transfertld=" + $("#transferdomaindropdown").val();
     } 
     */
    else if ($("#owndomain1").val() != "")
    {
        domainexist = true;
        var full_domain = $("#owndomain1").val();
       
        var index = full_domain.indexOf(".");  // Gets the first index where a space occours
        var sld = full_domain.substr(0, index); // Gets the first part
        var transtld = full_domain.substr(index + 1);  // Gets the text part
       
        var full_domain_split = full_domain.split(".",1);
        
        if ($("#transfer-checkbox").prop("checked"))
        {
            var domainstring = "?domain=" + sld + "&transfertld=" + "." + transtld;
        } 
        else
        {
            var domainstring = "?owndomain=" + sld + "&transfertld=" + "." + transtld;
        }

    } 
    else
    {
        var domainstring = "?domainfound=no";
    }
    /*-----start Domain Addon----*/
    if (domainexist)
    {
        var domainaddon = '';
        var emailforwarding = "off";
        var idprotection = "off";
        var dnsmanagement = "off";

        if ($("#emailforwarding").prop('checked') == true)
        {
            emailforwarding = "on";
        }
        if ($("#idprotection").prop('checked') == true)
        {
            idprotection = "on";
        }
        if ($("#dnsmanagement").prop('checked') == true)
        {
            dnsmanagement = "on";
        }
        domainaddon = "&emailforwarding=" + emailforwarding + "&dnsmanagement=" + dnsmanagement + "&idprotection=" + idprotection;
    }
    /*----end Domain Addon---*/

    var address = "&address1=" + $("#address1").val() + "&city=" + $("#city").val() + "&state=" + $("#stateselect").val() + "&postalcode=" + $("#postcode").val();
    var email = "&email=" + $("#email").val();
    var removeitem = "&removeitem=" + $("#remove_item_hidden").val();
    var removeitemtype = "&removeitemtype=" + $("#remove_item_type").val();
    var producttoadd = "&producttoadd=" + $("#producttoadd").val();
    var producttoedit = "&producttoedit=" + $("#producttoedit").val();
    var producttoeditValue = $("#producttoedit").val();
    var hostname = "&hostname=" + $("#inputHostname").val();
    var rootpw = "&rootpw=" + $("#inputRootpw").val();
    var ns1prefix = "&ns1prefix=" + $("#inputNs1prefix").val();
    var ns2prefix = "&ns2prefix=" + $("#inputNs2prefix").val();
    var eppcode = "&eppcode=" + $('#eppcode').val();
    $("#producttoadd").val('');
    $("#remove_item_hidden").val('');
    $("#remove_item_type").val('');
    var additemstocart = "";
    if (addtocart === true)
    {
        var additemstocart = "&addtocart=true";
    }

    $.ajax(
            {
                url: "onepagecart/ajax/ajax.php" + domainstring + domainaddon + "&products[]=" + ids + "&register=" + $("#domain").attr("data-register") + "&addons[]=" + addons + "&promo=" + $("#promocode").val() + "&country=" + $("#country").val() + "&billingcycle=" + $("#billingcycle").val() + "&vatexempt=" + $("#vatexempt").val() + configopts + "&domaintransfer=" + $("#transfer-checkbox").prop('checked') + address + email + customfields + hostname + rootpw + ns1prefix + ns2prefix + configopts + eppcode + removeitem + removeitemtype + additemstocart + producttoadd + producttoedit + "&urlpram=" + urlparam,
                success: function (result)
                {
                    if ($("#product-first").css("display") == "none")
                    {
                        $("#product-first-message").fadeOut(1000);
                        $("#product-first").css('opacity', 0).slideDown(1000).animate({opacity: 1}, {queue: false, duration: 1000});
                    }
                    $("#billingcycle").find('option').remove().end();
                    $("#ordersummary-items .deets-1").remove();
                    $("#ordersummary-items .deets-2").remove();
                    $("#configurable-list").empty();
                    $("#domain-addon").hide();
                    $("#domainaddonblock").empty();
                    $("#addon-heading,#product-block,#billingcycleblock,#domain-block,#configureserver_section,#configurable_options_section").hide();

                    var currencyPrefix = result.currency_prefix;
                   
                    var cartLnag = result.lang;
                    /*---defining some constant---*/
                    var perMonth = " per Month - ";
                    if(cartLnag==='spanish')
                    {
                        perMonth = " por mes - ";
                    }

                    if (result.products != null)
                    {
                        var productLenght = result.products.length;
                        $.each(result.products, function (key, value)
                        {
                            $("#duecycle").text("Due " + ucfirst(value.billingcycle));
                            $(".longdueterm").text("Due " + ucfirst(value.billingcycle));
                            var countBillingCycle = Object.keys(value.pricing).length;

                            if ((productLenght - 1) == key && (typeof producttoeditValue == 'undefined'))
                            {
                                //domain option
                                if (value.showdomainoptions)
                                {
                                    $("#domain-block").show();
                                }
                                //server options
                                if (value.showserveroptions)
                                {
                                    $("#inputHostname").val(value.configureserver.hostname);
                                    $("#inputRootpw").val(value.configureserver.rootpw);
                                    $("#inputNs1prefix").val(value.configureserver.ns1prefix);
                                    $("#inputNs2prefix").val(value.configureserver.ns2prefix);

                                    $("#configureserver_section").show();
                                }
                                //end server options
                            }
                            else if (parseInt(producttoeditValue, 10) == key)
                            {
                                //start domain option
                                if (value.showdomainoptions)
                                {
                                    $("#domain-block").show();
                                }
                                //end domain options

                                //start server option
                                if (value.showserveroptions)
                                {
                                    $("#inputHostname").val(value.configureserver.hostname);
                                    $("#inputRootpw").val(value.configureserver.rootpw);
                                    $("#inputNs1prefix").val(value.configureserver.ns1prefix);
                                    $("#inputNs2prefix").val(value.configureserver.ns2prefix);

                                    $("#configureserver_section").show();
                                }
                                //end server options
                            }

                            // start adding billing cycle for last product
                            if ((productLenght - 1) == key && (typeof producttoeditValue == 'undefined') && countBillingCycle > 1)
                            {
                                $("#product-block,#billingcycleblock").show();
                                $.each(value.pricing, function (p, price)
                                {
                                    if (price.price != "-1.00" && price.price != "-1")
                                    {
                                        if (value.billingcycle == price.term)
                                        {
                                            var selected = "selected";
                                        } 
                                        else
                                        {
                                            var selected = "";
                                        }
                                        ;
                                        if (value.paytype == 'recurring')
                                        {
                                            var recurring = price;
                                        }
                                        else
                                        {
                                            var recurring = "0.00";
                                        }
                                        if (price.savings != '0') 
                                        {
                                            var savings = " (Save " + price.savings + "%!)";
                                            
                                            if(cartLnag==='spanish')
                                            {
                                                savings = " (Salvar " + price.savings + "%!)";
                                            }
                                        } 
                                        else
                                        {
                                            var savings = "";
                                        }
                                        var monprice = price.price / price.months;
                                        var term = price.term;
                                        if(cartLnag==='spanish')
                                        {
                                            if(price.term==='monthly')
                                            {
                                                term = 'Mensual';
                                            }
                                            else if(price.term==='quarterly')
                                            {
                                                term = 'Trimestral';
                                            }
                                            else if(price.term==='semiannually')
                                            {
                                                term = 'semi anualmente';
                                            }
                                            else if(price.term==='annually')
                                            {
                                                term = 'anualmente';
                                            }
                                            else if(price.term==='biennially')
                                            {
                                                term = 'cada dos años';
                                            }
                                            else if(price.term==='triennially')
                                            {
                                                term = 'trienal';
                                            }
                                        }
                                        

                                        $("#billingcycle").append("<option value='" + price.term + "' data-price='" + recurring + "' data-price-today='" + price.price + "' " + selected + ">" + ucfirst(term) + " - " + currencyPrefix + monprice.toFixed(2) + perMonth + accounting.formatMoney(price.price, currencyPrefix) + savings + "</option>");
                                    }
                                });
                            }
                            //adding billing cycle for last product ends

                            //start adding billingcycle to editing product
                            else if (parseInt(producttoeditValue, 10) == key && countBillingCycle > 1)
                            {
                                $("#product-block,#billingcycleblock").show();
                                $.each(value.pricing, function (p, price)
                                {
                                    if (price.price != "-1.00" && price.price != "-1")
                                    {
                                        if (value.billingcycle == price.term)
                                        {
                                            var selected = "selected";
                                        } else
                                        {
                                            var selected = "";
                                        }
                                        ;
                                        if (value.paytype == 'recurring') {
                                            var recurring = price;
                                        } else {
                                            var recurring = "0.00";
                                        }
                                        if (price.savings != '0') {
                                            var savings = " (Save " + price.savings + "%!)";
                                        } else {
                                            var savings = "";
                                        }
                                        var monprice = price.price / price.months;

                                        $("#billingcycle").append("<option value='" + price.term + "' data-price='" + recurring + "' data-price-today='" + price.price + "' " + selected + ">" + ucfirst(price.term) + " - " + currencyPrefix + monprice.toFixed(2) + " per Month - " + accounting.formatMoney(price.price) + savings + "</option>");
                                    }
                                });
                            }
                            //end adding billingcycle to editing product

                            /*---Start Adding into ordersummary---*/
                            var totalDomainAddon_price = "0.00";

                            if (!$.isEmptyObject(value.domainaddonselected))
                            {
                                var addoncheckeddns = '';
                                var addoncheckedemail = '';
                                var addoncheckedid = '';

                                var domainAddonTextdns = '';
                                var domainAddonTextemail = '';
                                var domainAddonTextid = '';

                                var addselecteddns = '';
                                var addselectedid = '';
                                var addselectedemail = '';

                                var priceselecteddns = '';
                                var priceselectedid = '';
                                var priceselectedemail = '';

                                var selecteddns_price = '0.00';
                                var selectedid_price = '0.00';
                                var selectedemail_price = '0.00';

                                var addtocarttextdns = '<i class="fa fa-plus"></i>Add to Cart';
                                var addtocarttextid = '<i class="fa fa-plus"></i>Add to Cart';
                                var addtocarttextemail = '<i class="fa fa-plus"></i>Add to Cart';

                                if (value.domainaddonselected.dnsmanagement === 'on')
                                {
                                    selecteddns_price = value.domainaddon.dnsmanagement_price;
                                    addoncheckeddns = "checked";
                                    addselecteddns = 'panel-add-selected';
                                    priceselecteddns = 'panel-price-selected';
                                    addtocarttextdns = '<i class="fa fa-shopping-cart"></i> Added to Cart (Remove)';
                                    domainAddonTextdns = "<div class='deets-2'><div class='col-md-12'><div class='col-md-5 pull-left'>DNS Management</div><div class='col-md-6 right-align order-item' style='text-align: right;' data-price='" + selecteddns_price + "'>" + currencyPrefix + parseFloat(selecteddns_price).toFixed(2) + "</div></div></div>";
                                }
                                if (value.domainaddonselected.idprotection === 'on')
                                {
                                    selectedid_price = value.domainaddon.idprotection_price;
                                    addoncheckedid = "checked";
                                    addselectedid = 'panel-add-selected';
                                    priceselectedid = 'panel-price-selected';
                                    addtocarttextid = '<i class="fa fa-shopping-cart"></i> Added to Cart (Remove)';
                                    domainAddonTextid = "<div class='deets-2'><div class='col-md-12'><div class='col-md-5 pull-left'>ID Protection</div><div class='col-md-6 right-align order-item' style='text-align: right;' data-price='" + selectedid_price + "'>" + currencyPrefix + parseFloat(selectedid_price).toFixed(2) + "</div></div></div>";
                                }
                                if (value.domainaddonselected.emailforwarding === 'on')
                                {
                                    selectedemail_price = value.domainaddon.emailforwarding_price;
                                    addoncheckedemail = "checked";
                                    addselectedemail = 'panel-add-selected';
                                    priceselectedemail = 'panel-price-selected';
                                    addtocarttextemail = '<i class="fa fa-shopping-cart"></i> Added to Cart (Remove)';
                                    domainAddonTextemail = "<div class='deets-2'><div class='col-md-12'><div class='col-md-5 pull-left'>Email Forwarding</div><div class='col-md-6 right-align order-item' style='text-align: right;' data-price='" + selectedemail_price + "'>" + currencyPrefix + parseFloat(selectedemail_price).toFixed(2) + "</div></div></div>";
                                }

                                //totalDomainAddon_price = (+selecteddns_price)+(+selectedid_price)+(+selectedemail_price);
                            }

                            /*---End Adding into ordersummary---*/
                            /*--Start Domain Addon---*/

                            if (!$.isEmptyObject(value.domainaddon) && (productLenght - 1) === key)
                            {
                                $("#domain-addon").show();

                                if (value.domainaddon.dnsmanagement === 'on')
                                {
                                    var dnsPrice = "FREE! / 1 Year/s";

                                    if (value.domainaddon.dnsmanagement_price && value.domainaddon.dnsmanagement_price != '0.00')
                                    {
                                        dnsPrice = currencyPrefix + value.domainaddon.dnsmanagement_price + " / 1 Year/s";
                                    }
                                    $("#domainaddonblock").append('<div class="domain-addon" id="dns-management"><div class="panel panel-default panel-addon addon-checked"><label for="dnsmanagement" class="control control--checkbox"><div class="panel-body"><input name="dnsmanagement" value="" ' + addoncheckeddns + ' class="trigger-update" id="dnsmanagement" type="checkbox" style="display:none;"><span class="control__indicator" style="margin-top:8px;/*margin-left:98px;*/ left: auto;"></span>DNS Management<br><p style="font-weight:500;margin-top: 10px;">External DNS Hosting can help speed up your website and improve availability with reduced redundancy.</p></div><div class="panel-price ' + priceselecteddns + '">' + dnsPrice + '</div><div class="panel-add ' + addselecteddns + '">' + addtocarttextdns + '</div></label></div></div>');
                                }
                                if (value.domainaddon.emailforwarding === 'on')
                                {
                                    var emailPrice = "FREE! / 1 Year/s";

                                    if (value.domainaddon.emailforwarding_price && value.domainaddon.emailforwarding_price != '0.00')
                                    {
                                        emailPrice = currencyPrefix + value.domainaddon.emailforwarding_price + " / 1 Year/s";
                                    }
                                    $("#domainaddonblock").append('<div class="domain-addon" id="email-forwarding"><div class="panel panel-default panel-addon addon-checked"><label for="emailforwarding" class="control control--checkbox"><div class="panel-body"><input name="emailforwarding" value="" ' + addoncheckedemail + ' class="trigger-update" id="emailforwarding" type="checkbox" style="display:none;"><span class="control__indicator" style="margin-top:8px;left: auto;"></span>Email Forwarding<br><p style="font-weight:500;margin-top: 10px;">Get emails forwarded to alternate email addresses of your choice so that you can monitor all from a single account.</p></div><div class="panel-price ' + priceselectedemail + '">' + emailPrice + '</div><div class="panel-add ' + addselectedemail + '">' + addtocarttextemail + '</div></label></div></div>');
                                }
                                if (value.domainaddon.idprotection === 'on')
                                {
                                    var idPrice = "FREE! / 1 Year/s";

                                    if (value.domainaddon.idprotection_price && value.domainaddon.idprotection_price != '0.00')
                                    {
                                        idPrice = currencyPrefix + value.domainaddon.idprotection_price + " / 1 Year/s";
                                    }
                                    $("#domainaddonblock").append('<div class="domain-addon" id="id-protection"><div class="panel panel-default panel-addon addon-checked"><label for="idprotection" class="control control--checkbox"><div class="panel-body"><input name="idprotection" value="" ' + addoncheckedid + ' class="trigger-update" id="idprotection" type="checkbox" style="display:none;"><span class="control__indicator" style="margin-top:8px;left: auto;"></span>ID Protection<br><p style="font-weight:500;margin-top: 10px;">Protect your personal information and reduce the amount of spam to your inbox by enabling ID Protection.</p></div><div class="panel-price ' + priceselectedid + '">' + idPrice + '</div><div class="panel-add ' + addselectedid + '">' + addtocarttextid + '</div></label></div></div>');
                                }

                            }
                            /*--End Domain Addon---*/


                            if (value.productwithdomain != null)
                            {
                                if (value.productwithdomain.register === true) {
                                    $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='clearfix'><div class='col-md-5 pull-left order-description'><small>Domain Registration: " + value.productwithdomain.full + "</small></div><div class='col-md-6 right-align order-price order-item' data-price='" + value.productwithdomain.cost + "'>" + currencyPrefix + value.productwithdomain.cost + "</div><div class='col-sm-1'  style='float: right;'></div></div></div></div>");
                                }
                                if (value.productwithdomain.transfer === true) {
                                    $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='clearfix'><div class='col-md-5 pull-left order-description'>Domain Transfer: " + value.productwithdomain.full + "</div><div class='col-md-6 right-align order-item order-price' data-price='" + value.productwithdomain.cost + "'>" + currencyPrefix + value.productwithdomain.cost + "</div><div class='col-sm-1'  style='float: right;'></div></div></div>");
                                }
                                if (value.productwithdomain.transfer === false) {
                                    $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='clearfix'><div class='col-md-5 pull-left order-description'>Existing Domain: " + value.productwithdomain.full + "</div><div class='col-md-6 right-align order-item order-price' data-price='" + value.productwithdomain.cost + "'>" + currencyPrefix + value.productwithdomain.cost + "</div><div class='col-sm-1'  style='float: right;'></div></div></div></div>");
                                }

                            }

                            /*----adding domain addon on order summary page ---*/
                            $("#ordersummary-items").append(domainAddonTextid);
                            $("#ordersummary-items").append(domainAddonTextemail);
                            $("#ordersummary-items").append(domainAddonTextdns);
                            /*------end----------*/

                            //start dispalying configuration options
                            if (!$.isEmptyObject(value.configoptions))
                            {
                                $("#configurable_options_section,#configurable-list").show();
                                var optiontype_1 = '';
                                var optiontype_2 = '';
                                var optiontype_3 = '';

                                $.each(value.configoptions, function (conkey, conval)
                                {
                                    if (conval.optiontype == '1')
                                    {
                                        //select box
                                        var options = '';
                                        var selected = '';
                                        var description = '';
                                        var popover = '';
                                        if (conval.popover == 'show')
                                        {
                                            description = conval.description;
                                            popover = '<div class="col-md-2"><a href="#" data-toggle="popover" title="" data-content="' + description + '" data-original-title="' + conval.optionname + '"><img src="images/popover.png" alt="popup"></a></div>';
                                        }

                                        $.each(conval.options, function (opkey, opval)
                                        {
                                            selected = '';
                                            if (conval.selectedvalue == opval.id)
                                            {
                                                selected = "selected";
                                            }
                                            options = options + '<option value="' + opval.id + '"' + selected + '>' + opval.name + '</option>';
                                        });
                                        optiontype_1 = optiontype_1 + '<div class="col-md-12"><div class="col-md-2 side-label"><label>' + conval.optionname + '</label></div><div class="col-md-8"><div class="form-group"><select name="configoptions[' + conval.id + ']" class="form-control personal-input configoption" data-config-id="' + conval.id + '" onchange="opcupdate();">' + options + '</select></div></div>' + popover +'</div>';
                                    }
                                    if (conval.optiontype == '2')
                                    {
                                        //radio button
                                        var options = '';
                                        var selected = '';
                                        var popover = '';
                                        if (conval.popover == 'show')
                                        {
                                            description = conval.description;
                                            popover = '<div class="col-md-2"><a href="#" data-toggle="popover" title="" data-content="' + description + '" data-original-title="' + conval.optionname + '"><img src="images/popover.png" alt="popup"></a></div>';
                                        }

                                        $.each(conval.options, function (opkey, opval)
                                        {
                                            selected = '';
                                            if (conval.selectedvalue == opval.id)
                                            {
                                                selected = "checked='checked'";
                                            }
                                            options = options + '<label  style="font-weight:normal;"><input type="radio" class="iradiobox configoption_radio" name="configoptions[' + conval.id + ']" data-config-id="' + conval.id + '" value="' + opval.id + '" ' + selected + 'onclick="opcupdate();"><span style="margin-left:10px;">' + opval.name + ' </span></label><br />';
                                        });
                                        optiontype_2 = optiontype_2 + '<div class="col-md-12"><table style="width: 100%;"><tbody><tr><td style="width: 16.66%;padding: 0px 15px;"><div style="position:relative;top:20%;"><label class="control-label checkout-label col-md-offset-1">' + conval.optionname + '</label></div></td><td style="vertical-align:middle;width:75%;"><div class="col-md-8"><div class="form-group" style="text-align:left">' + options + '</div></div></td><td style="vertical-align:middle;">' + popover + '</td></tr></tbody></table></div>';
                                    }
                                    if (conval.optiontype == '3')
                                    {
                                        //checkbox
                                        var options = '';
                                        var selected = '';
                                        var popover = '';
                                        if (conval.popover == 'show')
                                        {
                                            description = conval.description;
                                            popover = '<div class="col-md-2"><a href="#" data-toggle="popover" title="" data-content="' + description + '" data-original-title="' + conval.optionname + '"><img src="images/popover.png" alt="popup"></a></div>';
                                        }

                                        $.each(conval.options, function (opkey, opval)
                                        {
                                            selected = '';
                                            if (conval.selectedqty)
                                            {
                                                selected = "checked='checked'";
                                            }
                                            options = options + '<label style="font-weight:normal;"><input type="checkbox" class="iradiobox configoption_checkbox" data-config-id="' + conval.id + '" name="configoptions[' + conval.id + ']" value="1"' + selected + 'onclick="opcupdate()" /> <span style="margin-left:10px;">' + opval.name + '</span></label><br/>';
                                        });
                                        optiontype_3 = optiontype_3 + '<div class="col-md-12"><div class="col-md-2 side-label"><label class="control-label checkout-label col-md-offset-1">' + conval.optionname + '</label></div><div class="col-md-8" style="margin: 1% auto;"><div class="form-group" style="text-align:left">' + options + '</div></div>' + popover + '</div>';
                                    }
                                });
                                $("#configurable-list").append(optiontype_1);
                                $("#configurable-list").append(optiontype_2);
                                $("#configurable-list").append(optiontype_3);

                                $('[data-toggle="popover"]').popover({
                                    placement: 'top',
                                    trigger: 'hover'
                                });

                                var callbacks_list = $('.demo-callbacks ul');
                                $('.iradiobox').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function (event)
                                {
                                    callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
                                }).iCheck({
                                    checkboxClass: 'icheckbox_square-blue',
                                    radioClass: 'iradio_square-blue',
                                    increaseArea: '20%'
                                });
                            }
                            //end displying configuration server

                            //adding configuration into order summary
                            if (typeof value.selconfigopts != 'undefined')
                            {
                                var config_setupfee = "";
                                var cprice = "0.00";
                                $.each(value.selconfigopts, function (scokey, scoval)
                                {
                                    $.each(scoval.options, function (okey, oval)
                                    {
                                        if (oval.nameonly === scoval.selectedname || scoval.selectedname==='Yes')
                                        {
                                            if (oval.setup != "0.00" && oval.setup)
                                            {
                                                config_setupfee = "+ Setup Fees";
                                                cprice = (parseFloat(scoval.selectedrecurring) + parseFloat(oval.setup)).toFixed(2);
                                            }
                                            else
                                            {
                                                cprice = scoval.selectedrecurring;
                                            }
                                        }
                                    });

                                    $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='col-md-5 pull-left'>" + scoval.optionname + " -  " + scoval.selectedname + config_setupfee + "</div><div class='col-md-6 right-align order-item' style='text-align: right;' data-price='" + cprice + "'>" + currencyPrefix + cprice + "</div></div></div>");
                                });
                            }
                            //end of adding product option in order summary page

                            if (value.customfields != "null" && typeof value.customfields != 'undefined')
                            {
                                if (parseInt(producttoeditValue, 10) == key)
                                {
                                    //editing
                                    $("#product-custom").empty();
                                    var cushtml='';
                                    $.each(value.customfields, function(key, cvalue) 
                                    {
                                        cushtml=cushtml+"<div style='float: left;width: 100%;'><div class='col-md-2 side-label'><label class='control-label checkout-label col-md-offset-1' for='configoptions[1]'>"+cvalue.name+"</label></div>";
                                        cushtml = cushtml+"<div class='col-md-8'><div class='form-group select_wrap'>"+ cvalue.input +"</div></div></div>";

                                    });
                                    $("#product-custom").append(cushtml);
                                    
                                    $("#customfields_section").show();
                                }
                                else if((productLenght - 1) == key && (typeof producttoeditValue == 'undefined'))
                                {
                                    //last product
                                    $("#product-custom").empty();
                                    var cushtml='';
                                    $.each(value.customfields, function(key, cvalue) 
                                    {
                                        cushtml=cushtml+"<div style='float: left;width: 100%;'><div class='col-md-2 side-label'><label class='control-label checkout-label col-md-offset-1' for='configoptions[1]'>"+cvalue.name+"</label></div>";
                                        cushtml = cushtml+"<div class='col-md-8'><div class='form-group select_wrap'>"+ cvalue.input +"</div></div></div>";

                                    });
                                    $("#product-custom").append(cushtml);
                                    
                                    $("#customfields_section").show();
                                }
                                var callbacks_list = $('.demo-callbacks ul');
                                $('.iradiobox').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event)
                                {
                                    callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
                                 }).iCheck({
                                                checkboxClass: 'icheckbox_square-blue',
                                                radioClass: 'iradio_square-blue',
                                                increaseArea: '20%'
                                            });
                            }

                            if (value.productimage)
                            {
                                var imgp = "<img src='../modules/addons/onepagecheckout/templates/products/" + value.productimage + "' style='width:75px;height:75px;'>";
                            } else
                            {
                                var imgp = '<span style="width: 29px !important;float: left;margin: 0 auto;margin: 0px 0px 2px 0px;"></span>';
                            }

                            if (typeof value.productwithdomain.full != 'undefined')
                            {
                                var selecteddomain = value.productwithdomain.full;
                            } else
                            {
                                var selecteddomain = '';
                            }

                            if (value.setupfee != "0.00")
                            {
                                var setupfee = "+ Setup Fees"
                            }
                            else
                            {
                                var setupfee = "";
                            }

                            //start addon list
                            if (typeof producttoeditValue == 'undefined')
                            {
                                if (notPrefill == 1)
                                {
                                    $("#addons-list").empty();
                                    $("#addon-heading").hide();
                                    
                                    if (value.addons != null)
                                    {
                                        $.each(value.addons, function (akey, avalue)
                                        {
                                            var achecked;
                                            var customClass;
                                            if (typeof value.addon_selected != 'undefined')
                                            {
                                                $.each(value.addon_selected, function (selkey, selvalue)
                                                {
                                                    if (selvalue.id == avalue.relid) {
                                                        achecked = 'checked';
                                                        customClass = 'addon-checked';
                                                    }
                                                });
                                            }
                                            //addon price
                                            var addonPrice = avalue.monthly;
                                            var addonSetUpPrice = '0.00';
                                            var addonBillingCycle = avalue.billingcycle;

                                            if (avalue.billingcycle == 'free')
                                            {
                                                addonPrice = '0.00';
                                            }
                                            else if (avalue.billingcycle == 'recurring')
                                            {
                                                if (parseFloat(avalue[value.billingcycle]) > parseFloat("-1.00"))
                                                {
                                                    /*--addon price for same billingcycle as product ---*/
                                                    addonPrice = avalue[value.billingcycle];
                                                    addonBillingCycle = value.billingcycle;
                                                    
                                                    if(avalue[value.billingcycle.charAt(0)+"setupfee"] > parseFloat("0.00"))
                                                    {
                                                        addonSetUpPrice = avalue[value.billingcycle.charAt(0)+"setupfee"];
                                                    }
                                                }
                                                else if (parseFloat(avalue.monthly) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.monthly;
                                                    addonBillingCycle = 'monthly';
                                                    
                                                    if(avalue["msetupfee"] > parseFloat("0.00"))
                                                    {
                                                        addonSetUpPrice = avalue["msetupfee"];
                                                    }

                                                }
                                                else if (parseFloat(avalue.quarterly) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.quarterly;
                                                    addonBillingCycle = 'quarterly';
                                                    
                                                    if(avalue["qsetupfee"] > parseFloat("0.00"))
                                                    {
                                                        addonSetUpPrice = avalue["qsetupfee"];
                                                    }

                                                }
                                                else if (parseFloat(avalue.semiannually) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.semiannually;
                                                    addonBillingCycle = 'semiannually';
                                                    
                                                    if(avalue["ssetupfee"] > parseFloat("0.00"))
                                                    {
                                                        addonSetUpPrice = avalue["ssetupfee"];
                                                    }

                                                }
                                                else if (parseFloat(avalue.annually) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.annually;
                                                    addonBillingCycle = 'annually';
                                                    
                                                    if(avalue["asetupfee"] > parseFloat("0.00"))
                                                    {
                                                        addonSetUpPrice = avalue["asetupfee"];
                                                    }

                                                }
                                                else if (parseFloat(avalue.biennially) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.biennially;
                                                    addonBillingCycle = 'biennially';
                                                    
                                                    if(avalue["bsetupfee"] > parseFloat("0.00"))
                                                    {
                                                        addonSetUpPrice = avalue["bsetupfee"];
                                                    }

                                                }
                                                else if (parseFloat(avalue.triennially) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.triennially;
                                                    addonBillingCycle = 'triennially';
                                                    
                                                    if(avalue["tsetupfee"] > parseFloat("0.00"))
                                                    {
                                                        addonSetUpPrice = avalue["tsetupfee"];
                                                    }

                                                }
                                            }
                                            else if (avalue.billingcycle == 'onetime')
                                            {
                                                //addonBillingCycle = 'monthly';
                                                addonBillingCycle = avalue.billingcycle;
                                                
                                                if(avalue["tsetupfee"] > parseFloat("0.00"))
                                                {
                                                    addonSetUpPrice = avalue["tsetupfee"];
                                                }
                                            }
                                            
                                            if(parseFloat(addonSetUpPrice)>parseFloat("0.00"))
                                            {
                                                
                                            }

                                            addonBillingCycle = addonBillingCycle.charAt(0).toUpperCase() + addonBillingCycle.slice(1);


                                            if (avalue.imagepath)
                                            {
                                                var imga = "<img src='../modules/addons/onepagecheckout/templates/addons/" + avalue.imagepath + "' style='width:75px;height:75px;margin-top:30px;'>";
                                            } else
                                            {
                                                var imga = "<img src='images/addons.png' style='width: 75px;margin-top: 15px;' alt=''>";
                                            }

                                            $("#addon-heading").show();
                                            $("#addons-list").append("<div class='add-svcs addon-unchecked clearfix personal-info addons" + customClass + "'><label class='login-checkbox ad-check control control--checkbox' style='font-weight:500;display: block;margin-bottom:-5px;' for='addon-" + avalue.relid + "'><div class='col-md-1'>" + imga + "</div><div class='col-md-1 addon-image-section no-padding' style='width:60px;'><input type='checkbox' id='addon-" + avalue.relid + "' name='addons[]' value='" + avalue.relid + "' class='addons border-addon trigger-update' " + achecked + " ><span class='control__indicator' style='margin-top:35px;margin-left:25px;'></span></div> <div class='col-md-8'><h4>" + avalue.name + "</h4><p class='addondescription'> " + avalue.description + "</p></div> <div class='col-md-2 addon-info addon-image-section' style=' text-align: left;padding-right: 0px;'><h2 class='addonprice'>" + currencyPrefix + addonPrice + "</h2><p class='addonbillingcycle'> (Billed " + addonBillingCycle + ")</p></div></label></div>");
                                        });
                                    } else
                                    {
                                        $("#addon-heading").hide();
                                        // $("#addons-list").closest('.section-background').addClass('addons-recommended');
                                    }
                                }
                            } 
                            else if (parseInt(producttoeditValue, 10) == key)
                            {
                                if (notPrefill == 1)
                                {
                                    $("#addons-list").empty();
                                    $("#addon-heading").hide();
                                    if (value.addons != null)
                                    {
                                        $.each(value.addons, function (akey, avalue)
                                        {
                                            var achecked;
                                            var customClass;
                                            if (typeof value.addon_selected != 'undefined')
                                            {
                                                $.each(value.addon_selected, function (selkey, selvalue)
                                                {
                                                    if (selvalue.id == avalue.relid)
                                                    {
                                                        achecked = 'checked';
                                                        customClass = 'addon-checked';
                                                    }
                                                });
                                            }
                                            //addon price
                                            var addonPrice = avalue.monthly;

                                            var addonBillingCycle = avalue.billingcycle;

                                            if (avalue.billingcycle == 'free')
                                            {
                                                addonPrice = '0.00';
                                            }
                                            else if (avalue.billingcycle == 'recurring')
                                            {
                                                if (parseFloat(avalue[value.billingcycle]) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue[value.billingcycle];
                                                    addonBillingCycle = value.billingcycle;

                                                }
                                                else if (parseFloat(avalue.monthly) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.monthly;
                                                    addonBillingCycle = 'monthly';

                                                }
                                                else if (parseFloat(avalue.quarterly) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.quarterly;
                                                    addonBillingCycle = 'quarterly';

                                                }
                                                else if (parseFloat(avalue.semiannually) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.semiannually;
                                                    addonBillingCycle = 'semiannually';

                                                }
                                                else if (parseFloat(avalue.annually) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.annually;
                                                    addonBillingCycle = 'annually';

                                                }
                                                else if (parseFloat(avalue.biennially) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.biennially;
                                                    addonBillingCycle = 'biennially';

                                                }
                                                else if (parseFloat(avalue.triennially) > parseFloat("-1.00"))
                                                {
                                                    addonPrice = avalue.triennially;
                                                    addonBillingCycle = 'triennially';

                                                }
                                            }
                                            else if (avalue.billingcycle == 'onetime')
                                            {
                                                addonBillingCycle = 'monthly';
                                            }

                                            addonBillingCycle = addonBillingCycle.charAt(0).toUpperCase() + addonBillingCycle.slice(1);

                                            if (avalue.imagepath)
                                            {
                                                var imga = "<img src='../modules/addons/onepagecheckout/templates/addons/" + avalue.imagepath + "' style='width:75px;height:75px;'>";
                                            } else
                                            {
                                                var imga = "<img src='images/addons.png' style='width: 75px;margin-top: 15px;' alt=''>";
                                            }
                                            // $("#addons-list").closest('.section-background').removeClass('addons-recommended');
                                            $("#addon-heading").show();
                                            $("#addons-list").append("<div class='add-svcs addon-unchecked clearfix personal-info addons" + customClass + "'><label class='login-checkbox ad-check control control--checkbox' style='font-weight:500;display: block;margin-bottom:-5px;' for='addon-" + avalue.relid + "'><div class='col-md-1'>" + imga + "</div><div class='col-md-1 addon-image-section no-padding' style='width:60px;'><input type='checkbox' id='addon-" + avalue.relid + "' name='addons[]' value='" + avalue.relid + "' class='addons border-addon trigger-update' " + achecked + " ><span class='control__indicator' style='margin-top:35px;margin-left:25px;'></span></div> <div class='col-md-8'><p class='addonname'>" + avalue.name + "</p><p class='addondescription'> " + avalue.description + "</p></div> <div class='col-md-2 addon-info addon-image-section' style=' text-align: left;padding-right: 0px;'><p class='addonprice'>" + currencyPrefix + addonPrice + "</p><p class='addonbillingcycle'> (Billed " + addonBillingCycle + ")</p></div></label> </div>");
                                        });
                                    } else
                                    {
                                        $("#addon-heading").hide();
                                        //                            $("#addons-list").closest('.section-background').addClass('addons-recommended');
                                    }
                                }
                            }
                            //end listing addons

                            //start adding selected addon in order summary
                            if (typeof value.addon_selected != 'undefined')
                            {
                                $.each(value.addon_selected, function (aakey, aavalue)
                                {
                                    if (aavalue.imagepath)
                                    {
                                        var imgas = "<img src='../modules/addons/onepagecheckout/templates/addons/" + aavalue.imagepath + "' style='width:75px;height:75px;'>";
                                    } 
                                    else
                                    {
                                        var imgas = "";
                                    }
                                    if(aavalue.setupfee > "0")
                                    {
                                        var setup = '+ Setup Fees';
                                      
                                    }
                                   var price = ((parseFloat(aavalue.price)+parseFloat(aavalue.setupfee)).toFixed(2));
                                     
                                    if (aakey % 2 == 0)
                                    {
                                        $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='col-md-5 pull-left' style='padding-top:0px;'>" + aavalue.name +"" + setup + "</div><div class='col-md-6 right-align order-item' style='padding-top:0px;text-align: right;' data-price='" + price + "'>" + currencyPrefix + price + "</div><div class='col-sm-1' style='float: right;padding-top:0px;'></div></div></div>");
                                    } 
                                    else
                                    {
                                        $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='order-details clearfix'><div class='col-md-5 pull-left order-description' style='padding-top:0px;'>" + aavalue.name + "</div><div class='col-md-6 right-align order-price order-item' data-price='" + aavalue.price + "'>" + currencyPrefix + aavalue.price + "</div><div class='col-sm-1' style='float: right;padding-top:0px;'></div></div></div>");
                                    }
                                });
                            }
                            //end adding selected addon in order summary
                            //adding product to order summary
                            //$("#ordersummary-items").append("<div class='deets-1'><div class='col-md-12' style='padding:0px;'><div class='order-details clearfix' style='padding-top:10px;'><div class='col-md-1 pull-left'>" + imgp + "</div><div class='col-md-5 pull-left order-description' style='padding-top:20px;'>" + value.name + " <small>(" + ucfirst(value.billingcycle) + ")</small>"+setupfee+"<a href='?product=" + value.id + "&a=edit&i=" + value.session_productid + "' class='btn-xs'><i class='fa fa-pencil'></i> Edit</a><br><small style='font-size: 13px;margin-top: -5px;float: left;font-weight: 100;'>" + selecteddomain + "</small></div><div class='col-md-5 right-align order-item-product' style='padding-top:20px;' data-price='" + value.productorig + "'>" + currencyPrefix + value.productorig + "</div><div class='col-sm-1'  style='float: right;padding-top:15px;'><button type='button' class='btn-link btn-remove-from-cart' onclick=\"removeItem('p','" + value.session_productid + "')\" style='color: #444!important;'><i class='fa fa-times' style='font-size:15px;'></i> </button></div></div></div></div>");
                            $("#ordersummary-items").append("<div class='deets-1' style='float:left;'><div class='col-md-12'><div class='order-details clearfix' style='padding-top:10px;'><div class='col-md-5 pull-left order-description'>" + value.name + " <small>(" + ucfirst(value.billingcycle) + ")</small>" + setupfee + "<a href='?product=" + value.id + "&a=edit&i=" + value.session_productid + "' class='btn-xs' style='display: none;'><i class='fa fa-pencil'></i> Edit</a><br><small style='font-size: 13px;margin-top: -5px;float: left;font-weight: 100;'>" + selecteddomain + "</small></div><div class='col-md-6 right-align order-item-product' data-price='" + value.productorig + "'>" + currencyPrefix + value.productorig + "</div><div class='col-sm-1'  style='float: right;padding-top:15px;display:none;'><button type='button' class='btn-link btn-remove-from-cart' onclick=\"removeItem('p','" + value.session_productid + "')\" style='color: #444!important;'><i class='fa fa-times' style='font-size:15px;'></i> </button></div></div></div></div>");
                        });
                        //end of products loops




                        if (result.domains != null)
                        {
                            $.each(result.domains, function (key, value) {

                                var imgp = '<span style="width: 29px !important;float: left;margin: 0 auto;margin: 0px 0px 2px 0px;"></span>';
                                if (value.type == "register") {
                                    $("#ordersummary-items").append("<div class='deets-1'><div class='col-md-12'><div class='col-md-7 left-align'>Domain Registration: " + key + "</div><div class='col-md-3 right-align order-item-product'  data-price='" + value.price + "'>" + currencyPrefix + value.price + "</div><div class='col-sm-1'  style='float: right;    margin-top: 10px;'><button type='button' class='btn-link btn-remove-from-cart' onclick=\"removeItem('d','" + value.domainkey + "')\" style='color: #444!important;'><i class='fa fa-times' style='font-size:15px;'></i> </button></div></div></div>");
                                }
                                if (value.type == "transfer") {
                                    $("#ordersummary-items").append("<div class='deets-1'><div class='col-md-12'><div class='col-md-5 left-align'>Domain Transfer: " + key + "</div><div class='col-md-6 right-align order-item-product'  data-price='" + value.price + "'>" + currencyPrefix + value.price + "</div><div class='col-sm-1'  style='float: right;    margin-top: 10px;'><button type='button' class='btn-link btn-remove-from-cart' onclick=\"removeItem('d','" + value.domainkey + "')\" style='color: #444!important;'><i class='fa fa-times' style='font-size:15px;'></i> </button></div></div></div>");
                                }

                            });
                        }
                        if (typeof result.promo != 'undefined' && typeof result.promo.code != 'undefined')
                        {
                            if (result.promo.used === true)
                            {
                                $("#couponcode").show();
                                $("#couponcode").html('<div class="alert alert-success"><h3 style="margin-bottom: 0px;margin-top:0px;font-size: 16px;">The coupon <b>' + result.promo.code + '</b> has been applied to your order! <a class="remove_promo" href="javascript:void(0);" title="Remove code" alt="Remove code" style="float:right"><i class="fa fa-times" aria-hidden="true" style="color:#3c763d"></i></a></h3></div>');
                                if (result.promo.extra.type == 'percent') {
                                    cptrailer = '%';
                                } else {
                                    cptrailer = '';
                                }
                                if (result.promo.extra.type == 'fixed' || result.promo.extra.type == 'override') {
                                    cppre = '$';
                                } else {
                                    cppre = '';
                                }
                                $("#discount").show();
                                if (result.promo.extra.type == 'percent') {
                                    $("#long-coupon-amount").text('-' + cppre + parseFloat(result.promo.extra.amount).toFixed(2) + cptrailer);
                                }
                                if (result.promo.extra.type == 'override') {
                                    $("#long-coupon-amount").text('-' + cppre + parseFloat(result.promo.extra.pre).toFixed(2) + cptrailer);
                                }
                                if (result.promo.extra.type == 'fixed') {
                                    $("#long-coupon-amount").text('-$' + parseFloat(result.promo.extra.pre).toFixed(2));
                                }
                                $("#long-coupon-code").text('(' + result.promo.code + ')');
                                $("#promocode").css("border", "2px solid green");
                                $("#promomsg").hide();
                                $("#promosuccess").show();
                                $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='col-md-5 pull-left'>Coupon " + result.promo.code + "</div><div class='col-md-6 right-align' style='text-align: right;'>-" + currencyPrefix + parseFloat(result.promo.extra.pre).toFixed(2) + "</div></div></div>");
                            }
                            else
                            {
                                $("#sidebar-coupon-code").text("None");
                                $("#sidebar-coupon").hide();
                                $("#long-coupon-code").text("None");
                                $("#discount").hide();
                                $("#promocode").css("border", "2px solid red");
                                $("#promomsg").show();
                                $("#promosuccess").hide();
                                $("#couponcode").show();
                                $("#couponcode").html('<div class="alert alert-danger"><h3 style="margin-bottom: 0px;margin-top:0px;font-size: 16px;">The coupon code you entered is invalid <a class="remove_promo" href="javascript:void(0);" title="Remove code" alt="Remove code" style="float:right"><i class="fa fa-times" aria-hidden="true" style="color:#a94442"></i></a></h3></div>');
                            }
                        }
                        else
                        {
                            $("#sidebar-coupon").hide();
                            $("#discount").hide();
                            $("#promocode").css("border", "1px solid #ccc");
                        }

                        if (typeof result.domain != 'undefined') {
                            if (result.billingcycle == 'annually') {
                                annualdomaincost = result.domain.recurring;
                                annualprivcost = "7.00";
                            } else {
                                annualdomaincost = result.domain.recurring;
                                annualprivcost = '7.00';
                            }

                            if (result.domain.register === true) {
                                $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='col-md-5 left-align'>Domain Registration: " + result.domain.full + "</div><div class='col-md-6 right-align order-item' data-price='" + result.domain.cost + "'>" + currencyPrefix + result.domain.cost + "</div></div></div>");
                            }
                            if (result.domain.transfer === true) {
                                $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='col-md-5 left-align'>Domain Transfer: " + result.domain.full + "</div><div class='col-md-6 right-align order-item' data-price='" + result.domain.cost + "'>" + currencyPrefix + result.domain.cost + "</div></div></div>");
                            }
                            if (result.domain.transfer === false) {
                                $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='col-md-5 left-align'>Existing Domain: " + result.domain.full + "</div><div class='col-md-6 right-align order-item' data-price='" + result.domain.cost + "'>" + currencyPrefix + result.domain.cost + "</div></div></div>");
                            }
                        }
//                if (typeof result.owndomain != 'undefined') {
//                    $("#ordersummary-items").append("<div class='deets-2'><div class='col-md-12'><div class='col-md-8 left-align'>Domain Registration: " + result.owndomain + "</div><div class='col-md-3 right-align order-item' data-price='$0.00'>$0.00</div></div></div>");
//                }
                    } else {
                        if (result.domains != null) {
                            $.each(result.domains, function (key, value) {

                                var imgp = '<span style="width: 29px !important;float: left;margin: 0 auto;margin: 0px 0px 2px 0px;"></span>';
                                if (value.type == "register") {
                                    $("#ordersummary-items").append("<div class='deets-1'><div class='col-md-12'><div class='col-md-7 left-align'>Domain Registration: " + key + "</div><div class='col-md-3 right-align order-item-product'  data-price='" + value.price + "'>" + currencyPrefix + value.price + "</div><div class='col-sm-1'  style='float: right;    margin-top: 10px;'><button type='button' class='btn-link btn-remove-from-cart' onclick=\"removeItem('d','" + value.domainkey + "')\" style='color: #444!important;'><i class='fa fa-times' style='font-size:15px;'></i> </button></div></div></div>");
                                }
                                if (value.type == "transfer") {
                                    $("#ordersummary-items").append("<div class='deets-1'><div class='col-md-12'><div class='col-md-5 left-align'>Domain Transfer: " + key + "</div><div class='col-md-6 right-align order-item-product'  data-price='" + value.price + "'>" + currencyPrefix + value.price + "</div><div class='col-sm-1'  style='float: right;    margin-top: 10px;'><button type='button' class='btn-link btn-remove-from-cart' onclick=\"removeItem('d','" + value.domainkey + "')\" style='color: #444!important;'><i class='fa fa-times' style='font-size:15px;'></i> </button></div></div></div>");
                                }

                            });
                        } else {
                            if (cart_lang == "english")
                            {
                                $("#ordersummary-items").html("Your Shopping Cart is Empty");
                            }
                            else {
                                $("#ordersummary-items").html("Su cesta está vacía");
                            }
                            $(".empty-cart").hide();
                        }

                    }

                    var totaltoday = 0;
                    $(".order-item-product").each(function () {
                        totaltoday += parseFloat($(this).attr('data-price'));
                    });
                    $(".order-item").each(function () {
                        totaltoday += parseFloat($(this).attr('data-price'));
                    });
                    
                    if (result.totaltoday != null) 
                    {
                        $("#longtotal").html(currencyPrefix + result.totaltoday.toFixed(2));
                        var applepayamounttotal = result.totaltoday.toFixed(2);
                    }
                    else
                    {
                        $("#longtotal").html("$0.00");
                        var applepayamounttotal = "0.00";
                    }
//             var applePayAmountDue = result.totaltoday.toFixed(2),
//        applePayCurrency = 'USD',
//        applePayDescription = 'Company Name Shopping Cart';
  //start tax
                    $("#tax1,#tax2").empty();
                    if (result.tax1_name != null)
                    {
                      
                        $("#tax1").append("<td><b>"+result.tax1_name+"</b></td>");
                    }
                    if (result.toatlvattoday1 != null && result.toatlvattoday1 != 0)
                    {
                        $("#tax1").append("<td>"+currencyPrefix + result.toatlvattoday1.toFixed(2)+"</td>");
                    }
                    if (result.tax2_name != null)
                    {
                        $("#tax2").append("<td><b>"+result.tax2_name+"</b></td>");
                    }
                    if (result.toatlvattoday2 != null && result.toatlvattoday2 != 0)
                    {
                        $("#tax2").append("<td>"+currencyPrefix + result.toatlvattoday2.toFixed(2)+"</td>");
                    }
                    
                    //End Tax
                    $("#handleapplepayamount").html("<script>\n\
var applePayAmountDue='" + applepayamounttotal + "';\n\
 var applePayCurrency='USD';\n\
 var applePayDescription='MyWorks Design- Shopping Cart'\n\
</script>");

                    $("#longsubtotal").html(currencyPrefix + totaltoday.toFixed(2));
                    if (result.totalrecurringannually || result.totalrecurringbiennially || result.totalrecurringmonthly || result.totalrecurringquarterly || result.totalrecurringsemiannually || result.totalrecurringtriennially) {
                        jQuery(".recurring-totals").show();
                    }
                    if (result.totalrecurringannually) {
                        jQuery("#recurringAnnually").fadeIn("fast");
                    } else {
                        jQuery("#recurringAnnually").fadeOut("fast")
                    }
                    if (result.totalrecurringbiennially) {
                        jQuery("#recurringBiennially").fadeIn("fast");
                    } else {
                        jQuery("#recurringBiennially").fadeOut("fast")
                    }
                    if (result.totalrecurringmonthly) {
                        jQuery("#recurringMonthly").fadeIn("fast");
                    } else {
                        jQuery("#recurringMonthly").fadeOut("fast")
                    }
                    if (result.totalrecurringquarterly) {
                        jQuery("#recurringQuarterly").fadeIn("fast");
                    } else {
                        jQuery("#recurringQuarterly").fadeOut("fast")
                    }
                    if (result.totalrecurringsemiannually) {
                        jQuery("#recurringSemiAnnually").fadeIn("fast");
                    } else {
                        jQuery("#recurringSemiAnnually").fadeOut("fast")
                    }
                    if (result.totalrecurringtriennially) {
                        jQuery("#recurringTriennially").fadeIn("fast");
                    } else {
                        jQuery("#recurringTriennially").fadeOut("fast")
                    }

                    n = jQuery("#recurring");
                    n.find("span:visible").not("span.cost").fadeOut("fast").end(), result.totalrecurringannually && jQuery("#recurringAnnually").fadeIn("fast").find(".cost").html(currencyPrefix + result.totalrecurringannually.toFixed(2)), result.totalrecurringbiennially && jQuery("#recurringBiennially").fadeIn("fast").find(".cost").html(currencyPrefix + result.totalrecurringbiennially.toFixed(2)), result.totalrecurringmonthly && jQuery("#recurringMonthly").fadeIn("fast").find(".cost").html(currencyPrefix + result.totalrecurringmonthly.toFixed(2)), result.totalrecurringquarterly && jQuery("#recurringQuarterly").fadeIn("fast").find(".cost").html(currencyPrefix + result.totalrecurringquarterly.toFixed(2)), result.totalrecurringsemiannually && jQuery("#recurringSemiAnnually").fadeIn("fast").find(".cost").html(currencyPrefix + result.totalrecurringsemiannually.toFixed(2)), result.totalrecurringtriennially && jQuery("#recurringTriennially").fadeIn("fast").find(".cost").html(currencyPrefix + result.totalrecurringtriennially.toFixed(2));
                    if (result.totaltoday != null) {
                       /* if (typeof result.vattoday != 'undefined') {
                            $("#taxtotal").text(currencyPrefix + result.vattoday.toFixed(2));
                        }*/
                        $("#totalpricetoday").text(currencyPrefix + result.totaltoday.toFixed(2));
                        $("#totalperterm").text(currencyPrefix + result.totalrecurring);

                        if (typeof result.domainresult != 'undefined')
                        {
                            $("#tranferdomain-message,#owndomain-message").empty();
                            if (result.domainresult.domaintype == "owndomain")
                            {
                                $("#owndomain1").css("border", "2px solid green");
                                //$("#tranferdomain-message,#owndomain-message").empty();
                                if (cart_lang == "english") {
                                    $("#owndomain-message").html("<div class='alert alert-success text-success' style='padding: 15px;font-size: 16px;'>Domain saved.</div>");

                                }
                                else {
                                    $("#owndomain-message").html("<div class='alert alert-success text-success' style='padding: 15px;font-size: 16px;'>Dominio guardado.</div>");

                                }
                            }
                            if (result.domainresult.domaintype == "transfer")
                            {
                                if (result.domainresult.transfer == true)
                                {
                                    if (cart_lang == "english") {
                                        $("#tranferdomain-message").html("<br /><div class='alert alert-success text-success' style='padding: 15px;font-size: 16px;'><strong>Congratulations!</strong> Your domain is available to transfer and we've selected it for you. Please enter your EPP Code and proceed the order.</div>");
                                    } else {
                                        $("#tranferdomain-message").html("<br /><div class='alert alert-success text-success' style='padding: 15px;font-size: 16px;'><strong>Felicitaciones!</strong> Su dominio está disponible para transferir y lo hemos seleccionado por usted. Por favor ingrese su Código EPP y proceda con el pedido.</div>");

                                    }
                                    $("#owndomain1").css("border", "2px solid green");
                                    $("#epp-msg,#epp-text").show();
                                }
                                if (result.domainresult.transfer == false)
                                {
                                    if (cart_lang == "english") {
                                        $("#tranferdomain-message").html("<br /><div class='alert alert-danger text-danger' style='padding: 15px;font-size: 16px;'>Your domain does not appear to be registered yet.</div>");

                                    } else {
                                        $("#tranferdomain-message").html("<br /><div class='alert alert-danger text-danger' style='padding: 15px;font-size: 16px;'>Su dominio no parece estar registrado todavía.</div>");

                                    }
                                    $("#owndomain1").css("border", "2px solid red");
                                    $("#owndomain").val("");
                                    $("#summary-owndomain").remove();
                                    $("#transfer-box").hide();
                                }

                            }
                        }
                    }
                },
                dataType: "json"
            });
    //end ajax request

}
//end opcode function



$(document).on("change", ".trigger-update", function ()
{
    opcupdate();
});



$("#mydomain").click(function ()
{

    if ($("#owndomain").val() == '') {
        sweetAlert(":(", "Please type a domain name to transfer!", 'error');
        return;
    }
    $("#domaintransfer_block").show();
    $("#transfer-box").hide();
    if (cart_lang == "english") {
        $("#tranferdomain-message").html("<br/><div class='alert alert-info text-info'><strong>Searching...</strong><br /> <img src='onepagecart/assets/aso/images/ajax-loader.gif'></img></div>");

    } else {
        $("#tranferdomain-message").html("<br/><div class='alert alert-info text-info'><strong>buscando...</strong><br /> <img src='onepagecart/assets/aso/images/ajax-loader.gif'></img></div>");

    }
    opcupdate();
});



$(document).ready(function ()
{
    $("#domain_search").click(function ()
    {
        if ($("#domainrt").val() == '')
        {
            sweetAlert(":(", "Please type in a domain name to search for!", 'error');
            return;
        }
        $("#domain_block").show();
        $("#domain_select_block").hide();
        $("#regdomain-message").html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-info text-info'><center><strong>Searching...</strong><br /> <img src='images/loader.gif' alt='loader' style='width:50px;'></img></center></div></div>");
        $("#regdomain-message").show();
        
        $.ajax(
                {
                    type: "POST",
                    data:
                        {
                            domain: $("#domainrt").val() + $("#domaindropdown").val(),
                            a: "checkDomain"
                        },
                    url: "onepagecart/ajax/domainFunctions.php",
                     async: false,
                    success: function (result)
                    {
                        if(result.status==='valid')
                        {
                            $.ajax({
            
                            type: "POST",
                            data: {domain: $("#domainrt").val() + $("#domaindropdown").val(), type: "domain", a: "checkDomain", token: csrfToken},
                            url: "../cart.php",
                            async: false,
                            success: function (result)
                            {
                                var key = Object.keys(result.result)[0];
                                var result = result.result[key];
                                if ((typeof result != 'undefined') && result.length !== 0)
                                {
                                    if (result.status == "unknown")
                                    {
                                        $("#regdomain-message").html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-danger text-success' style='padding: 15px;font-size: 16px;'><center> Your domain is unavailable.</center></div></div>");
                                    } 
                                    else
                                    {
                                        if (result.isAvailable === true)
                                        {
                                            $("#domain_select_block").show();
                                            $("#domain_select").empty();
                                            var price = result.shortestPeriod.register.replace(/[^0-9\.]/g, '');
                                            
                                            $("#domain_select").append("<option data-year='"+result.shortestPeriod.period+"' value='" + result.domainName + "' data-price='" + price + "' data-tld='." + result.tld + "' selected data-short='" + result.idnSld + "'>"+ result.domainName + " ("+result.shortestPeriod.period+" year/s @ "+result.shortestPeriod.register+")</option>");
                                            
                                            $("#regdomain-message").html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-success text-success' style='padding: 15px;font-size: 16px;'><center><strong>Congratulations!</strong> Your domain is available! Click on Add To Cart and enter your billing information.</center></div></div>");
                                        }
                                        if (result.isAvailable === false)
                                        {
                                            $("#regdomain-message").html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-danger text-success' style='padding: 15px;font-size: 16px;'><center> This domain is already registered. Try some other domain name.</center></div></div>");
                                        }
                                    }
                                }

                            }, 
                            dataType: "json"});
                        }
                        else if(result.status==='invalid')
                        {
                            $("#regdomain-message").html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-danger text-success' style='padding: 15px;font-size: 16px;'><center> "+result.msg+"</center></div></div>");
                            
                        }
                        else
                        {
                            $("#regdomain-message").html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-danger text-success' style='padding: 15px;font-size: 16px;'><center> Your domain is unavailable.</center></div></div>");
                        }
                    },
                    dataType: "json"
                });
                
        
        
        $.ajax({
            type: "POST",
            data: {domain: $("#domainrt").val() + $("#domaindropdown").val(), type: "suggestions", a: "checkDomain", token: csrfToken},
            url: "../cart.php",
            async: false,
            success: function (result)
            {
                var result = result.result;
                if ((typeof result != 'undefined') && result.length !== 0)
                {
                    $.each(result, function (key, value)
                    {
                        if (value.isAvailable === true) {
                            var avail = 'success';
                        } 
                        else
                        {
                            var avail = 'error';
                        }
                        if (value.domainName == $("#domainrt").val() + $("#domaindropdown").val()) 
                        {
                            var domainselected = 'selected';
                        } else {
                            var domainselected = '';
                        }
                        var price = value.shortestPeriod.register.replace(/[^0-9\.]/g, '');
                        
                        $("#domain_select").append("<option data-year='"+value.shortestPeriod.period+"' value='" + value.domainName + "' data-price='" + price + "' data-tld='." + value.tld + "' " + domainselected + " data-short='" + value.idnSld + "'>"+ value.domainName + " ("+value.shortestPeriod.period+" year/s @ "+value.shortestPeriod.register+ ")</option>");
                        $("#domain_select").show();
                        $("#domain_results").show();
                    });
                }


            }, dataType: "json"});

    });


    $("#canceldomain").click(function ()
    {
        $("#regdomain-message,#domain_select_block").hide();
        $("#domain_select").val("");
        $("#domainrt").val("");
        opcupdate();
    });

    $("#savedomain").click(function ()
    {
        $('#domainrt').val($('#domain_select option:selected').attr('data-short'));
        $('#domain-regperiod').val($('#domain_select option:selected').attr('data-year'));
        
        tmptld = $('#domain_select option:selected').attr('data-tld');
        $('#domaindropdown option[value="' + tmptld + '"]').prop('selected', 'selected');
        $('#domain_select_block').hide();
        $('#regdomain-message').empty();
        
        if (cart_lang == "english")
        {
            $('#regdomain-message').html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-success text-success' style='padding: 15px;font-size: 16px;'><center><strong>Congratulations!</strong> Your domain is added to cart!</center></div></div>");
        }
        else
        {
            $('#regdomain-message').html("<div class='col-md-1 www no-padding'></div><div class='col-md-10 no-padding' style='width:90%'><div class='alert alert-success text-success' style='padding: 15px;font-size: 16px;'><center><strong>Felicitaciones!</strong> Su dominio se agrega al carro!</center></div></div>");
        }

        opcupdate();
    });

    /*----own domain click function----*/
    $("#owndomain1").change(function ()
    {
        $("#usedomain").click();
    });

    $("#usedomain").click(function ()
    {
        var fullDomain, tld;
        if ($("#owndomain1").val() == '')
        {           
            sweetAlert(":(", "Please type your existing domain name!", 'error');
            return;
        } 
        else
        {
            fullDomain = $("#owndomain1").val();
            
            tld = fullDomain.split(".");
            
            if (!Boolean(tld[1]))
            {
                if (cart_lang == "english")
                {
                    sweetAlert(":(", "Invalid TLD", 'error');
                }
                else {
                    sweetAlert(":(", "TLD no válido", 'error');
                }
                return;
            } 
            else
            {
                $.ajax(
                    {
                        type: "POST",
                        data:
                            {
                                domain: fullDomain,
                                a: "checkDomain"
                            },
                        url: "onepagecart/ajax/domainFunctions.php",
                        async: false,
                        success: function (result)
                        {
                            if(result.status==='valid')
                            {
                                opcupdate();
                            }
                            else if(result.status==='invalid')
                            {
                                $("#owndomain1").css("border", "2px solid red");
                                $("#owndomain-message").empty();
                                $("#tranferdomain-message").html("<br /><div class='alert alert-danger text-danger' style='padding: 15px;font-size: 16px;'>"+result.msg+"</div>");

                            }
                            else
                            {
                                $("#owndomain1").css("border", "2px solid red");
                                $("#owndomain-message").empty();
                                $("#tranferdomain-message").html("<br /><div class='alert alert-danger text-danger' style='padding: 15px;font-size: 16px;'>Your domain does not appear to be registered yet.</div>");
                            }
                        },
                        dataType: "json"
                    });
            }

        }

    });

    $("#transfer-checkbox").click(function ()
    {
        if ($(this).prop("checked"))
        {
            if ($("#owndomain").val() == '')
            {
                sweetAlert(":(", "Please type your existing domain name!", 'error');
                return;
            }
            else
            {
                var fullDomain = $("#owndomain1").val();
                var tld = fullDomain.split(".");
                if (!Boolean(tld[1]))
                {
                    sweetAlert(":(", "Invalid TLD", 'error');
                    return;
                } 
                else
                {
                    $.ajax(
                    {
                        type: "POST",
                        data:
                            {
                                domain: fullDomain,
                                a: "checkDomain"
                            },
                        url: "onepagecart/ajax/domainFunctions.php",

                        success: function (result)
                        {
                            if(result.status==='valid')
                            {
                                $("#tranferdomain-message").show();
                                $("#tranferdomain-message").html("<br/><div class='alert alert-info text-info'><center><strong>Searching...</strong><br /> <img src='images/loader.gif' alt='loader' style='width:50px;'></img></center></div>");
                                opcupdate();
                            }
                            else if(result.status==='invalid')
                            {
                                $("#tranferdomain-message").html("<br /><div class='alert alert-danger text-danger' style='padding: 15px;font-size: 16px;'>"+result.msg+"</div>");

                            }
                            else
                            {
                                $("#tranferdomain-message").html("<br /><div class='alert alert-danger text-danger' style='padding: 15px;font-size: 16px;'>Your domain does not appear to be registered yet.</div>");
                            }
                        },
                        dataType: "json"
                    });
                    
                }
            }
        } else
        {
            $("#epp-msg,#epp-text,#tranferdomain-message").hide();
        }
    });


});

function ucfirst(str) {
    str += '';
    var f = str.charAt(0).toUpperCase();
    return f + str.substr(1);
}
$(document).on('click', '#domainresult', function (e) {
    $("#domainrt").val($(this).attr('data-shortname'));
    $("#domaindropdown").val($(this).attr('data-tld'));
    return false;
});
$("#btnAlreadyRegistered").click(function () {
    $("input[name='loginemail']").prop('required', true);
    $("input[name='loginpassword']").prop('required', true);
    $("input[name='account_type']").val('existing');
    $("#containerNewUserSignup").slideUp('', function () {
        $("#containerExistingUserSignin").hide().removeClass('hidden').slideDown('', function () {
            $("#inputCustType").val('existing');
            $("#btnAlreadyRegistered").fadeOut('', function () {
                $("#btnNewUserSignup").removeClass('hidden').fadeIn();
            });
        });
    });
    $("#containerNewUserSecurity").hide();
    $('#containerNewUserSignup').find('input').each(function () {
        if (!$(this).prop('required')) {
        } else {
            $(this).removeAttr("required").addClass("requiredAttributeRemoved");
        }
    });
    if ($("#stateselect").attr('required')) {
        $("#stateselect").removeAttr('required').addClass('requiredAttributeRemoved');
    }
});
$("#btnNewUserSignup").click(function () {
    $("input[name='loginemail']").removeAttr("required");
    $("input[name='loginpassword']").removeAttr("required");
    $("input[name='account_type']").val('create');
    $(".requiredAttributeRemoved").prop('required', true);
    $(".requiredAttributeRemoved").removeClass("requiredAttributeRemoved");
    $("#containerExistingUserSignin").slideUp('', function () {
        $("#containerNewUserSignup").hide().removeClass('hidden').slideDown('', function () {
            $("#inputCustType").val('new');
            $("#containerNewUserSecurity").show();
            $("#btnNewUserSignup").fadeOut('', function () {
                $("#btnAlreadyRegistered").removeClass('hidden').fadeIn();
            });
        });
    });
});

$(document).ready(function () {
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

function removeConfig(e, n, o)
{
    jQuery("#inputRemoveItemType").val(e);
    jQuery("#inputRemoveItemRef").val(n);
    jQuery("#inputRemoveConfigRef").val(o);
    jQuery("#modalRemoveItem").modal("show");
}

function removeaddon(e, n, o)
{
    jQuery("#inputRemoveItemType").val(e); //Type
    jQuery("#inputRemoveItemRef").val(n); //product array id
    jQuery("#inputRemoveConfigRef").val(o); //addon array id
    jQuery("#modalRemoveItem").modal("show");
}

function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
    return(false);
}


function domainselect(domainboxid)
{
    $("#regdomain-message,#domain_select_block").hide();
    if (domainboxid == "newdomain")
    {
        $('#owndomain').val('');
        $('#owndomain1').val('');
        //$("#owndomain").css("border", "");
        $("#owndomain1").css("border", "");
        //$('#domaintransfer').prop('checked', false);
        //$('#transfer-box').hide();
        //$('#eppcode').val('');
        opcupdate();
    }
    if (domainboxid == "existingdomain")
    {
        $("#owndomain").css("border", "");
        $('#owndomain').val('');
        $('#domain_select').val('');
        //$('#domaintransfer').prop('checked', true);
        $('#domainrt').val('');
        //$('#transfer-box').hide();
        //$('#eppcode').val('');
        opcupdate();
    }
}


function selectLoginMode(data)
{
    if (data == 'alreadyRegistered')
    {
        $("#containerNewUserSignup").hide();
        $("#containerExistingUserSignin").show();
        $("#btnAlreadyRegistered").hide();
        $("#btnNewUserSignup").show();
        $("input[name='account_type']").val('existing');
    } else if (data == 'newUserSignup')
    {
        $("#containerExistingUserSignin").hide();
        $("#containerNewUserSignup").show();
        $("#btnAlreadyRegistered").show();
        $("#btnNewUserSignup").hide();
        $("input[name='account_type']").val('create');
    }
}

function onepagecartsubmitform(e, thisform)
{
    var status = 'no error';
    var loggedinstatus = 'no';
    if ($("#btnAlreadyRegistered").css("display") != 'none')
    {
        status = validateNewRegForm(e);
    }
    if ($("#btnNewUserSignup").css("display") != 'none')
    {
        status = validateAlreadyForm(e);

    }

    if ($("#clientalreadyloggedin").val() == 'block')
    {
        status = 'no error';
        var loggedinstatus = 'yes';

    }

    if ($("#accepttos").prop("checked") == false)
    {
        e.preventDefault();
        if (cart_lang == "english")
        {
            alert('You must agree to the terms of service.');
        } else {
            alert('Debes aceptar los términos del servicio.');
        }
        return false;
    }

    //start placing order
    if (status == 'no error')
    {
        $("#orderProcessingModal").modal({
            keyboard: false,
            backdrop: 'static',
        });
        $("#closemodal").hide();
        if (cart_lang == "english")
        {
            $("#orderProcessingModal .modal-body").html("<div class='alert alert-info' style='text-align: center'><strong>Just a minute!</strong><br /> We're processing your order. This can take up to 60 seconds, so just sit back and relax. <br /><img src='onepagecart/assets/aso/images/ajax-loader.gif'></img> <br /><strong>Please don't close your browser or hit the back button!</strong></div>");

        }
        else {
            $("#orderProcessingModal .modal-body").html("<div class='alert alert-info' style='text-align: center'><strong>Solo un minuto!</strong><br /> Estamos procesando tu pedido. Esto puede tomar hasta 60 segundos, así que simplemente siéntese y relájese. <br /><img src='onepagecart/assets/aso/images/ajax-loader.gif'></img> <br /><strong>&Auml;l&auml; sulje selaimeesi tai paina takaisin -n&auml;pp&auml;int&auml;!</strong></div>");

        }
        $("#orderProcessingModal .modal-footer").html("<button type='button' class='btn btn-warning'>&nbsp; &nbsp;</button>");

        var postData = $(thisform).serializeArray();
        var getVar = "?loggedin=" + loggedinstatus;
        if (cart_lang == "english")
        {
            $('#onepagecartplaceorder').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Place my Order');
        } else {
            $('#onepagecartplaceorder').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Hacer mi pedido');

        }
        $('#onepagecartplaceorder').attr('disabled', true);
        $.ajax({
            url: "onepagecart/ajax/placeorder.php" + getVar,
            type: "POST",
            data: postData,
            dataType: "json",
            success: function (data, textStatus, jqXHR)
            {
                if (cart_lang == "english")
                {
                    $('#onepagecartplaceorder').html('Place my Order');
                }
                else
                {
                    $('#onepagecartplaceorder').html('Plasați-mi ordinul');
                }
                $('#onepagecartplaceorder').removeAttr('disabled');
                //data: return data from server
                if (data.status == 'success')
                {
                    $("#orderProcessingModal .modal-footer").html("");
                    $("#closemodal").show();
                    // Do all the success fun here.
                    $("#orderProcessingModal .modal-body").empty();
                    if (cart_lang == "english") {
                        $("#orderProcessingModal .modal-body").append("<div class='alert alert-success'><strong>Success!</strong> Your order has been successfully completed!</div>");

                    }
                    else {
                        $("#orderProcessingModal .modal-body").append("<div class='alert alert-success'><strong>Éxito!</strong> Su orden ha sido completada satisfactoriamente!</div>");

                    }
                    
                    if (data.paytype == 'paypal')
                    {
                        if (!data.fraud)
                        {
                            if (cart_lang == "english") {
                                $("#orderProcessingModal .modal-body").append("<div class='alert alert-info'><strong>Hang Tight!</strong> We're redirecting you over to PayPal to finish your order!</div>");

                            }
                            else {
                                $("#orderProcessingModal .modal-body").append("<div class='alert alert-info'><strong>Aguanta!</strong>Te estamos redirigiendo a PayPal para completar tu pedido!</div>");

                            }
                            $(".postcontainer").append(data.paypal);
                        } 
                        else
                        {
                            if (cart_lang == "english") {
                                $("#orderProcessingModal .modal-body").append("<div class='alert alert-warning'><strong>Something went Wrong!</strong> Please contact our support team.</div>");
                            }
                            else {
                                $("#orderProcessingModal .modal-body").append("<div class='alert alert-warning'><strong>Algo salió mal!</strong> Por favor contacta a nuestro equipo de soporte.</div>");

                            }
                            $("#closemodal").show();
                        }
                    }
                    else if (data.paytype == 'payu')
                    {
                        if (cart_lang == "english") 
                        {
                            $("#orderProcessingModal .modal-body").append("<div class='alert alert-info'><strong>Hang Tight!</strong> We're taking you to invoice</div>");
                        }
                        else 
                        {
                            $("#orderProcessingModal .modal-body").append("<div class='alert alert-info'><strong>Aguanta!</strong>Lo llevaremos a facturar</div>");
                        }
                        window.location.href = data.redirecturl;
                    }
                    else
                    {
                        if (cart_lang == "english") 
                        {
                            $("#orderProcessingModal .modal-body").append("<div class='alert alert-info'><strong>Hang Tight!</strong> We're taking you to invoice</div>");
                        }
                        else 
                        {
                            $("#orderProcessingModal .modal-body").append("<div class='alert alert-info'><strong>Aguanta!</strong>Lo llevaremos a facturar</div>");
                        }
                        window.location.href = data.redirecturl;
                    }

                }
                else
                {
                    $("#orderProcessingModal .modal-body").empty();
                    $("#closemodal").show();
                    $("#orderProcessingModal .modal-footer").html("<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>");
                    // Expand the errors from the array, probably via .each
                    $.each(data.errors, function (k, val)
                    {
                        if(val.message && val.message!='undefined')
                        {
                            $("#orderProcessingModal .modal-body").append("<div class='alert alert-danger'><strong>Error:</strong> " + val.message + "</div>");
                        }
                        
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                if (cart_lang == "english") {
                    $('#onepagecartplaceorder').html('Place my Order');
                    $('#onepagecartplaceorder').removeAttr('disabled');
                    $("#orderProcessingModal .modal-footer").html("<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>");
                    $("#orderProcessingModal .modal-body").html("<div class='alert alert-danger'><strong>Error:</strong> An error has occured with your order. Please contact customer support, or try your order again shortly.</div>");
                    $("#closemodal").show();
                }
                else {
                    $('#onepagecartplaceorder').html('Hacer mi pedido');
                    $('#onepagecartplaceorder').removeAttr('disabled');
                    $("#orderProcessingModal .modal-footer").html("<button type='button' class='btn btn-danger' data-dismiss='modal'>Cerca</button>");
                    $("#orderProcessingModal .modal-body").html("<div class='alert alert-danger'><strong>Virhe:</strong> Se ha producido un error con su pedido. Por favor, póngase en contacto con atención al cliente o vuelva a intentar su pedido en breve.</div>");
                    $("#closemodal").show();
                }

            }
        });
        return false;
    }
    //end placing order
}


function validateNewRegForm(e)
{
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var status = 'no error';
    var names = $('#firstname').val();
    var company = $('#lastname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();

    var inputVal = new Array(names, company, email, password, cpassword);

    if (inputVal[3] == "")
    {
        e.preventDefault();
        $('#password').parent().addClass('has-error');
        $('#password').focus();
        status = 'error';
    }

    if (inputVal[4] == "")
    {
        e.preventDefault();
        $('#cpassword').parent().addClass('has-error');
        $('#cpassword').focus();
        status = 'error';
    } else if (password != cpassword)
    {
        e.preventDefault();
        $('#cpassword').parent().addClass('has-error');
        $('#cpassword').focus();
        status = 'error';
    }

    if (inputVal[2] == "")
    {
        e.preventDefault();
        $('#email').parent().addClass('has-error');
        $('#email').focus();
        status = 'error';
    } 
    else if (!emailReg.test(email))
    {
        e.preventDefault();
        $('#email').parent().addClass('has-error');
        $('#email').focus();
        status = 'error';
    }
    else
    {
        $('#email').parent().removeClass('has-error');
    }
    if (inputVal[1] == "")
    {
        e.preventDefault();
        $('#lastname').parent().addClass('has-error');
        $('#lastname').focus();
        status = 'error';
    }
    else
    {
        $('#lastname').parent().removeClass('has-error');
    }

    if (inputVal[0] == "")
    {
        e.preventDefault();
        $('#firstname').parent().addClass('has-error');
        $('#firstname').focus();
        status = 'error';
    }
    else
    {
        $('#firstname').parent().removeClass('has-error');
    }
    
    /*---client custom field----*/
    $(".clientcustomfield").each(function()
    {
        if($(this).hasClass("required"))
        {
            if($(this).val()=='')
            {
                e.preventDefault();
                $(this).parent().addClass('has-error');
                $(this).focus();
                status = 'error';
            }
            else
            {
                $(this).parent().removeClass('has-error');
            }
        }
    });
    
    return status;

}

function validateAlreadyForm(e)
{
    var status = 'no error';
    var email = $('#inputLoginEmail').val();
    var password = $('#inputLoginPassword').val();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (email == "")
    {
        e.preventDefault();
        $('#inputLoginEmail').parent().addClass('has-error');
        $('#inputLoginEmail').focus();
        status = 'error';
    } else if (!emailReg.test(email))
    {
        e.preventDefault();
        $('#inputLoginEmail').parent().addClass('has-error');
        $('#inputLoginEmail').focus();
        status = 'error';
    }

    if (password == "")
    {
        e.preventDefault();
        $('#inputLoginPassword').parent().addClass('has-error');
        $('#inputLoginPassword').focus();
        status = 'error';
    }
    return status;

}


function slectpaymentmethod(paymenttype)
{
    var selectedPaymentMethod = paymenttype;
    var gatewayid = $("#gatewayid").val();
    $("#paymentname").val(paymenttype);
    
    var frm = jQuery('#placeorder'),
            newCcForm = jQuery('#frmNewCc'),
            paymentForm = jQuery('#frmPayment'),
            adminCreditCard = jQuery('#frmCreditCardDetails');

    if (paymenttype.length)
    {
        if (gatewayid)
        {
            jQuery('#creditCardInputFields').remove();
            return '';
        }
        var newOrExisting = jQuery('input[name="ccinfo"]');

        if (selectedPaymentMethod == 'stripe')
        {
            enable_stripe();
            if (newOrExisting.val() == 'useexisting')
            {
                frm.off('submit', validateStripe);
            }
        }

        
        if (selectedPaymentMethod == 'stripe' || selectedPaymentMethod == 'paypalpaymentspro')
        {
            jQuery("#creditCardInputFields").fadeIn();
            
            if (selectedPaymentMethod == 'stripe')
            {
               enable_stripe();
            }
            else
            {
                disable_stripe();
            }
            
        }
        else
        {
            jQuery("#creditCardInputFields").fadeOut();
            
        }
        

        newOrExisting.on('ifChecked change', function (e) {
            frm.off('submit', validateStripe);
            if (selectedPaymentMethod == 'stripe') {
                if (jQuery(this).val() != 'useexisting') {
                    //frm.on('submit', validateStripe);
                }
            } else {
                // onepagecartsubmitform(e,this);
                //              return false;
            }
        });
    }
    else if (newCcForm.length)
    {
        // Remove name from CC Input fields, but add stripe-data
        newCcForm.find('#inputCardType').removeAttr('name').parents('div.form-group').remove();
        newCcForm.find('#inputCardNumber').removeAttr('name').attr('data-stripe', 'number').payment('formatCardNumber');
        newCcForm.find('#inputCardExpiry').removeAttr('name').attr('data-stripe', 'exp_month');
        newCcForm.find('select[name="ccexpiryyear"]').removeAttr('name').attr('data-stripe', 'exp_year');
        newCcForm.find('#inputCardCVV').removeAttr('name').attr('data-stripe', 'cvc').payment('formatCardCVC');

        newCcForm.on('submit', validateNewCcStripe);
    }
    else if (paymentForm.length)
    {
        if (jQuery('input[name="ccinfo"]:checked').val() == 'new') {
            enable_payment_stripe();
        } else {
            paymentForm.find('#inputCardCvv').parents('div.form-group').hide('fast');
        }
        jQuery('input[name="ccinfo"]').on('change', function () {
            if (jQuery(this).val() == 'new') {
                enable_payment_stripe();
            } else {
                paymentForm.find('#inputCardCvv').parents('div.form-group').hide('fast');
                paymentForm.off('submit', validatePaymentStripe);
            }
        });
        checkApplePayAvailableForPayment();
    } else if (adminCreditCard.length) {
        adminCreditCard.find('#cctype').removeAttr('name').parents('tr#rowCardType').hide('fast');
        adminCreditCard.find('#inputCardNumber').removeAttr('name').attr('data-stripe', 'number');
        adminCreditCard.find('#inputCardMonth').removeAttr('name').attr('data-stripe', 'exp_month');
        adminCreditCard.find('#inputCardYear').removeAttr('name').attr('data-stripe', 'exp_year');
        adminCreditCard.find('#cardcvv').removeAttr('name').attr('data-stripe', 'cvc');
        adminCreditCard.on('submit', validateAdminStripe);
    }


}



function validateNewCcStripe(event) {
    var newCcForm = jQuery('#frmNewCc');
    event.preventDefault();
    jQuery('#btnSubmitNewCard').attr('disabled', 'disabled').addClass('disabled');
    Stripe.card.createToken(newCcForm, stripeNewCcResponseHandler);
}

function stripeNewCcResponseHandler(status, response) {
    var newCcForm = jQuery('#frmNewCc');
    if (response.error) { // Problem!
        // Show the errors on the form:
        $("#orderProcessingModal").modal({
            keyboard: false,
            backdrop: 'static',
        });
        $("#orderProcessingModal .modal-body").empty();
        $("#closemodal").show();
        $("#orderProcessingModal .modal-footer").html("<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>");
        $("#orderProcessingModal .modal-body").append("<div class='alert alert-danger'><strong>Error:</strong> " + response.error.message + "</div>");
        jQuery('#btnSubmitNewCard').removeAttr('disabled').removeClass('disabled'); // Re-enable submission

    } else { // Token was created!
        newCcForm.append(jQuery('<input type="hidden" name="stripeToken">').val(response.id));
        // Submit the form:
        newCcForm.off('submit', validateNewCcStripe);
        newCcForm.find('#btnSubmitNewCard').removeAttr('disabled').removeClass('disabled')
                .click().addClass('disabled').attr('disabled', 'disabled');
    }
}

function enable_stripe()
{
    var frm = jQuery('#placeorder');
    frm.find('#inputAddress1').attr('data-stripe', 'address_line1');
    frm.find('#inputAddress2').attr('data-stripe', 'address_line2');
    frm.find('#inputState').attr('data-stripe', 'address_state');
    frm.find('#inputCountry').attr('data-stripe', 'address_country');
    frm.find('#inputPostcode').attr('data-stripe', 'address_zip');
    frm.find('#cctype').removeAttr('name');
    frm.find('#inputCardCvvExisting').removeAttr('name');
    frm.find('#inputCardNumber').removeAttr('name').attr('data-stripe', 'number');
    //frm.find('#inputCardExpiry').removeAttr('name').attr('data-stripe', 'exp');
    frm.find('#exp-month').removeAttr('name').attr('data-stripe', 'exp_month');
    frm.find('#exp-year').removeAttr('name').attr('data-stripe', 'exp_year');
    frm.find('#inputNameOnCard').removeAttr('name').attr('data-stripe', 'name');

    frm.find('#inputCardCVV').removeAttr('name').attr('data-stripe', 'cvc');
    var cardTypeInput = frm.find('#cardType');
    if (cardTypeInput.length) {
        frm.find('#cardType').parents('div.col-sm-6').slideUp('fast', function () {
            frm.find('#inputCardNumber').parents('div.col-sm-6').toggleClass('col-sm-6 col-sm-12');
        });
    } else {
        //legacy template
        frm.find('#cctype').parents('div.new-card-info').slideUp('fast');
        frm.find('#cctype').parents('tr.newccinfo').slideUp('fast');
    }

    //frm.on('submit', validateStripe);
}

function disable_stripe() {
    var frm = jQuery('#placeorder');

    frm.find('#inputCardCvvExisting').attr('name', 'cccvvexisting');
    frm.find('#inputCardNumber').removeAttr('data-stripe').attr('name', 'ccnumber');
    frm.find('#inputCardExpiry').removeAttr('data-stripe').attr('name', 'ccexpirydate');
    frm.find('#inputCardCVV').removeAttr('data-stripe').attr('name', 'cccvv');
    frm.find('#cctype').attr('name', 'cctype');
    var cardTypeInput = frm.find('#cardType');
    if (cardTypeInput.length) {
        frm.find('#inputCardNumber').parents('div.col-sm-12').toggleClass('col-sm-6 col-sm-12');
        frm.find('#cardType').parents('div.col-sm-6').slideDown('fast');
    } else {
        //legacy template
        frm.find('#cctype').parents('div.new-card-info').slideDown('fast');
        frm.find('#cctype').parents('tr.newccinfo').slideDown('fast');
    }

    frm.off('submit', validateStripe);
}

function enable_payment_stripe() {
    var paymentForm = jQuery('#frmPayment');
    paymentForm.find('#inputAddress1').attr('data-stripe', 'address_line1');
    paymentForm.find('#inputAddress2').attr('data-stripe', 'address_line2');
    paymentForm.find('#inputCity').attr('data-stripe', 'address_city');
    paymentForm.find('#inputState').attr('data-stripe', 'address_state');
    paymentForm.find('#inputPostcode').attr('data-stripe', 'address_zip');
    paymentForm.find('#inputCountry').attr('data-stripe', 'address_country');
    paymentForm.find('#inputPostcode').attr('data-stripe', 'address_zip');
    paymentForm.find('#cctype').removeAttr('name').parents('div.form-group').remove();
    paymentForm.find('#inputCardNumber').removeAttr('name').attr('data-stripe', 'number').payment('formatCardNumber');
    paymentForm.find('#inputCardExpiry').removeAttr('name').attr('data-stripe', 'exp_month');
    paymentForm.find('#inputCardExpiryYear').removeAttr('name').attr('data-stripe', 'exp_year');
    paymentForm.find('#inputCardCvv').removeAttr('name')
            .attr('data-stripe', 'cvc').parents('div.form-group').show('fast').payment('formatCardCVC');
    paymentForm.on('submit', validatePaymentStripe);
}

function validatePaymentStripe(event) {
    var paymentForm = jQuery('#frmPayment');
    event.preventDefault();
    jQuery('#btnSubmit').attr('disabled', 'disabled').addClass('disabled');
    Stripe.card.createToken(paymentForm, stripePaymentResponseHandler);
    //    return false;
}

function stripePaymentResponseHandler(status, response) {
    var paymentForm = jQuery('#frmPayment');
    if (response.error) { // Problem!
        $("#orderProcessingModal").modal({
            keyboard: false,
            backdrop: 'static',
        });
        $("#orderProcessingModal .modal-body").empty();
        $("#closemodal").show();
        $("#orderProcessingModal .modal-footer").html("<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>");
        $("#orderProcessingModal .modal-body").append("<div class='alert alert-danger'><strong>Error:</strong> " + response.error.message + "</div>");
        jQuery('#btnSubmit').removeAttr('disabled').removeClass('disabled')
                .find('span').toggleClass('hidden'); // Re-enable submission

    } else { // Token was created!
        //        paymentForm.find('.gateway-errors').text('').addClass('hidden');
        // Insert the token ID into the form so it gets submitted to the server:
        paymentForm.append(jQuery('<input type="hidden" name="stripeToken">').val(response.id));


    }
}
function validateAdminStripe(event) {
    var adminCreditCard = jQuery('#frmCreditCardDetails');
    event.preventDefault();
    adminCreditCard.find('#btnSaveChanges').attr('disabled', 'disabled').addClass('disabled');
    Stripe.card.createToken(adminCreditCard, stripeAdminResponseHandler);
    //    return false;
}
function stripeAdminResponseHandler(status, response)
{
    var adminCreditCard = jQuery('#frmCreditCardDetails');
    if (response.error) { // Problem!
        // Show the errors on the form:
        $("#orderProcessingModal").modal({
            keyboard: false,
            backdrop: 'static',
        });
        $("#orderProcessingModal .modal-body").empty();
        $("#closemodal").show();
        $("#orderProcessingModal .modal-footer").html("<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>");
        $("#orderProcessingModal .modal-body").append("<div class='alert alert-danger'><strong>Error:</strong> " + response.error.message + "</div>");
        adminCreditCard.find('#btnSaveChanges').removeAttr('disabled').removeClass('disabled'); // Re-enable submission
    } else {
        adminCreditCard.append(jQuery('<input type="hidden" name="stripeToken">').val(response.id));
        adminCreditCard.off('submit', validateAdminStripe);
        adminCreditCard.find('#btnSaveChanges').removeAttr('disabled').removeClass('disabled')
                .click().addClass('disabled').attr('disabled', 'disabled');
    }
}





jQuery(document).ready(function ()
{

    jQuery("#placeorder").submit(function (e)
    {
        e.preventDefault();
        var selectedPaymentMethod = jQuery("#paymentname").val();

        if (selectedPaymentMethod != 'stripe')
        {
            onepagecartsubmitform(e, this);
        }
        else
        {
            var status = 'no error';
            if ($("#btnAlreadyRegistered").css("display") != 'none')
            {
                status = validateNewRegForm(e);
            }
            if ($("#btnNewUserSignup").css("display") != 'none')
            {
                status = validateAlreadyForm(e);


            }

            if ($("#clientalreadyloggedin").val() == 'block')
            {
                status = 'no error';

            }

            if ($("#accepttos").prop("checked") == false)
            {
                e.preventDefault();
                status = 'error';
                if (cart_lang == "english")
                {
                    alert('You must agree to the terms of service.');
                }
                else
                {
                    alert('Debes aceptar los términos del servicio.');
                }
            }
            if (status == 'no error')
            {
                if (cart_lang == "english")
                {
                    $('#onepagecartplaceorder').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Place my Order');
                } else {
                    $('#onepagecartplaceorder').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Hacer mi pedido');

                }
                $('#onepagecartplaceorder').attr('disabled', true);
                validateStripe(e);
            }

        }

    });
});


function emptySession()
{
    $.ajax(
            {
                url: 'onepagecart/ajax/ajax.php',
                data: {
                    emptySession: "true"
                },
                dataType: 'json',
                success: function (result)
                {
                    $("#producttoadd").val('add')
                    opcupdate();
                },
                error: function (xhr, status, error)
                {

                }
            });
}
