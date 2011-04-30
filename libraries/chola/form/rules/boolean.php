<?php
/**
 * @version		$Id: boolean.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Framework
 * @subpackage	Form
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('chola.form.formrule');

/**
 * Form Rule class for the Chola Framework.
 *
 * @package		Chola.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormRuleBoolean extends JFormRule
{
	/**
	 * The regular expression to use in testing a form field value.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $regex = '^(?:[01]|true|false)$'; 

	/**
	 * The regular expression modifiers to use when testing a form field value.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $modifiers = 'i';
}