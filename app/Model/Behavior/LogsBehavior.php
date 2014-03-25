<?php
/**
 * Behavior for log actions of tables.
 *
 * Behavior to simplify logs
 *
 * PHP versions 5
 *
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright	Copyright 2005-2008.
 * @link		http://www.michaelmafort.com.br
 * @since		12-07-2009
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Behavior to register log to all actions in your table model
 *
 */

App::import('Model','Log');
//App::import('Session');

class LogsBehavior extends ModelBehavior {

	/**
	 * Current model
	 *
	 * @var Object
	 */
	private $Model;

	/**
	 * Session component object
	 *
	 * @var Object
	 */
	//private $Session;

	/**
	 * Old data
	 * last data from model before modified
	 *
	 * @var array
	 */
	private $_oldData;

	/**
	 * New data
	 * new value from model after modified
	 *
	 * @var array
	 */
	private $_newData;

	/**
	 * Model log
	 *
	 * @var Object
	 */
	private $Log;

	/**
	 * Action
	 * type of action called
	 *
	 * @var string
	 */
	private $_action;

	/**
	 * Deleted id
	 * id from data to delete
	 *
	 * @var int
	 */
	private $_deletedId;

	/**
	 * Setup method
	 *
	 * Configure this behavior
	 *
	 * @param ObjectModel $model
	 * @param array $config
	 */
	public function setup(Model $model, $config = null){
		$this->Model = $model;
		//$this->Session = new SessionComponent();
		$this->Log = new Log();
	}

	/**
	 * Before save
	 *
	 * @param ObjectModel $model
	 * @return boolean true
	 */
	public function beforeSave(Model $model, $options=array()){
		if( is_numeric($this->Model->id) ){
			$this->_action = 'edit';
			$newData = $this->Model->find('first', array('conditions'=> array( "{$this->Model->name}.id" => $this->Model->data[$this->Model->name]['id'] ) ) );

			foreach( $newData[$this->Model->name] as $input => $value ){
				$this->_oldData .= "$input => $value | ";
			}

		}
		else
			$this->_action = 'add';

		return true;
	}

	/**
	 * After save
	 *
	 * @param objectModel $model
	 * @param string $created
	 * @return boolean true
	 */
	public function afterSave(Model $model, $created, $options=array()){
		$newData = $this->Model->read(null, $this->Model->id);
		foreach( $newData[$this->Model->name] as $input => $value ){
			$this->_newData .= "$input => $value | ";
		}
		$this->write();
		return true;
	}

	/**
	 * Before delete
	 *
	 * @param objectModel $model
	 * @param boolean $cascade
	 * @return boolean true
	 */
	public function beforeDelete(Model $model, $cascade=true){

		$this->_action = 'delete';
		//$this->_deletedId = $this->Model->data[$this->Model->name]['id'];
		$newData = $this->Model->read(null, $this->Model->id);

		foreach( $newData[$this->Model->name] as $input => $value ){
			$this->_oldData .= "$input => $value | ";
		}

		return true;
	}

	/**
	 * After delete action
	 *
	 * @param ObjectModel $model
	 * @return boolean true
	 */
	public function afterDelete(Model $model){
		$this->write();
		return true;
	}

	/**
	 * Write log
	 *
	 * @return void
	 */
	public function write(){
		if( $this->Model->name == 'Log' )
			return true;

		$this->Log->id = null;
		$this->Log->save(array(
				'Log'=>array(
						'usuario_id' => AuthComponent::user('id'),
						'model' => $this->Model->name,
						'action' => $this->_action,
						'old_data' => $this->_oldData,
						'new_data' => $this->_newData
				)
		));
	}

}
?>