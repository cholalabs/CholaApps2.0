<?php
/**
 * @version		$Id: default_navigation.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Administrator
 * @subpackage	com_admin
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<div id="submenu-box">
	<div class="t"><div class="t"><div class="t"></div></div></div>
	<div class="m">
		<div class="submenu-box">
			<div class="submenu-pad">
				<ul id="submenu" class="information">
					<li>
						<a href="#" onclick="return false;" id="site" class="active">
							<?php echo JText::_('COM_ADMIN_SYSTEM_INFORMATION'); ?></a>
					</li>
					<li>
						<a href="#" onclick="return false;" id="phpsettings">
							<?php echo JText::_('COM_ADMIN_PHP_SETTINGS'); ?></a>
					</li>
					<li>
						<a href="#" onclick="return false;" id="config">
							<?php echo JText::_('COM_ADMIN_CONFIGURATION_FILE'); ?></a>
					</li>
					<li>
						<a href="#" onclick="return false;" id="directory">
							<?php echo JText::_('COM_ADMIN_DIRECTORY_PERMISSIONS'); ?></a>
					</li>
					<li>
						<a href="#" onclick="return false;" id="phpinfo">
							<?php echo JText::_('COM_ADMIN_PHP_INFORMATION'); ?></a>
					</li>
				</ul>
				<div class="clr"></div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
	<div class="b"><div class="b"><div class="b"></div></div></div>
</div>

