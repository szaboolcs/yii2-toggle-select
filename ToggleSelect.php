<?php
namespace szaboolcs\toggleselect;

use szaboolcs\toggleselect\ToggleSelectAsset;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\helpers\Json;
use yii\base\InvalidConfigException;

class ToggleSelect extends InputWidget
{
	public $items;
	
	public $options;
	
	public $selection;
	
	public $pluginOptions;
	
	public $template = '<div class="btn-group">{buttons}</div>';
	
	public $buttonTemplate = '{button}';
	
	public function init()
	{
		parent::init();
		
		$this->_registerAssets();
	}
	
	protected function _registerAssets()
	{
		ToggleSelectAsset::register($this->getView());
	}
	
	protected function _renderWidget()
	{
		$pluginOptions                   = $this->pluginOptions;
		$pluginOptions['template']       = $this->template;
		$pluginOptions['buttonTemplate'] = $this->buttonTemplate;
		
		$this->getView()->registerJs('$(\'#' . $this->options['id']. '\').toggleSelect(' . Json::encode($pluginOptions) . ')');
		
		if (!$this->model) {
			if (!$this->options['id']) {
				throw new InvalidConfigException('"id" property must be specified.');
			}
			
			return Html::dropDownList($this->name, $this->selection, $this->items, $this->options);
		}
		
		return Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
	}
	
	public function run()
	{
		parent::run();
		return $this->_renderWidget();
	}
}