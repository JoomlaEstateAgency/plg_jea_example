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
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @param object $subject The object to observe
     * @param object $params  The object that holds the plugin parameters
     * @since 1.5
     */
    function plgJeaExample( &$subject, $params )
    {
        parent::__construct( $subject, $params );
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
    function onBeforeSaveProperty($namespace, &$row, $is_new)
    {
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
    function onAfterSaveProperty($namespace, &$row, $is_new)
    {

    }

    /**
     * onAfterLoadPropertyForm method
     *
     * Called after load the property form.
     *
     * @param JForm $form
     * @return void
     */
    function onAfterLoadPropertyForm(&$form)
    {

    }

    /**
     * onAfterStartPanels method (Called in the admin property form)
     *
     * @param TableProperties $row
     * @return void
     */
    function onAfterStartPanels(&$row)
    {
        echo JHtml::_('sliders.panel', 'Exemple start panel', 'test-start-panel');
        echo '<fieldset class="panelform">Test start panel</fieldset>';
    }

    /**
     * onBeforeEndPane method (Called in the admin property form)
     *
     * @param TableProperties $row
     * @return void
     */
    function onBeforeEndPanels(&$row)
    {
        echo JHtml::_('sliders.panel', 'Exemple end panel', 'test-start-panel');
        echo '<fieldset class="panelform">Test end panel</fieldset>';
    }

    /**
     * onBeforeSearch method (Called before query properties list in frontend)
     *
     * @param JDatabaseQueryElement $query
     * @param JObject $Modelstate
     *
     * @return void
     */
    function onBeforeSearch(&$query, &$Modelstate)
    {

    }

    /**
     * onBeforeShowDescription method
     * Called in the defaul.php property layout
     *
     * @param stdClass $row
     */
    function onBeforeShowDescription(&$row)
    {
        echo '<h3>onBeforeShowDescription</h3>';
    }

    /**
     * onAfterShowDescription method
     * Called in the defaul.php property layout
     *
     * @param stdClass $row
     */
    function onAfterShowDescription(&$row)
    {

        echo '<h3>onAfterShowDescription</h3>';
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
        return true;
    }


}
