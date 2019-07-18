<?php
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Created by PhpStorm.
 * User: leemason
 * Date: 10/02/2017
 * Time: 12:37
 */
class SeoItem extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'mod_whmcs_seo_items';

    protected $fillable = [
        'type',
        'rel_id'
    ];

    protected $settings = [];

    protected $language = 'english';

    protected $prepared = false;

    protected $preparedFields = [];

    public function fields()
    {
        return $this->hasMany(SeoItemField::class, 'rel_id');
    }

    public function setSettings($settings = []){
        $this->settings = $settings;
    }

    public function setLanguage($language = 'english'){
        $this->language = $language;
    }

    private function prepareFields(){
        if($this->prepared == true){
            return;
        }
        foreach($this->fields->toArray() as $field){
            if($field['language'] == ''){
                $this->preparedFields[$field['type']] = htmlspecialchars_decode(stripcslashes(strip_tags($field['value'])));
            }else{
                $this->preparedFields[$field['type']][$field['language']] = htmlspecialchars_decode(stripcslashes(strip_tags($field['value'])));
            }
        }
        $this->prepared = true;
    }

    public function getFieldValue($field = ''){
        $this->prepareFields();
        if(!isset($this->preparedFields[$field])){
            return;
        }
        if(is_array($this->preparedFields[$field]) && !empty($this->preparedFields[$field])){
            if(isset($this->preparedFields[$field][$this->language]) && $this->preparedFields[$field][$this->language] != ''){
                return $this->preparedFields[$field][$this->language];
            }
            return array_values($this->preparedFields[$field])[0];
        }elseif($this->preparedFields[$field] != ''){
            return $this->preparedFields[$field];
        }
    }

    public function getUrl(){

        global $CONFIG;
        $whmcsurl = rtrim($CONFIG['SystemURL'], '/').'/';
        $seourls = ($CONFIG['SEOFriendlyUrls'] == 'on') ? true : false;

        //add canonical for all support pages to ensure linkage
        if(!$this->rel_id && $seourls){

            $urlWithQuery = ltrim($_SERVER['REQUEST_URI'], '/');
            $urlWithoutQuery = explode('?', $urlWithQuery)[0];

            //is announcements
            if(strpos($urlWithoutQuery, 'announcements') !== false && isset($_GET['id']) && is_numeric($_GET['id'])){
                return $whmcsurl . 'announcements/' . $_GET['id'] . '/' . getmodrewritefriendlystring(Capsule::table('tblannouncements')->where('id', $_GET['id'])->value('title')) . '.html';
            }

            //is kb category
            if(strpos($urlWithoutQuery, 'knowledgebase') !== false && isset($_GET['action']) && $_GET['action'] == 'displaycat' && isset($_GET['catid']) && is_numeric($_GET['catid'])){
                return $whmcsurl . 'knowledgebase/' . $_GET['catid'] . '/' . getmodrewritefriendlystring(Capsule::table('tblknowledgebasecats')->where('id', $_GET['catid'])->value('name'));
            }

            //is kb article
            if(strpos($urlWithoutQuery, 'knowledgebase') !== false && isset($_GET['action']) && $_GET['action'] == 'displayarticle' && isset($_GET['id']) && is_numeric($_GET['id'])){
                return $whmcsurl . 'knowledgebase/' . $_GET['id'] . '/' . getmodrewritefriendlystring(Capsule::table('tblknowledgebase')->where('id', $_GET['id'])->value('title')) . '.html';
            }

            //is download category
            if(strpos($urlWithoutQuery, 'downloads') !== false && isset($_GET['action']) && $_GET['action'] == 'displaycat' && isset($_GET['catid']) && is_numeric($_GET['catid'])){
                return $whmcsurl . 'downloads/' . $_GET['catid'] . '/' . getmodrewritefriendlystring(Capsule::table('tbldownloadcats')->where('id', $_GET['catid'])->value('name'));
            }

            return;
        }

        if($this->type == 'kbcat'){
            return (!$seourls) ? $whmcsurl .'knowledgebase.php?action=displaycat&catid=' . $this->rel_id : $whmcsurl . 'knowledgebase/' . $this->rel_id . '/' . getmodrewritefriendlystring(Capsule::table('tblknowledgebasecats')->where('id', $this->rel_id)->value('name'));
        }else if($this->type == 'kbtag'){
            return $whmcsurl .'knowledgebase.php?tag=' . $this->rel_id;
        }else if($this->type == 'kbarticle'){
            return (!$seourls) ? $whmcsurl .'knowledgebase.php?action=displayarticle&id=' . $this->rel_id : $whmcsurl . 'knowledgebase/' . $this->rel_id . '/' . getmodrewritefriendlystring(Capsule::table('tblknowledgebase')->where('id', $this->rel_id)->value('title')) . '.html';
        }else if($this->type == 'announcement'){
            return (!$seourls) ? $whmcsurl .'announcements.php?id=' . $this->rel_id : $whmcsurl . 'announcements/' . $this->rel_id . '/' . getmodrewritefriendlystring(Capsule::table('tblannouncements')->where('id', $this->rel_id)->value('title')) . '.html';
        }else if($this->type == 'dlcat'){
            return (!$seourls) ? $whmcsurl .'downloads.php?action=displaycat&catid=' . $this->rel_id : $whmcsurl . 'downloads/' . $this->rel_id . '/' . getmodrewritefriendlystring(Capsule::table('tbldownloadcats')->where('id', $this->rel_id)->value('name'));
        }else if($this->type == 'cartgroup'){
            return $whmcsurl .'cart.php?gid=' . $this->rel_id;
        }
        return $whmcsurl . $this->rel_id;
    }

    public function outputMetaTags(){

        global $CONFIG;
        $systemUrl = rtrim($CONFIG['SystemURL'], '/') . '/';

        $return = (strtolower($this->settings['display_comments']) == 'yes') ? "\n<!--WHMCS SEO Module Meta Tags-->\n" : "\n";

        // Canonical
        if($this->getUrl()){
            $return .= '<link rel="canonical" href="'.$this->getUrl().'" />'."\n";
        }

        // Description
        if($this->getFieldValue('desc') != ''){
            $return .= '<meta name="description" content="'.$this->getFieldValue('desc').'"/>'."\n";
        }elseif($this->settings['default_description'] != ''){
            $return .= '<meta name="description" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['default_description']))).'"/>'."\n";
        }

        // Keywords
        if($this->getFieldValue('keyword') != ''){
            $return .= '<meta name="keywords" content="'.$this->getFieldValue('keyword').'"/>'."\n";
        }elseif($this->settings['default_keywords'] != ''){
            $return .= '<meta name="keywords" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['default_keywords']))).'"/>'."\n";
        }

        // Robots
        $robots = [];
        if($this->getFieldValue('bots_index') == 'true'){
            $robots[] = 'NoIndex';
        }
        if($this->getFieldValue('bots_archive') == 'true'){
            $robots[] = 'NoArchive';
        }
        if($this->getFieldValue('bots_follow') == 'true'){
            $robots[] = 'NoFollow';
        }
        if($this->getFieldValue('bots_snippet') == 'true'){
            $robots[] = 'NoSnippet';
        }
        if($this->getFieldValue('bots_odp') == 'true'){
            $robots[] = 'NoODP';
        }
        if(!empty($robots)){
            $robots = implode($robots, ', ');
            $return .= '<meta name="robots" content="'.$robots.'"/>'."\n";
        }

        // OG Site Name
        $return .= '<meta property="og:site_name" content="'.htmlspecialchars_decode(stripcslashes(strip_tags(((isset($this->settings['ogname']) && $this->settings['ogname'] != '') ? $this->settings['ogname'] : $CONFIG['CompanyName'] )))).'"/>'."\n";

        // OG Type
        $return .= '<meta property="og:type" content="'.(in_array($this->type, ['kbarticle', 'announcement']) ? 'article' : 'website').'"/>'."\n";

        // OG Url
        if($this->getUrl()) {
            $return .= '<meta property="og:url" content="' . $this->getUrl() . '"/>' . "\n";
        }

        // OG Title
        if($this->getFieldValue('ogtitle') != ''){
            $return .= '<meta property="og:title" content="'.$this->getFieldValue('ogtitle').'"/>'."\n";
        }elseif($this->getFieldValue('title') != ''){
            $return .= '<meta property="og:title" content="'.$this->getFieldValue('title').'"/>'."\n";
        }

        // OG Desc
        if($this->getFieldValue('ogdesc') != ''){
            $return .= '<meta property="og:description" content="'.$this->getFieldValue('ogdesc').'"/>'."\n";
        }elseif($this->getFieldValue('desc') != ''){
            $return .= '<meta property="og:description" content="'.$this->getFieldValue('desc').'"/>'."\n";
        }elseif($this->settings['ogdesc'] != ''){
            $return .= '<meta property="og:description" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['ogdesc']))).'"/>'."\n";
        }elseif($this->settings['default_description'] != ''){
            $return .= '<meta property="og:description" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['default_description']))).'"/>'."\n";
        }

        // OG Section
        if($this->getFieldValue('ogsection') != ''){
            $return .= '<meta property="og:article:section" content="'.$this->getFieldValue('ogsection').'"/>'."\n";
        }

        // OG Tag
        if($this->getFieldValue('ogtag') != ''){
            $return .= '<meta property="og:article:tag" content="'.$this->getFieldValue('ogtag').'"/>'."\n";
        }

        // OG Image
        if($this->getFieldValue('ogimage') != ''){
            $return .= '<meta property="og:image" content="'.$this->getFieldValue('ogimage').'"/>'."\n";
        }elseif($this->settings['ogimage'] != ''){
            $return .= '<meta property="og:image" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['ogimage']))).'"/>'."\n";
        }

        // Twitter Card
        if($this->getFieldValue('twittercard') != ''){
            $return .= '<meta name="twitter:card" content="'.$this->getFieldValue('twittercard').'"/>'."\n";
        }elseif($this->settings['twittercard'] != ''){
            $return .= '<meta name="twitter:card" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['twittercard']))).'"/>'."\n";
        }

        // Twitter Site
        if($this->settings['twittersite'] != ''){
            $return .= '<meta name="twitter:site" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['twittersite']))).'"/>'."\n";
        }

        // Twitter Creator
        if($this->getFieldValue('twittercreator') != ''){
            $return .= '<meta name="twitter:creator" content="'.$this->getFieldValue('twittercreator').'"/>'."\n";
        }

        // Twitter Title
        if($this->getFieldValue('twittertitle') != ''){
            $return .= '<meta name="twitter:title" content="'.$this->getFieldValue('twittertitle').'"/>'."\n";
        }elseif($this->getFieldValue('ogtitle') != ''){
            $return .= '<meta name="twitter:title" content="'.$this->getFieldValue('ogtitle').'"/>'."\n";
        }elseif($this->getFieldValue('title') != ''){
            $return .= '<meta name="twitter:title" content="'.$this->getFieldValue('title').'"/>'."\n";
        }

        // Twitter Description
        if($this->getFieldValue('twitterdesc') != ''){
            $return .= '<meta name="twitter:description" content="'.$this->getFieldValue('twitterdesc').'"/>'."\n";
        }elseif($this->getFieldValue('ogdesc') != ''){
            $return .= '<meta name="twitter:description" content="'.$this->getFieldValue('ogdesc').'"/>'."\n";
        }elseif($this->getFieldValue('desc') != ''){
            $return .= '<meta name="twitter:description" content="'.$this->getFieldValue('desc').'"/>'."\n";
        }elseif($this->settings['default_description'] != ''){
            $return .= '<meta name="twitter:description" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['default_description']))).'"/>'."\n";
        }

        // Twitter Image
        if($this->getFieldValue('twitterimage') != ''){
            $return .= '<meta name="twitter:image" content="'.$this->getFieldValue('twitterimage').'"/>'."\n";
        }elseif($this->getFieldValue('ogimage') != ''){
            $return .= '<meta name="twitter:image" content="'.$this->getFieldValue('ogimage').'"/>'."\n";
        }elseif($this->settings['ogimage'] != ''){
            $return .= '<meta name="twitter:image" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['ogimage']))).'"/>'."\n";
        }

        // Twitter Video
        if($this->getFieldValue('twittervideo') != ''){
            $return .= '<meta name="twitter:video" content="'.$this->getFieldValue('twittervideo').'"/>'."\n";
        }

        // FB Admins
        if($this->settings['fbadmins'] != ''){
            $return .= '<meta property="fb:admins" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['fbadmins']))).'"/>'."\n";
        }

        // FB App ID
        if($this->settings['fbappids'] != ''){
            $return .= '<meta property="fb:app_id" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['fbappids']))).'"/>'."\n";
        }

        // Abstract
        if($this->settings['abstract'] != ''){
            $return .= '<meta name="abstract" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['abstract']))).'"/>'."\n";
        }

        // Copyright
        if($this->settings['copyright'] != ''){
            $return .= '<meta name="copyright" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['copyright']))).'"/>'."\n";
        }

        // Reply To
        if($this->settings['replyto'] != ''){
            $return .= '<meta name="reply-to" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['replyto']))).'"/>'."\n";
        }

        // Distribution
        if($this->settings['distribution'] != ''){
            $return .= '<meta name="distribution" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($this->settings['distribution']))).'"/>'."\n";
        }

        if(isset($this->settings['meta_tags']) && !empty($this->settings['meta_tags'])){
            foreach((array) $this->settings['meta_tags']  as $tag){
                $return .= '<meta name="'.htmlspecialchars_decode(stripcslashes(strip_tags($tag->tag))).'" content="'.htmlspecialchars_decode(stripcslashes(strip_tags($tag->value))).'"/>'."\n";
            }
        }

        // RSS Links
        if(strtolower($this->settings['rss_links']) == 'yes'){
            $return .= '<link rel="alternate" type="application/rss+xml" title="'.$CONFIG['CompanyName'].' Products Feed" href="'.$systemUrl.'index.php?m=whmcs_seo&amp;feed=products"/>'."\n".
                '<link rel="alternate" type="application/rss+xml" title="'.$CONFIG['CompanyName'].' Knowledgebase Feed" href="'.$systemUrl.'index.php?m=whmcs_seo&amp;feed=knowledgebase"/>'."\n".
                '<link rel="alternate" type="application/rss+xml" title="'.$CONFIG['CompanyName'].' Announcements Feed" href="'.$systemUrl.'index.php?m=whmcs_seo&amp;feed=announcements"/>'."\n".
                '<link rel="alternate" type="application/rss+xml" title="'.$CONFIG['CompanyName'].' Network Issues Feed" href="'.$systemUrl.'index.php?m=whmcs_seo&amp;feed=networkissues"/>'."\n";
        }

        return $return;
    }

}