<?php
/**
 * @version		$Id: helper.php 21084 2011-04-05 00:49:22Z dextercowley $
 * @package		Chola.Site
 * @subpackage	mod_users_latest
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class modUsersLatestHelper
{
	// get users sorted by activation date
	static function getUsers($params)
	{
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		$query->select('a.id, a.name, a.username, a.registerDate');
		$query->order('a.registerDate DESC');
		$query->from('#__users AS a');
		$db->setQuery($query,0,$params->get('shownumber'));;
		$result = $db->loadObjectList();
		return (array) $result;
	}
}
