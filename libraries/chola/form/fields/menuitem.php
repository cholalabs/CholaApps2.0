<?php
/**
 * @version		$Id: menuitem.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Framework
 * @subpackage	Form
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('chola.html.html');
jimport('chola.form.formfield');
jimport('chola.form.helper');
JFormHelper::loadFieldClass('groupedlist');

// Import the com_menus helper.
require_once realpath(JPATH_ADMINISTRATOR.'/components/com_menus/helpers/menus.php');

/**
 * Supports an HTML select list of menu item
 *
 * @package		Chola.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldMenuItem extends JFormFieldGroupedList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	public $type = 'MenuItem';

	/**
	 * Method to get the field option groups.
	 *
	 * @return	array	The field option objects as a nested array in groups.
	 * @since	1.6
	 */
	protected function getGroups()
	{
		// Initialize variables.
		$groups = array();

		// Initialize some field attributes.
		$menuType = (string) $this->element['menu_type'];
		$published = $this->element['published'] ? explode(',', (string) $this->element['published']) : array();
		$disable = $this->element['disable'] ? explode(',', (string) $this->element['disable']) : array();

		// Get the menu items.
		$items = MenusHelper::getMenuLinks($menuType, 0, 0, $published);

		// Build group for a specific menu type.
		if ($menuType) {
			// Initialize the group.
			$groups[$menuType] = array();

			// Build the options array.
			foreach($items as $link) {
				$groups[$menuType][] = JHtml::_('select.option', $link->value, $link->text, 'value', 'text', in_array($link->type, $disable));
			}
		}

		// Build groups for all menu types.
		else {
			// Build the groups arrays.
			foreach($items as $menu)
			{
				// Initialize the group.
				$groups[$menu->menutype] = array();

				// Build the options array.
				foreach($menu->links as $link) {
					$groups[$menu->menutype][] = JHtml::_('select.option', $link->value, $link->text, 'value', 'text', in_array($link->type, $disable));
				}
			}
		}

		// Merge any additional groups in the XML definition.
		$groups = array_merge(parent::getGroups(), $groups);

		return $groups;
	}
}