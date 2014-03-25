
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/smac">SMAC</a>
        </div>
        <?php if(AuthComponent::user('id')){?>
        
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/smac">Home</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtor<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/smac/produtores">Listar Produtores</a></li>
					<li><a href="/smac/produtores/add">Cadastrar Produtor</a></li>
					<li class="divider"></li>
					<li><a href="/smac/pessoas">Listar Pessoas</a></li>
					<li><a href="/smac/pessoas/add">Cadastrar Pessoas</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Propriedade<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/smac/propriedades">Listar Propriedade</a></li>
					<li><a href="/smac/propriedades/add">Cadastrar Propriedade</a></li>
					<li class="divider"></li>
					<li><a href="/smac/pessoas">Listar Pessoas</a></li>
					<li><a href="/smac/pessoas/add">Cadastrar Pessoas</a></li>
				</ul>
			</li>
          </ul>

		  <ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo AuthComponent::user('username')?> <b
						class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php if(AuthComponent::user('role') == 'admin'){?>
						<li><a href="<?php echo $this->params->webroot?>usuarios/index"><i class="fa fa-gear"></i>Gerenciar Usuários</a></li>
						<li class="divider"></li>
					<?php }?>
					<li><a href="<?php echo $this->params->webroot?>logout"><i class="fa fa-power-off"></i> Sair</a></li>
				</ul>
			</li>
		  </ul>
		  <?php }?>
        </div><!--/.nav-collapse -->
      </div>
    </div>