<?php
/**
 * @version		$Id: helper.php 20806 2011-02-21 19:44:59Z dextercowley $
 * @package		Chola.Site
 * @subpackage	mod_articles_categories
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/helpers/route.php';
jimport('chola.application.categories');

abstract class modArticlesCategoriesHelper
{
	public static function getList(&$params)
	{
		$categories = JCategories::getInstance('Content');
		$category = $categories->get($params->get('parent', 'root'));
		$items = $category->getChildren();
		if($params->get('count', 0) > 0 && count($items) > $params->get('count', 0))
		{
			$items = array_slice($items, 0, $params->get('count', 0));
		}
		return $items;
	}

}
