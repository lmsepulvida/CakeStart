<body>
<div class="col-lg-4 col-lg-offset-4">
		<div class="text-center"><h2>SMAC</h2></div>
		<hr>
		<?php
			echo $this->Form->create('Usuario', array('role' => 'form', 'class' => 'form-signin', 'inputDefaults' => array('div' => 'form-group')));
			echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Digite seu nome de usuário', 'label' => 'Usuário'));
			echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Digite sua senha', 'label' => 'Senha'));
			echo $this->Form->end(array('label' => 'Entrar', 'class' => 'btn btn-lg btn-primary btn-block'));
		?>

		<p>
			<?php echo $this->Html->link('Cadastrar novo Usuário', array('action' => 'add')); ?>
		</p>
</div>
</body>