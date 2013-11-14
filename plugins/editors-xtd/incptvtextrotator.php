
<?php
/*------------------------------------------------------------------------
# incptvtextrotator.php - Inceptive Text Rotator Editor Button
# ------------------------------------------------------------------------
# author    Inceptive Design Labs
# copyright Copyright (C) 2013 Inceptive Design Labs. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   http://extend.inceptive.gr
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;
class plgButtonIncptvTextRotator extends JPlugin
{
    function onDisplay($name)
    {
		
        $document = JFactory::getDocument();
	$document->addStyleSheet(JURI::base(true).'/../plugins/editors-xtd/incptvtextrotator/css/style.css');
        $jsCode = "
                function insertShortCode(nameOfEditor) {
                    jInsertEditorText('Inceptive\'s Text Rotator is a [textrotate]Simple,Customizable,Light Weight,Easy[/textrotate] Text Rotator with Style', nameOfEditor);
                }
            ";
        $document->addScriptDeclaration($jsCode);
        $button = new JObject();
		$button->set('modal',false);
		$button->set('class','btn');
        $button->set('text','Text Rotate');
        $button->set('onclick', 'insertShortCode(\''.$name.'\')');
        $button->set('name', 'textrotate');
        return $button;

    }

}
?>

