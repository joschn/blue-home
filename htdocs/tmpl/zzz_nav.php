<!-- <pre> -->
<?php

$GLOBALS['pages'] = array(
    'main' => array(

    	array(
    		'id'	=> 'schaeden-vermeiden',
    		'class'	=> 'nav1',
    		'name'	=> 'Schaden vermeiden',
    		'title'	=> 'Wie Sie Bauschäden vermeiden können'
    	),
    	array(
    		'id'	=> 'baubetreuung',
    		'class'	=> 'nav2',
    		'name'	=> 'Bauherrenberatung',
    		'title'	=> 'Beratung von Bauherren'
    	),
    	array(
    		'id'	=> 'bauherrenberatung',
    		'class'	=> 'nav2',
    		'name'	=> 'Bauherrenbetreuung',
    		'title'	=> 'Betreuung von Bauherren'
    	),
    	array(
    		'id'	=> 'haussanierung',
    		'class'	=> 'nav2',
    		'name'	=> 'Sanierungsleitung',
    		'title'	=> 'Leitung von Sanierungsarbeiten'
    	),

    	array(
    		'id'	=> 'schaeden-erkennen',
    		'class'	=> 'nav1',
    		'name'	=> 'Schäden erkennen und beheben',
    		'title'	=> 'Wie Sie Schäden erkennen und beheben können'
    	),
    	array(
    		'id'	=> 'baumaengel',
    		'class'	=> 'nav2',
    		'name'	=> 'Feuchteschäden',
    		'title'	=> 'Bauschäden durch Feuchtigkeit'
    	),
    	array(
    		'id'	=> 'feuchteschaeden',
    		'class'	=> 'nav2',
    		'name'	=> 'Feuchteschäden',
    		'title'	=> 'Bauschäden durch Feuchtigkeit'
    	),
    	array(
    		'id'	=> 'schimmel',
    		'class'	=> 'nav2',
    		'name'	=> 'Schimmel',
    		'title'	=> 'Bauschäden durch Schimmel'
    	),
    	array(
    		'id'	=> 'baubiologie',
    		'class'	=> 'nav2',
    		'name'	=> 'Baubiologie',
    		'title'	=> 'Informationen zu Baubiologie'
    	),
    	array(
    		'id'	=> 'gutachten',
    		'class'	=> 'nav2',
    		'name'	=> 'Gutachten',
    		'title'	=> 'Gutachtenerstellung'
    	)
    	array(
    		'id'	=> 'mediation-schlichtung',
    		'class'	=> 'nav2',
    		'name'	=> 'Mediation',
    		'title'	=> 'Mediation bei Baumängeln'
    	),
    ),
	'meta' => array(
    	array(
    		'id'	=> 'agb',
    		'class'	=> 'nav2',
    		'name'	=> 'AGB',
    		'title'	=> 'Allgemeine Geschäftsbedingungen'
    	),
    	array(
    		'id'	=> 'impressum',
    		'class'	=> 'nav2',
    		'name'	=> 'Impressum',
    		'title'	=> 'Kontakt zum Herausgeber'
    	)
    ),
	'service' => array(
    	array(
    		'id'	=> 'ueber-uns',
    		'class'	=> 'nav2',
    		'name'	=> 'Über uns',
    		'title'	=> 'Portrait'
    	),
    	array(
    		'id'	=> 'zertifikate-und-ausbildungen',
    		'class'	=> 'nav2',
    		'name'	=> 'Zertifikate &amp; Ausbildungen',
    		'title'	=> 'Zertifikate &amp; Ausbildungen'
    	),
    	array(
    		'id'	=> 'kundenstimmen',
    		'class'	=> 'nav2',
    		'name'	=> 'Kundenstimmen',
    		'title'	=> 'Kommentare'
    	),
    	array(
    		'id'	=> 'downloads',
    		'class'	=> 'nav2',
    		'name'	=> 'Downloads',
    		'title'	=> 'Informationen laden'
    	),
    	array(
    		'id'	=> 'selbsthilfe',
    		'class'	=> 'nav2',
    		'name'	=> 'Selbsthilfe',
    		'title'	=> 'Hilfe zur Selbsthilfe'
    	),
    	array(
    		'id'	=> 'kontakt',
    		'name'	=> 'Kontakt',
    		'title'	=> 'Kontaktdaten'
    	)
    ),
/*
	array(
		'id'	=> 'nn',
		'class'	=> 'nav2',
		'name'	=> 'bla',
		'title'	=> 'title'
	),
*/
);

function nav_li( $nav='', $i=0 )
{
	$pages = $GLOBALS['pages'][$nav];
//	var_dump($pages);
	return '<li id="nav-'.$pages[$i]['id'].'" class="'.$pages[$i]['class'].'"><a href="'.$pages[$i]['id'].'" title="'.$pages[$i]['title'].'"><span>'.$pages[$i]['name'].'</span></a></li>';
}

//var_dump($GLOBALS['pages']);

?>


