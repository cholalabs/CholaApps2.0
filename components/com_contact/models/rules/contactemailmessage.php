<?php
/**
 * @version		$Id: contactemailmessage.php 20982 2011-03-17 16:12:00Z chdemko $
 * @package		Chola.Site
 * @subpackage	Contact
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('chola.form.formrule');

class JFormRuleContactEmailMessage extends JFormRule
{
	public function test(& $element, $value, $group = null, & $input = null, & $form = null)
	{
		$params = JComponentHelper::getParams('com_contact');
		$banned = $params->get('banned_text');

		foreach(explode(';', $banned) as $item){
			if (JString::stristr($item, $value) !== false)
					return false;
		}
		
		return true;
	}
}
