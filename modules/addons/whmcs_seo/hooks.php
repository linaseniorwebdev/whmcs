<?php
// *************************************************************************
// *                                                                       *
// * WHMCS SEO Module						   							   *
// * Copyright (c) WHMCS Module Shop. All Rights Reserved,                 *
// * Release Date: 26th January 2019                                       *
// * Version 2.0.2 Stable                                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: contact@whmcsmoduleshop.com                                    *
// * Website: https://whmcsmoduleshop.com                                  *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.  This software  or any other *
// * copies thereof may not be provided or otherwise made available to any *
// * other person.  No title to and  ownership of the  software is  hereby *
// * transferred.                                                          *
// *                                                                       *
// * You may not reverse  engineer, decompile, defeat  license  encryption *
// * mechanisms, or  disassemble this software product or software product *
// * license.  WHMCS Module Shop may terminate this license if you don't   *
// * comply with any of the terms and conditions set forth in our end user *
// * license agreement (EULA).  In such event,  licensee  agrees to return *
// * licensor  or destroy  all copies of software  upon termination of the *
// * license.                                                              *
// *                                                                       *
// * Please see the EULA file for the full End User License Agreement.     *
// *                                                                       *
// *************************************************************************

require_once(dirname(__FILE__) . '/Seo.php');

add_hook('ClientAreaPage', 1000, function($vars){

    $seo = Seo::getInstance();

    $seo->forceRedirects($vars);

    $item = $seo->getItemByRequest();

    if($item->getFieldValue('title') != ''){
        $vars['pagetitle'] = $item->getFieldValue('title');
    }

    add_hook('ClientAreaHeadOutput', 1000, function() use ($seo, $item){
       return $seo->outputMetaTags($item);
    });

    return $vars;
});
