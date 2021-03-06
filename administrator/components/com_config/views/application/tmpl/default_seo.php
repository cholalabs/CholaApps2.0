<?php
/**
 * @version		$Id: default_seo.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Administrator
 * @subpackage	com_config
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
?>
<div class="width-100">
<fieldset class="adminform long">
	<legend><?php echo JText::_('COM_CONFIG_SEO_SETTINGS'); ?></legend>
	<ul class="adminformlist">
			<?php
			foreach ($this->form->getFieldset('seo') as $field):
			?>
			<li><?php echo $field->label; ?>
			<?php echo $field->input; ?></li>
			<?php
			endforeach;
			?>
		</ul>
</fieldset>
</div>