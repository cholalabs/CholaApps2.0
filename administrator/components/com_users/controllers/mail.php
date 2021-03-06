<?php
/**
 * @version		$Id: mail.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 */

// Check to ensure this file is included in Cholapps
defined('_JEXEC') or die;

jimport('chola.application.component.controller');

/**
 * Users mail controller.
 *
 * @package		Chola.Administrator
 * @subpackage	com_users
 */
class UsersControllerMail extends JController
{
	public function send()
	{
		// Check for request forgeries.
		JRequest::checkToken('request') or jexit(JText::_('JINVALID_TOKEN'));

		$model = $this->getModel('Mail');
		if ($model->send()) {
			$type = 'message';
		} else {
			$type = 'error';
		}

		$msg = $model->getError();
		$this->setredirect('index.php?option=com_users&view=mail', $msg, $type);
	}

	public function cancel()
	{
		// Check for request forgeries.
		JRequest::checkToken('request') or jexit(JText::_('JINVALID_TOKEN'));
		$this->setRedirect('index.php');
	}
}
