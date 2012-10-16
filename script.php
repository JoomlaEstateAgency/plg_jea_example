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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');
/**
 * Install Script file of JEA component
 */
class plgjeaexampleInstallerScript
{
    /**
     * method to run before an install/update/uninstall method
     *
     * @return void
     */
     
    function preflight($type, $parent)
    {
        // Create a new field (owner_name) in the properties table

        $db = JFactory::getDbo();
        $db->setQuery('SHOW COLUMNS FROM #__jea_properties');
        $cols = $db->loadObjectList('Field');
        if(!isset($cols['owner_name'])){
            $query = 'ALTER TABLE `#__jea_properties` '
                   . "ADD `owner_name` VARCHAR(255) NOT NULL DEFAULT ''";
            $db->setQuery($query);
            $db->query();
        }
    }
}