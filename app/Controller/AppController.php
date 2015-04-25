<?php

App::uses('CroogoAppController', 'Croogo.Controller');

class AppController extends CroogoAppController {

	public function beforefilter() {
		parent::beforefilter();
		if(empty($this->params->params['admin'])){
			unset($this->helpers['Wysiwyg.Wysiwyg']);
			unset($this->helpers['Ckeditor.Ckeditor']);
		}
	}
}
