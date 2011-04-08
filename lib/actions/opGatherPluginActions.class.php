<?php

class opGatherPluginActions extends sfActions{
 /**
  * Executes index action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  // Action to gather activities and make title and description
  public function executeCreate(sfWebRequest $request)
  {
    $this->acts = $request->getParameter('activities');
    // if there is no selected activities 
    if(count($this->acts)==0)
    {
        $this->forward('error');
    }


    $form = new GatherDataForm();
    $form->setWidget('activities', new sfWidgetFormInputHidden());
    $form->setDefault('activities', implode(' ', $this->acts));
    $this->form = $form;
  }
  
  // Action to make gathered data in DB
  public function executeMake(sfWebRequest $request)
  {
    $gatherdata = $request->getParameter('gather_data');
    $data = new GatherData();
    $data->setTitle($gatherdata['title']);
    $data->setDescription($gatherdata['description']);
    foreach(preg_split('/[\s]+/u',$gatherdata['activities'] , -1, PREG_SPLIT_NO_EMPTY) as $activityId)
    {
       $adata = new GatherActivity();
       $adata->setActivityId($activityId);
       $data->GatherActivities[] = $adata;
    }
    $data->save();
    $this->data = $data;
    $this->setTemplate('show');
  }

  public function executeShow(sfWebRequest $request)
  {
    //$this->data = Doctrine::getTable('GatherData')->find();
  }

  // Action to show all gathered datas.
  public function executeShowAll(sfWebRequest $request) 
  {
    $this->data = Doctrine::getTable('GatherData')->findAll(Doctrine_Core::HYDRATE_NONE);
  }
}
?>
