<?php
/**
 * @version		$Id: timezone.php 20196 2011-01-09 02:40:25Z ian $
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

/**
 * Form Field class for the Chola Framework.
 *
 * @package		Chola.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldTimezone extends JFormFieldGroupedList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Timezone';

	/**
	 * The list of available timezone groups to use.
	 *
	 * @var		array
	 * @since	1.6
	 */
	protected static $zones = array(
		'Africa', 'America', 'Antarctica', 'Arctic', 'Asia',
		'Atlantic', 'Australia', 'Europe', 'Indian', 'Pacific'
	);

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

		// If the timezone is not set use the server setting.
		if (strlen($this->value) == 0) {
			$value = JFactory::getConfig()->get('offset');
		}

		// Get the list of time zones from the server.
		$zones = DateTimeZone::listIdentifiers();

		// Build the group lists.
		foreach ($zones as $zone) {

			// Time zones not in a group we will ignore.
			if (strpos($zone, '/') === false) {
				continue;
			}

			// Get the group/locale from the timezone.
			list ($group, $locale) = explode('/', $zone, 2);

			// Only use known groups.
			if (in_array($group, self::$zones)) {

				// Initialize the group if necessary.
				if (!isset($groups[$group])) {
					$groups[$group] = array();
				}

				// Only add options where a locale exists.
				if (!empty($locale)) {
					$groups[$group][$zone] = JHtml::_('select.option',
						$zone,
						str_replace('_', ' ', $locale), 'value', 'text', false);
				}
			}
		}

		// Sort the group lists.
		ksort($groups);
		foreach($groups as $zone => & $location) {
			sort($location);
		}

		// Merge any additional groups in the XML definition.
		$groups = array_merge(parent::getGroups(), $groups);

		return $groups;
	}
}