<?php

/**
 Voreinstellungen
 **/

$GLOBALS['canonical_domain'] = "http://www.blue-home.net/";
$GLOBALS['index_id'] = "start";


if( $_SERVER['SERVER_NAME'] == "js.dev" )
{
	$GLOBALS['urlrewrite']  = 0; // Angeben, ob URL-Rewriting an oder aus ist.
	$GLOBALS['basedir']     = 'http://js.dev/blue-home/htdocs/'; // var_dump($GLOBALS['basedir']);
	$GLOBALS['basepath']    = '/blue-home/htdocs/';
}
else
{
	$GLOBALS['urlrewrite']  = 1; // Angeben, ob URL-Rewriting an oder aus ist.
	$GLOBALS['basedir']     = 'http://www.blue-home.net/'; // var_dump($GLOBALS['basedir']);
	$GLOBALS['basepath']    = '/';
}



/**
 Alles nötigen Dateien einbinden
 **/
require 'content/_global_content.php';
require 'content/_navi.php';
require 'content/_pages.php';
require 'class/class.Content.php';
require 'class/class.Navi.php';
require 'class/class.Tpl.php';


/**
 Parameter feststellen
 **/

# Wir erwarten die Seiten-ID nach Art index.php?id=kontakt
$id = array_key_exists('id', $_REQUEST) ? $_REQUEST['id'] : $GLOBALS['index_id']; // var_dump($_REQUEST);

//var_dump( substr($id, -1, 1) );
//var_dump( substr($id, 0, -1) );

# Falls $id = 'gutachten/', schneiden wir den '/' hinten ab:
if( substr($id, -1, 1) == '/' ) $id = substr($id, 0, -1);


//schaeden-vermeiden

# Prüfen, ob es zu der ID auch eine Seite gibt - wenn nicht zeigen wir die Startseite:
array_key_exists($id, $pages) ? TRUE : $id = $GLOBALS['index_id'];

$GLOBALS['page']         = $pages[$id];
$GLOBALS['page']['id']   = $id;
$GLOBALS['content']      = $global_content;

$cObj = new Content();
$nObj = new Navi();
$tObj = new Tpl();


/**
 * HTML generieren
 ******************************************/

$page_placeholders['basedir']     = $GLOBALS['basedir'];
$page_placeholders['basepath']    = $GLOBALS['basepath'];
$page_placeholders['id']     = $id;

/**
 <head> generieren
 **/

$page_placeholders['head_title']  = $cObj->head_title();
$page_placeholders['head_description']  = $cObj->head_description();
$page_placeholders['head_keywords']     = $cObj->head_keywords();
$page_placeholders['canonical']   = $nObj->canonical($id);
$page_placeholders['styles']      = "";
$page_placeholders['scripts']     = "";


/**
 Seiten-Header generieren
 **/

$page_placeholders['navi_main1']     = $nObj->get('main1', $navi, $pages, 'nav-main');
$page_placeholders['navi_main2']     = $nObj->get('main2', $navi, $pages, 'nav-main');
$page_placeholders['navi_meta']      = $nObj->get('meta', $navi, $pages);
$page_placeholders['navi_service']   = $nObj->get('service', $navi, $pages);


/**
 Seiten-Body generieren
 **/

$tmpl = $tObj->get_tpl('content/'.$id.'.html');

// Platzhalter im Content ersetzen:
$placeholders = array();
$placeholders['title']             = $pages[$id]['name'];
$placeholders['nav_title']         = $pages[$id]['title'];
$placeholders['basedir']           = $GLOBALS['basedir'];
$placeholders['btn_selbsthilfe']   = $nObj->btn('selbsthilfe', $pages);

$page_placeholders['body_content'] = $tObj->replace_tpl( $tmpl , $placeholders);


/**
 Seiten-Footer generieren
 **/



/**
 Seite generieren
 **/


$file = 'tmpl/page.html';
//$page_placeholders = $tObj->get_vars_tpl($file); var_dump($page_placeholders);

$page_placeholders['head']   = $tObj->replace_tpl( $tObj->get_tpl('tmpl/head.html'),    $page_placeholders   );
$page_placeholders['header'] = $tObj->replace_tpl( $tObj->get_tpl('tmpl/header.html'),  $page_placeholders );
$page_placeholders['body']   = $tObj->replace_tpl( $tObj->get_tpl('tmpl/body.html'),    $page_placeholders   );
$page_placeholders['footer'] = $tObj->replace_tpl( $tObj->get_tpl('tmpl/footer.html'),  $page_placeholders );

$html = $tObj->replace_tpl( $tObj->get_tpl('tmpl/page.html') , $page_placeholders);
$tObj->write( $html );
