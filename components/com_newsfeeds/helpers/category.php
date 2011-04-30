<?php
/**
 * @version		$Id: category.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Site
 * @subpackage	com_newsfeeds
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Component Helper
jimport('chola.application.component.helper');
jimport('chola.application.categories');

/**
 * Content Component Category Tree
 *
 * @static
 * @package		Chola.Site
 * @subpackage	com_newsfeeds
 * @since 1.6
 */
class NewsfeedsCategories extends JCategories
{
	public function __construct($options = array())
	{
		$options['table'] = '#__newsfeeds';
		$options['extension'] = 'com_newsfeeds';
		$options['statefield'] = 'published';
		parent::__construct($options);
	}
}
