<!DOCTYPE html>
<html>

<body>
	<div id="container">
		<div id="content">
			<div class="col-lg-6 text-center">
				<?php echo $this->Html->image('../app/webroot/img/produtor.jpg', array(
						'alt' => 'Cadastrar Produtor',
						'url' => array('controller' => 'produtores', 'action' => 'add'))
					);
				?>
			</div>
			<div class="col-lg-6 text-center panel-default">
				<?php echo $this->Html->image('../app/webroot/img/propriedade.jpg', array(
						'alt' => 'Cadastrar Propriedade',
						'url' => array('controller' => 'propriedades', 'action' => 'add'))
					);
				?>
			</div>
			<div class="col-lg-6 text-center"><h4>Cadastrar Produtor</h4></div>
			<div class="col-lg-6 text-center"><h4>Cadastrar Propriedade</h4></div>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif'),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>

</html>
