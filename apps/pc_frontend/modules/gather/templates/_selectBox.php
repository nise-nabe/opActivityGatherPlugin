<?php  $title = 'ギャザー'; ?>
<?php $id = 'gatherBox' ?>
<?php $id .= isset($gadget) ? '_'.$gadget->getId() : '' ?>

<?php slot('activities') ?>
<div class="box_list">
<ol id="<?php echo $id ?>_timeline" class="activities">
<?php foreach ($activities as $activity): ?>
<?php include_partial('gather/myActivityRecord', array('activity' => $activity)); ?>
<?php endforeach; ?>
</ol>
</div>
<?php end_slot(); ?>

<?php $params = array(
  'title' => isset($title) ? $title : __('%activity% of %my_friend%', array(
    '%activity%' => $op_term['activity']->titleize(),
    '%my_friend%' => $op_term['my_friend']->titleize()->pluralize())
  ),
  'class' => 'activityBox',
  'form' => $this->form
) ?>

<form id="<?php echo $id ?>_form" action="<?php echo url_for('gather/create') ?>" method="post"><div class="box_form">
<?php echo $form->renderHiddenFields(), "\n" ?>
<?php op_include_box($id, get_slot('activities'), $params) ?>
<span class="submit"><input id="<?php echo $id ?>_submit" type="submit" value="集める" class="submit" /></span>
</div></form>

