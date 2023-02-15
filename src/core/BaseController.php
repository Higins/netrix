<?php
namespace Core;

class BaseController {
	public function render(string $model, string $view, array $data) {
		extract($data);
        include "../src/view/".$model ."/".$view.".php";
	 }
  }

