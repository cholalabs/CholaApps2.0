<?php
/**
 * @version		$Id: edit_metadata.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Administrator
 * @subpackage	com_categories
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul>
	<li><?php echo $this->form->getLabel('metadesc'); ?>
	<?php echo $this->form->getInput('metadesc'); ?></li>

	<li><?php echo $this->form->getLabel('metakey'); ?>
	<?php echo $this->form->getInput('metakey'); ?></li>

<?php foreach($this->form->getGroup('metadata') as $field): ?>
	<?php if ($field->hidden): ?>
		<li><?php echo $field->input; ?></li>
	<?php else: ?>
		<li><?php echo $field->label; ?>
		<?php echo $field->input; ?></li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>
