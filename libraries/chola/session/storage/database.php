<?php
/**
 * @version		$Id:database.php 6961 2007-03-15 16:06:53Z tcp $
 * @package		Chola.Framework
 * @subpackage	Session
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('JPATH_BASE') or die;

/**
 * Database session storage handler for PHP
 *
 * @package		Chola.Framework
 * @subpackage	Session
 * @since		1.5
 * @see			http://www.php.net/manual/en/function.session-set-save-handler.php
 */
class JSessionStorageDatabase extends JSessionStorage
{
	protected $_data = null;

	/**
	 * Open the SessionHandler backend.
	 *
	 * @param	string	The path to the session object.
	 * @param	string	The name of the session.
	 * @return	boolean	True on success, false otherwise.
	 * @since	1.5
	 */
	public function open($save_path, $session_name)
	{
		return true;
	}

	/**
	 * Close the SessionHandler backend.
	 *
	 * @return	boolean	True on success, false otherwise.
	 * @since	1.5
	 */
	public function close()
	{
		return true;
	}

	/**
	 * Read the data for a particular session identifier from the
	 * SessionHandler backend.
	 *
	 * @param	string	The session identifier.
	 * @return	string	The session data.
	 * @since	1.5
	 */
	public function read($id)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
		if (!$db->connected()) {
			return false;
		}

		// Get the session data from the database table.
		$db->setQuery(
			'SELECT `data`' .
			' FROM `#__session`' .
			' WHERE `session_id` = '.$db->quote($id)
		);
		return (string) $db->loadResult();
	}

	/**
	 * Write session data to the SessionHandler backend.
	 *
	 * @param	string	The session identifier.
	 * @param	string	The session data.
	 * @return	boolean	True on success, false otherwise.
	 * @since	1.5
	 */
	public function write($id, $data)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
		if (!$db->connected()) {
			return false;
		}

		// Try to update the session data in the database table.
		$db->setQuery(
			'UPDATE `#__session`' .
			' SET `data` = '.$db->quote($data).',' .
			'	  `time` = '.(int) time() .
			' WHERE `session_id` = '.$db->quote($id)
		);
		if (!$db->query()) {
			return false;
 		}

		if ($db->getAffectedRows()) {
			return true;
		} else {
			// If the session does not exist, we need to insert the session.
			$db->setQuery(
				'INSERT INTO `#__session` (`session_id`, `data`, `time`)' .
				' VALUES ('.$db->quote($id).', '.$db->quote($data).', '.(int) time().')'
			);
			return (boolean) $db->query();
		}
	}

	/**
	 * Destroy the data for a particular session identifier in the
	 * SessionHandler backend.
	 *
	 * @param	string	The session identifier.
	 * @return	boolean	True on success, false otherwise.
	 * @since	1.5
	 */
	public function destroy($id)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
		if (!$db->connected()) {
			return false;
		}

		// Remove a session from the database.
		$db->setQuery(
			'DELETE FROM `#__session`' .
			' WHERE `session_id` = '.$db->quote($id)
		);
		return (boolean) $db->query();
	}

	/**
	 * Garbage collect stale sessions from the SessionHandler backend.
	 *
	 * @param	integer	The maximum age of a session.
	 * @return	boolean	True on success, false otherwise.
	 * @since	1.5
	 */
	function gc($lifetime = 1440)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
		if (!$db->connected()) {
			return false;
		}

		// Determine the timestamp threshold with which to purge old sessions.
		$past = time() - $lifetime;

		// Remove expired sessions from the database.
		$db->setQuery(
			'DELETE FROM `#__session`' .
			' WHERE `time` < '.(int) $past
		);
		return (boolean) $db->query();
	}
}