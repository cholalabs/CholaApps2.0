<?php
/**
 * @version		$Id: system.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Utility class working with system
 *
 * @package		Chola.Administrator
 * @subpackage	com_admin
 * @since		1.6
 */
abstract class JHtmlSystem
{
	/**
	 * method to generate a string message for a value
	 *
	 * @param string $val a php ini value
	 *
	 * @return string html code
	 */
	public static function server($val)
	{
		if (empty($val)) {
			return JText::_('COM_ADMIN_NA');
		}
		else {
			return $val;
		}
	}
}

