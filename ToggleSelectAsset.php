<?php
namespace szaboolcs\toggleselect;

use yii\web\AssetBundle;

class ToggleSelectAsset extends AssetBundle
{
	public function init()
	{
		$this->sourcePath = __DIR__ . '/assets';
		$this->js         = [
			'js/toggle-select.js'
		];

		parent::init();
	}
}