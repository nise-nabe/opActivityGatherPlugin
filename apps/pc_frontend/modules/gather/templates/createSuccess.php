<?php
	op_include_form('gather_data_form', $form, array(
		'url' => 'make',
		'title' => 'ギャザー作成'
	));
	$actIds = array();
	for($i = 0; $i < $acts->count(); ++$i){
		array_push($actIds, $acts->current());
		$acts->next();
	}
	$activities = Doctrine::getTable('ActivityData')->createQuery()->whereIn('id', $actIds)->execute();
?>
<div class="partsHeading"><h3>ギャザーアクティビティ</h3></div>
<?php slot('activities') ?>
<div class="box_list">
<ol id="<?php echo $id ?>_timeline" class="activities">
<?php foreach ($activities as $activity): ?>
<?php include_partial('gather/myDefaultActivityRecord', array('activity' => $activity)); ?>
<?php endforeach; ?>
</ol>
</div>
<?php end_slot(); ?>
<?php $params = array(
  'class' => 'activityBox homeRecentList',
) ?>
<?php op_include_box($id, get_slot('activities'), $params) ?>
