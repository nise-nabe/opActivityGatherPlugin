<?php
class opGatherPluginComponents extends opMemberComponents {
	public function executeSelectBox(sfWebRequest $request) {
    		$this->activities = Doctrine::getTable('ActivityData')->getAllMemberActivityList($this->gadget->getConfig('row'));
		$this->form = new GatherActivityForm();
	}
}
?>
