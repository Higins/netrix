<?php
namespace Controller;

use Model\ActiveCollabModel;
use Core\BaseController;


class ActiveCollabController {

	public $model;
	public $base;

	public function __construct() {
		$this->model = new ActiveCollabModel();
		$this->base = new BaseController();
	}

	public function index() {
		return $this->base->render('activecollab','index',$this->model->getTaskListByAsc());
	}

}

