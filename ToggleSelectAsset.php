<?php
namespace szaboolcs\toggleselect;

use yii\web\AssetBundle;

class ToggleSelectAsset extends AssetBundle
{
	public function init()
	{
		$this->setSourcePath(__DIR__ . '/assets');
		$this->setupAssets('js', ['js/toggle-select.js']);

		parent::init();
	}
}