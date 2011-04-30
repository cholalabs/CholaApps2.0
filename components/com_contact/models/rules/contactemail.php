<?php
/**
 * @version		$Id: contactemail.php 20982 2011-03-17 16:12:00Z chdemko $
 * @package		Chola.Site
 * @subpackage	Contact
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('chola.form.formrule');

require_once 'libraries/chola/form/rules/email.php';

class JFormRuleContactEmail extends JFormRuleEmail
{
	public function test(& $element, $value, $group = null, & $input = null, & $form = null)
	{
		if(!parent::test($element, $value, $group, $input, $form)){
			return false;
		}
		
		$params = JComponentHelper::getParams('com_contact');
		$banned = $params->get('banned_email');
		
		foreach(explode(';', $banned) as $item){
			if (JString::stristr($item, $value) !== false)
					return false;
		}
		
		return true;
	}

}
