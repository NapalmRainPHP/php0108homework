<?php
class View {
	public function render($viewName, $params=NULL) {
		require_once 'templater.php';
		if ($params!=null) {
			extract($params, EXTR_OVERWRITE);
		}

		if (is_file('views/'.$viewName.'.php')) {
			require_once 'views/main.php';
			ob_start();
			require_once 'views/'.$viewName.'.php';
			$data['content']=ob_get_clean();
			$templater = new Templater($data);
			$result = $templater->parse('default');
			echo $result;
		} else {
			echo '404V';
		}
	}
}