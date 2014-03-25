<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 */

class Usuario extends AppModel {
	
	//var $actsAs = array('WhoDidIt');
	var $actsAs = array('Logs');
	
	public $name = 'Usuario';
	public $validate = array(
			'username' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Digite o nome de usuário'
					)
			),
			'password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'Digite uma senha',
							'on' => 'create'
					)
			),
			'role' => array(
					'valid' => array(
							'rule' => array('inList', array('admin', 'usuario')),
							'message' => 'Por favor, selecione uma permissão',
							'allowEmpty' => false
					)
			)
	);
	
	
	public function beforeSave($options = array())
	{
		if(isset($this->data['Usuario']['password']))
		{
			$this->data['Usuario']['password'] = AuthComponent::password($this->data['Usuario']['password']);
		}
		return TRUE;
	}
	
}