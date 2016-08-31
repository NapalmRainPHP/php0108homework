<?php
class Templater {
	private $opinions;
	public function __construct ($opinions=NULL) {
		$this->opinions = $opinions;
	}

	public function parse($templateName) {
		$html = file_get_contents('/templates/'.$templateName.'/index.html');
		if ((isset($this->opinions))&&($this->opinions!=NULL)&&(!empty($this->opinions))) {
			foreach ($this->opinions AS $key=>$value) {
				if ((!empty($key))&&(!empty($value))&&(!is_array($value))) {
					$html = str_replace('{*'.strtoupper($key).'*}', $value, $html);
				}
			}
		}
		$html = preg_replace('!\{\*(.*?)\*\}!si', '', $html);
		return $html;
	}
}