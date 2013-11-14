<?php
/*------------------------------------------------------------------------
# shortcodes/incptvtextrotator.php - Inceptive Text Rotator Content Plugin
# ------------------------------------------------------------------------
# version   1.0
# author    Inceptive Design Labs
# copyright Copyright (C) 2013 Inceptive Design Labs. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   http://extend.inceptive.gr
-------------------------------------------------------------------------*/

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

$document = JFactory::getDocument();

$path = strstr(realpath(dirname(__FILE__)), 'plugins');
$path = str_replace("plugins", "", $path);
$path = str_replace("shortcodes", "", $path);
$path = JURI::root(true).'/plugins'.$path;

$document->addStyleSheet($path.'css/simpletextrotator.css');
$document->addScript($path.'js/jquery.simple-text-rotator.min.js');

jimport('joomla.registry.registry');

//[textrotate]
if(!function_exists('textrotate_sc')){
    function textrotate_sc($atts, $content='')
    {
	extract(shortcode_atts(array(), $atts));
	

	$plugin = JPluginHelper::getPlugin('content', 'incptvtextrotator');    
	$pluginParams = new JRegistry();
	$pluginParams->loadString($plugin->params, 'JSON');
	
	$animation = ($atts['animation'] != '' ? $atts['animation'] : $pluginParams->get('animation', 'dissolve'));
	$speed = ($atts['speed'] != '' ? $atts['speed'] : $pluginParams->get('speed', '2000'));
	
	$spanid = 'incptvtextrotator'.'_'.rand(0, 9999);
	
	$data = '<span id="'.$spanid.'">'. do_shortcode( $content )  . '</span>';

	$data .= '  <script>
			var $incptv = jQuery.noConflict();
			$incptv(document).ready(
			    $incptv("#'.$spanid.'").textrotator({
				animation: "'.$animation.'",
				separator: ",",
				speed: '.$speed.'
			    })
			);
		    </script>';

    return $data;
   }
   add_shortcode('textrotate','textrotate_sc');
}

