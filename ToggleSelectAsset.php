<?php
namespace szaboolcs\toggleselect;

use yii\web\AssetBundle;

class ToggleSelectAsset extends AssetBundle
{
	public $js = ['js/toggle-select.js'];
	
	public function init()
	{
		$this->sourcePath = __DIR__ . '/assets';
		
		parent::init();
	}
}