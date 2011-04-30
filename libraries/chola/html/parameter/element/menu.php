<?php
/**
 * @version		$Id: menu.php 20972 2011-03-16 13:57:36Z chdemko $
 * @package		Chola.Framework
 * @subpackage	Parameter
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('JPATH_BASE') or die;

/**
 * Renders a menu element
 *
 * @package		Chola.Framework
 * @subpackage	Parameter
 * @deprecated	JParameter is deprecated and will be removed in a future version. Use JForm instead.
 * @since		1.5
 */

class JElementMenu extends JElement
{
	/**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	protected $_name = 'Menu';

	public function fetchElement($name, $value, &$node, $control_name)
	{
		require_once JPATH_ADMINISTRATOR.DS.'components'.DS.'com_menus'.DS.'helpers'.DS.'menus.php';
		$menuTypes	= MenusHelper::getMenuTypes();

		foreach ($menuTypes as $menutype) {
			$options[] = JHtml::_('select.option', $menutype, $menutype);
		}
		array_unshift($options, JHtml::_('select.option', '', JText::_('JOPTION_SELECT_MENU')));

		return JHtml::_('select.genericlist',  $options, $control_name.'['.$name.']',
			array(
				'id' => $control_name.$name,
				'list.attr' => 'class="inputbox"',
				'list.select' => $value
			)
		);
	}
}
