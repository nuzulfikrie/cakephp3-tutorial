<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
	<div class="panel">
		<h2 class="text-center">Login</h2>
		<?= $this->Form->create(null,['type' => 'post']); ?>
		<?= $this->Form->control('username'); ?>
		<?= $this->Form->control('password', array('type' => 'password')); ?>
		<?= $this->Form->submit('Login', array('class' => 'button')); ?>
		<?php echo $this->Html->link(
			['action' => 'register'],
		); ?>
		<?= $this->Form->end(); ?>
	</div>
</div>