<?php
/**
 * Example Hook Function
 *
 * Please refer to the documentation @ http://docs.whmcs.com/Hooks for more information
 * The code in this hook is commented out by default. Uncomment to use.
 *
 * @package    WHMCS
 * @author     WHMCS Limited <development@whmcs.com>
 * @copyright  Copyright (c) WHMCS Limited 2005-2013
 * @license    http://www.whmcs.com/license/ WHMCS Eula
 * @version    $Id$
 * @link       http://www.whmcs.com/
 */

/*

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function create_forum_account($vars) {

    $firstname = $vars['firstname'];
    $lastname = $vars['lastname'];
    $email = $vars['email'];

    // Run code to create remote forum account here...

}

add_hook("ClientAdd",1,"create_forum_account");

*/


add_hook('ClientAreaPage', 1, function($templateVariables)
{
    $command = "getproducts";
	$adminuser = "Your_user_name";
	$results = localAPI($command,$values,$adminuser);
 
    $currency = getCurrency($userid);
	//$file = fopen(getcwd()."/includes/hooks/fetch_product".date("Y-m-d H:i:s").".txt","w");
	
	$products = array();
	foreach($results['products']['product'] as $product)
	{
		$products[$product['gid']][$product['pid']]=$product;
	}
	
	
	/*fwrite($file,"products:".print_r($products,true));
	fclose($file);*/
	// Define new variables to send to the template.
    return array(
        'productsList' => $products,
		'curr' => $currency
    );
});