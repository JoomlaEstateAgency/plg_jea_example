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
     * onInitTableProperty Method
     * This method is called just before $row property initialization.
     * It should be usefull to add fields on the fly
     * 
     * @param TableProperties $table
     * @return void;
     */
    function onInitTableProperty(&$table)
    {
        
    }
    
    /**
     * onBeforeSaveProperty method
     * 
     * Called before $row property save.
     *
     * @param TableProperties $row
     * @param boolean $is_new
     * @return boolean
     */
    function onBeforeSaveProperty(&$row, $is_new)
    {
        return true;
    }
    
	/**
     * onAfterSaveProperty method
     * 
     * Called after $row property save.
     *
     * @param TableProperties $row
     * @param boolean $is_new
     * @return void
     */
    function onAfterSaveProperty(&$row, $is_new)
    {
        
    }
    
    
    
    
    
	/**
     * onAfterStartPane method (Called in the admin property form)
     *
     * @param JPane $pane
     * @param TableProperties $row
     */
    function onAfterStartPane(&$pane, &$row)
    {
        echo $pane->startPanel( JText::_('My new panel 1') , "my-new-panel-1" );
        echo '<p>My new panel 1</p>';
        echo $pane->endPanel();
    }

    /**
     * onBeforeEndPane method (Called in the admin property form)
     *
     * @param JPane $pane
     * @param TableProperties $row
     */
    function onBeforeEndPane(&$pane, &$row)
    {
        echo $pane->startPanel( JText::_('My new panel 2') , "my-new-panel-2" );
        echo '<p>My new panel 2</p>';
        echo $pane->endPanel();
    }
    
    
    /**
     * onBeforeShowDescription method 
     * Called in the default_item.php tpl
     *
     * @param stdClass $row
     */
    function onBeforeShowDescription(&$row)
    {
        
        echo '<h3>onBeforeShowDescription</h3>';
    }
    
    
	/**
     * onAfterShowDescription method 
     * Called in the default_item.php tpl
     *
     * @param stdClass $row
     */
    function onAfterShowDescription(&$row)
    {
        
        echo '<h3>onAfterShowDescription</h3>';
    }
    

    
    
    
    


}
