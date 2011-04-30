<?php
/**
 * @version		$Id: banner.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Site
 * @subpackage	com_banners
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * @package		Chola.Site
 * @subpackage	com_banners
 */
abstract class BannerHelper
{
	/**
	 * Checks if a URL is an image
	 *
	 * @param string
	 * @return URL
	 */
	public static function isImage($url)
	{
		$result = preg_match('#\.(?:bmp|gif|jpe?g|png)$#i', $url);
		return $result;
	}

	/**
	 * Checks if a URL is a Flash file
	 *
	 * @param string
	 * @return URL
	 */
	public static function isFlash($url)
	{
		$result = preg_match('#\.swf$#i', $url);
		return $result;
	}
}

