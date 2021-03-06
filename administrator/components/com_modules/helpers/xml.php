<?php
/**
 * @version		$Id: xml.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Administrator
 * @subpackage	com_modules
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Chola.Administrator
 * @subpackage	com_modules
 */
class ModulesHelperXML
{
	function parseXMLModuleFile(&$rows)
	{
		foreach ($rows as $i => $row)
		{
			if ($row->module == '')
			{
				$rows[$i]->name		= 'custom';
				$rows[$i]->module	= 'custom';
				$rows[$i]->descrip	= 'Custom created module, using Module Manager `New` function';
			}
			else
			{
				$data = JApplicationHelper::parseXMLInstallFile($row->path.DS.$row->file);

				if ($data['type'] == 'module')
				{
					$rows[$i]->name		= $data['name'];
					$rows[$i]->descrip	= $data['description'];
				}
			}
		}
	}
}