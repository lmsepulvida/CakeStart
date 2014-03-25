<div class="usuarios form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Usuario'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Usuarios'), array('action' => 'index'), array('escape' => false)); ?></li>
						</ul>
					</div>
				</div>
			</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Usuario', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('username', array('label' => __('Username'), 'class' => 'form-control', 'placeholder' => 'Usuário'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('password', array('label' => __('Password'), 'class' => 'form-control', 'placeholder' => 'Senha'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('role', array('label' => __('Role'), 'class' => 'form-control', 'placeholder' => 'Perfil',  'options' => array('admin' => 'Admin', 'usuario' => 'Usuário'), 'selected' => 'usuario'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
