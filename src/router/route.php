<?php

class Router {
        private $_url = [];

        public function addRoute($route, $dest) {
            $this->_url[$route] = $dest;
        }

        public function run() {
            $url = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "";
            foreach ($this->_url as $route => $dest) {
                if("$url" == $route) {
                    $this->parseController($dest);
                    break;
                }
            }
        }

        private function parseController($dest) {

            $goto = explode("@", $dest);

            $controller = $goto[0]."Controller";
			$model = $goto[0]."Model";
            $action = $goto[1];
			require_once("../src/config/setting.php");
			require_once("../src/core/BaseController.php");
			require_once("../src/model/$model.php");
            require_once("../src/controller/$controller.php");


			$class = "Controller\\".$controller;

            $obj = new $class();

            return $obj->$action();
        }
    }

