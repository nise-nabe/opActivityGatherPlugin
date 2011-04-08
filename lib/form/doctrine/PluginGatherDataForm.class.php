<?php

/**
 * PluginGatherData form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginGatherDataForm extends BaseGatherDataForm
{
	public function setup(){
		parent::setup();
		$this->setValidator('title', new opValidatorString(array('max_length' => 100, 'trim' => true)));
		$this->setValidator('description', new opValidatorString(array('max_length' => 400)));
	}
}
