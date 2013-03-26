<?php
/**
 *
 * @package		Joomla
 * @subpackage	JEA
 * @copyright	Copyright (C) 2011 PHILIP Sylvain. All rights reserved.
 * @license		GNU/GPL, see LICENSE.txt
 * Joomla Estate Agency is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses.
 *
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');

/**
 * Example JEA Plugin
 *
 * @package		Joomla
 * @subpackage	JEA
 * @since 		1.5
 */
class plgJeaExample extends JPlugin
{

    /**
     * Constructor
     *
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     */
    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
        // Load the plugin language files
        $this->loadLanguage();
    }


    /**
     * onBeforeSaveProperty method
     *
     * Called before $row property save.
     *
     * @param string $namespace
     * @param TableProperties $row
     * @param boolean $is_new
     * @return boolean
     */
    public function onBeforeSaveProperty($namespace, &$row, $is_new)
    {
        // $row->owner_name = JRequest::getVar( 'owner_name', '');
        return true;
    }

    /**
     * onAfterSaveProperty method
     *
     * Called after $row property save.
     *
     * @param string $namespace
     * @param TableProperties $row
     * @param boolean $is_new
     * @return void
     */
    public function onAfterSaveProperty($namespace, &$row, $is_new)
    {
        // You can use this method to do a post-treatment (notification email ...)
    }

    /**
     * onContentPrepareForm method
     *
     * Called after load the property form.
     *
	 * @param   JForm   $form  A JForm object.
	 * @param   mixed   $data  The data expected for the form.
     * @return void
     */
    public function onContentPrepareForm($form, $data)
    {
        // You can use this method to alter the property form
        // See the JForm Class {JOOMLA_PATH}/libraries/joomla/form/form.php
        // See the JEA property form {JOOMLA_PATH}/administrator/components/com_jea/models/forms/property.xml

        $xml = '<?xml version="1.0"?>
<form>
	<fieldset name="details">
		<field name="owner_name" type="text" label="PLG_JEA_OWNER_NAME" />
	</fieldset>
</form>';
        // This add a nex field in the fieldset details
        // You can also load an XML file
        $form->load($xml);
    }

    /**
     * onAfterStartPanels method (Called in the admin property form)
     *
     * @param TableProperties $row
     * @return void
     */
    public function onAfterStartPanels(&$row)
    {
        echo JHtml::_('sliders.panel', 'Exemple start panel', 'test-start-panel');
        echo '<fieldset class="panelform">' 
              . JText::_('PLG_JEA_OWNER_NAME'). ' : <strong>'
              . $row->owner_name . '</strong></fieldset>';
    }

    /**
     * onBeforeEndPane method (Called in the admin property form)
     *
     * @param TableProperties $row
     * @return void
     */
    public function onBeforeEndPanels(&$row)
    {
        echo JHtml::_('sliders.panel', 'Exemple end panel', 'test-end-panel');
        echo '<fieldset class="panelform">' 
              . JText::_('PLG_JEA_OWNER_NAME'). ' : <strong>'
              . $row->owner_name . '</strong></fieldset>';
    }

    /**
     * onBeforeLoadProperty method (Called before load property in frontend)
     *
     * @param JDatabaseQueryElement $query
     * @param JObject $Modelstate
     *
     * @return void
     */
    public function onBeforeLoadProperty(&$query, &$Modelstate)
    {
        $query->select('owner_name AS owner');
    }

    /**
     * onBeforeSearch method (Called before query properties list in frontend)
     *
     * @param JDatabaseQueryElement $query
     * @param JObject $Modelstate
     *
     * @return void
     */
    public function onBeforeSearch(&$query, &$Modelstate)
    {
        // Could be used to alter the search query in frontend
        // ex :
        $filter_owner = JRequest::getVar('filter_owner', '');
        if (!empty($filter_owner)) {
            $db = JFactory::getDbo();
            $value = $db->Quote('%'.$db->escape($filter_owner, true).'%');
            $search = '(p.owner_name LIKE '.$value;
            $query->where($search);
        }
    }

    /**
     * onBeforeShowDescription method
     * Called in the defaul.php property layout
     *
     * @param stdClass $row
     */
    function onBeforeShowDescription(&$row)
    {
        echo '<h3>onBeforeShowDescription</h3>'
              . JText::_('PLG_JEA_OWNER_NAME'). ' : <strong>'
              . $row->owner_name . '</strong>';
    }

    /**
     * onAfterShowDescription method
     * Called in the defaul.php property layout
     *
     * @param stdClass $row
     */
    function onAfterShowDescription(&$row)
    {

        echo '<h3>onAfterShowDescription</h3>'
              . JText::_('PLG_JEA_OWNER_NAME'). ' : <strong>'
              . $row->owner_name . '</strong>';
    }

    /**
     * onBeforeSendContactForm method
     *
     * Called before emailing the contact form
     *
     * @param array $data
     * @return boolean true on success or false
     */
    function onBeforeSendContactForm($data)
    {
        // You can use this method to check contact form data and save, for instance, contact information in your database.
        return true;
    }


}
