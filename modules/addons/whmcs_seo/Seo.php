<?php
use Illuminate\Database\Capsule\Manager as Capsule;
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
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

require_once(dirname(__FILE__) . '/SeoItem.php');
require_once(dirname(__FILE__) . '/SeoItemField.php');

class Seo{

    public static $instance = null;

    /**
     * @return Seo
     */
    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new self();
        }
        return static::$instance;
    }

    public function __construct(){}

    public static function saveItem($item){
        $model = SeoItem::create([
            'type' => $item['type'],
            'rel_id' => $item['rel_id']
        ]);
        foreach($item['fields'] as $field => $languages){

            //not a language string
            if(!is_array($languages)){
                $model->fields()->create([
                    'type' => $field,
                    'language' => '',
                    'value' => $languages
                ]);
                continue;
            }

            foreach($languages as $language => $value){
                $model->fields()->create([
                    'type' => $field,
                    'language' => $language,
                    'value' => $value
                ]);
            }
        }
    }

    public static function updateItem($item){
        $model = SeoItem::find($item['id']);
        $model->type = $item['type'];
        $model->rel_id = $item['rel_id'];
        $model->save();
        $model->fields()->delete();
        foreach($item['fields'] as $field => $languages){

            //not a language string
            if(!is_array($languages)){
                $model->fields()->create([
                    'type' => $field,
                    'language' => '',
                    'value' => $languages
                ]);
                continue;
            }

            foreach($languages as $language => $value){
                $model->fields()->create([
                    'type' => $field,
                    'language' => $language,
                    'value' => $value
                ]);
            }
        }
    }

    public function deleteItem($id){
        SeoItem::find($id)->delete();
    }

    public function getItems(){
        return $this->mapItems(SeoItem::with(['fields'])->get());
    }

    private function mapItems($results){
        return (new \Illuminate\Support\Collection($results))->map(function($item){
            $return = $item->toArray();
            $fields = $return['fields'];
            $return['fields'] = [];
            foreach($fields as $field){
                if(!isset($return['fields'][$field['type']])){
                    $return['fields'][$field['type']] = [];
                }
                if($field['language'] == '0' || $field['language'] == ''){
                    $return['fields'][$field['type']] = htmlspecialchars_decode($field['value']);
                    continue;
                }
                $return['fields'][$field['type']][$field['language']] = htmlspecialchars_decode($field['value']);
            }
            return $return;
        })->toArray();
    }

    public function saveSettings(){
        add_hook('AdminAreaPage', 1, function($vars){
            if(!empty($_POST) && isset($_POST['save']) && $_POST['save'] == true && is_array($_POST['data'])){

                try{
                    $data = $_POST['data'];

                    foreach((array) $data['items'] as $item){
                        if(isset($item['id'])){
                            $this->updateItem($item);
                        }else{
                            $this->saveItem($item);
                        }
                    }

                    foreach((array) $data['items_to_delete'] as $item){
                        $this->deleteItem($item);
                    }

                    $this->saveModuleSettings($data['settings']);

                    echo json_encode([
                        'success' => true,
                        'items' => $this->getItems(),
                        'settings' => $this->getSettings()
                    ]);
                    exit();

                } catch (Exception $e){

                    echo json_encode([
                        'success' => false,
                        'error' => $e->getMessage()
                    ]);
                    exit();

                }
            }
        });
    }

    public function getSettings(){
        $db = Capsule::table('tbladdonmodules')->where('module', '_seo_settings')->get(['setting', 'value']);
        $settings = [];
        foreach($db as $item){
            $settings[$item->setting] = (json_decode($item->value) == null) ? $item->value : json_decode($item->value);
        }
        return $settings;
    }

    public function saveSetting($name, $value){
        Capsule::table('tbladdonmodules')->where('module', '_seo_settings')->where('setting', $name)->delete();
        Capsule::table('tbladdonmodules')->insert([
            'module' => '_seo_settings',
            'setting' => $name,
            'value' => $this->maybeEncode($value)
        ]);
        return $this;
    }

    private function saveModuleSettings($settings = []){
        Capsule::table('tbladdonmodules')->where('module', '_seo_settings')->delete();
        $_settings = [];
        foreach((array) $settings as $key => $value){
            $_settings[] = [
                'module' => '_seo_settings',
                'setting' => $key,
                'value' => $this->maybeEncode($value)
            ];
        }
        Capsule::table('tbladdonmodules')->insert($_settings);
    }

    private function maybeEncode($value){
        if(!is_string($value) && !is_numeric($value)){
            return json_encode($value);
        }

        return $value;
    }

    public function getItemByRequest(){
        global $CONFIG;
        $item = null;

        $path = parse_url($CONFIG['SystemURL'], PHP_URL_PATH);
        $urlWithQuery = ltrim($_SERVER['REQUEST_URI'], $path . '/');
        $urlWithoutQuery = explode('?', $urlWithQuery)[0];

        //is announcements
        if(strpos($urlWithoutQuery, 'announcements') !== false && isset($_GET['id']) && is_numeric($_GET['id'])){
            $item = $this->getAnnouncementItem($_GET['id']);
        }

        //is kb category
        if(strpos($urlWithoutQuery, 'knowledgebase') !== false && isset($_GET['action']) && $_GET['action'] == 'displaycat' && isset($_GET['catid']) && is_numeric($_GET['catid'])){
            $item = $this->getKbCategoryItem($_GET['catid']);
        }

        //is kb tag
        if(strpos($urlWithoutQuery, 'knowledgebase') !== false && isset($_GET['tag']) && $_GET['tag'] != ''){
            $item = $this->getKbTagItem($_GET['tag']);
        }

        //is kb article
        if(strpos($urlWithoutQuery, 'knowledgebase') !== false && isset($_GET['action']) && $_GET['action'] == 'displayarticle' && isset($_GET['id']) && is_numeric($_GET['id'])){
            $item = $this->getKbArticleItem($_GET['id']);
        }

        //is download category
        if(strpos($urlWithoutQuery, 'downloads') !== false && isset($_GET['action']) && $_GET['action'] == 'displaycat' && isset($_GET['catid']) && is_numeric($_GET['catid'])){
            $item = $this->getDownloadItem($_GET['catid']);
        }

        //is cart group
        if(strpos($urlWithoutQuery, 'cart') !== false && isset($_GET['gid']) && is_numeric($_GET['gid'])){
            $item = $this->getCartGroupItem($_GET['gid']);
        }

        if(!$item){
            $item = $this->getItemByPage($urlWithoutQuery, $urlWithQuery);
        }

        if(!$item){
            $item = new SeoItem();
        }

        $item->setSettings($this->getSettings());

        global $CONFIG;

        $item->setLanguage(isset($_SESSION['Language']) ? $_SESSION['Language'] : $CONFIG['Language']);

        return $item;
    }

    private function getAnnouncementItem($id){
        return SeoItem::with('fields')
            ->where('type', 'announcement')
            ->where('rel_id', $id)
            ->first();
    }

    private function getKbCategoryItem($id){
        return SeoItem::with('fields')
            ->where('type', 'kbcat')
            ->where('rel_id', $id)
            ->first();
    }

    private function getKbTagItem($id){
        return SeoItem::with('fields')
            ->where('type', 'kbtag')
            ->where('rel_id', $id)
            ->first();
    }

    private function getKbArticleItem($id){
        return SeoItem::with('fields')
            ->where('type', 'kbarticle')
            ->where('rel_id', $id)
            ->first();
    }

    private function getDownloadItem($id){
        return SeoItem::with('fields')
            ->where('type', 'dlcat')
            ->where('rel_id', $id)
            ->first();
    }

    private function getCartGroupItem($id){
        return SeoItem::with('fields')
            ->where('type', 'cartgroup')
            ->where('rel_id', $id)
            ->first();
    }

    private function getItemByPage($urlWithoutQuery = '', $urlWithQuery = ''){
        $item = SeoItem::with('fields')
            ->where('type', 'page')
            ->where('rel_id', $urlWithQuery)
            ->first();

        if(!$item){
            $item = SeoItem::with('fields')
                ->where('type', 'page')
                ->where('rel_id', $urlWithoutQuery)
                ->first();
        }
        return $item;
    }

    public function forceRedirects($vars){
        global $CONFIG;
        if($CONFIG['SEOFriendlyUrls'] == 'on' && strtolower($this->getSettings()['force_seo']) == 'yes') {

            if ($vars['filename'] == 'knowledgebase' && preg_match("#action=displayarticle#", $_SERVER['REQUEST_URI'])) {
                $url = $CONFIG['SystemURL'] . '/knowledgebase/' . $_GET['id'] . '/' . getmodrewritefriendlystring(Capsule::table('tblknowledgebase')->where('id', $_GET['id'])->value('title')) . '.html';
                header("Location: " . $url, 301);
                exit();
            }

            if ($vars['filename'] == 'knowledgebase' && preg_match("#action=displaycat#", $_SERVER['REQUEST_URI'])) {
                $url = $CONFIG['SystemURL'] . '/knowledgebase/' . $_GET['catid'] . '/' . getmodrewritefriendlystring(Capsule::table('tblknowledgebasecats')->where('id', $_GET['catid'])->value('name'));
                header("Location: " . $url, 301);
                exit();
            }

            if ($vars['filename'] == 'announcements' && preg_match("#id=#", $_SERVER['REQUEST_URI'])) {
                $url = $CONFIG['SystemURL'] . '/announcements/' . $_GET['id'] . '/' . getmodrewritefriendlystring(Capsule::table('tblannouncements')->where('id', $_GET['id'])->value('title')) . '.html';
                header("Location: " . $url, 301);
                exit();
            }

            if ($vars['filename'] == 'downloads' && preg_match("#action=displaycat#", $_SERVER['REQUEST_URI'])) {
                $url = $CONFIG['SystemURL'] . '/downloads/' . $_GET['catid'] . '/' . getmodrewritefriendlystring(Capsule::table('tbldownloadcats')->where('id', $_GET['catid'])->value('name'));
                header("Location: " . $url, 301);
                exit();
            }

            if ($vars['filename'] == 'knowledgebase' || $vars['filename'] == 'announcements' || $vars['filename'] == 'downloads') {
                if (preg_match("#.php#", $_SERVER['REQUEST_URI']) && !isset($_REQUEST['page'])) {
                    $url = $CONFIG['SystemURL'] . '/' . $vars['filename'];
                    header("Location: " . $url, 301);
                    exit();
                }
            }
        }
    }

    public function outputMetaTags($item){
        return $item->outputMetaTags();
    }
}
