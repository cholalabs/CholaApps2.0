<?php
/**
 * @version		$Id: edit.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Administrator
 * @subpackage	com_menus
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

// Load the tooltip behavior.
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>

<script type="text/javascript">
	Chola.submitbutton = function(task)
	{
		if (task == 'menu.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			Chola.submitform(task, document.getElementById('item-form'));
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_menus&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="item-form">
<div class="width-40">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_MENUS_MENU_DETAILS');?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('title'); ?>
				<?php echo $this->form->getInput('title'); ?></li>

				<li><?php echo $this->form->getLabel('menutype'); ?>
				<?php echo $this->form->getInput('menutype'); ?></li>

				<li><?php echo $this->form->getLabel('description'); ?>
				<?php echo $this->form->getInput('description'); ?></li>
			</ul>
	</fieldset>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<div class="clr"></div>
