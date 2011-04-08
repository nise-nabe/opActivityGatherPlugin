<?php

/**
 * PluginGatherActivity form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginGatherActivityForm extends BaseGatherActivityForm
{
	public function setup(){
		parent::setup();
		$this->setWidget('activity', new sfWidgetFormSelectCheckBox(array(
			'choices' => ''
		)));
		$this->useFields(array('activity'));
	}
}
