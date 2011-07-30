<?php

class Router extends Controller{
	
	public function page_controller(){
		//Now loop through the routes array:
		foreach($this->routes['url'] as $key => $value){
			//Check if that's what they enterred:
			$router = explode('/', $key);
			$route_to = explode('/', $value);
			if($this->controller == $router[0] || ( $this->controller == $router[0] && $this->method == $router[1])){
				//Then route them:
				if($router[0] == "article"){
					$category = str_replace($router[1], $this->URI->get(1), $router[1]);
					$article = str_replace($router[2], $this->URI->get(2), $router[2]);

					/* Check if it matches: */
					if(!empty($this->URI->url[1]) && !empty($this->URI->url[2])){
						//Then all is there:
						$controller = $route_to[0];
						$method = $route_to[1];
							
						$param = $route_to[2];
							
						/* Check to see if there are parameters to send */
						$last = substr($param, -1, 1);
						$first = substr($param, 0, 1);
						if($first == "(" && $last == ")"){
							/* Re-route them to the controller, method wth parameters. */
							$this->URI->set_controller($controller);
							$this->URI->set_method($method, array('category' => $category, 'article' => $article));
						}
					}

				} else {
					$new_route = explode('/', $value);
					$this->URI->set_controller($new_route[0]);
					$this->URI->set_method($new_route[1]);
				}
			}
		}
		
		
		//Now load the page's controller and also the method:
		$controller = Registry::createObject($this->controller, APP . CONTROLLER . $this->controller . EXT);
		if(method_exists($controller, $this->routes['default_method'])){
			$controller->{$this->routes['default_method']}();
		}
		
	}

}