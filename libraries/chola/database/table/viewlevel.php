<?php
/**
 * @version		$Id: viewlevel.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('chola.database.table');

/**
 * Viewlevels table class.
 *
 * @package		Chola.Framework
 * @subpackage	Database
 * @version		1.0
 */
class JTableViewlevel extends JTable
{
	/**
	 * Constructor
	 *
	 * @param	object	Database object
	 * @return	void
	 * @since	1.0
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__viewlevels', 'id', $db);
	}

	/**
	 * Method to bind the data.
	 *
	 * @param	array		$array		The data to bind.
	 * @param	mixed		$ignore		An array or space separated list of fields to ignore.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
	 */
	public function bind($array, $ignore = '')
	{
		// Bind the rules as appropriate.
		if (isset($array['rules'])) {
			if (is_array($array['rules'])) {
				$array['rules'] = json_encode($array['rules']);
			}
		}

		return parent::bind($array, $ignore);
	}

	/**
	 * Method to check the current record to save
	 *
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	public function check()
	{
		// Validate the title.
		if ((trim($this->title)) == '') {
			$this->setError(JText::_('JLIB_DATABASE_ERROR_VIEWLEVEL'));
			return false;
		}

		return true;
	}
}
