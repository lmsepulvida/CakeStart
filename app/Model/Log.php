<?php

class Log extends AppModel {

	var $name = 'Log';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Usuario' => array('className' => 'Usuario',
					'foreignKey' => 'usuario_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

}

?>