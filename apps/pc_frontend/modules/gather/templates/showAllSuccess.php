<?php #print_r($data) ?>
<?php foreach($data as $gatherData): ?>
<?php
$gatherId = $gatherData->current();
$gatherActivities = Doctrine::getTable('GatherActivity')->createQuery()->where('gather_data_id = ?', $gatherId)->fetchArray();
$activityIds = array();

foreach ($gatherActivities as $gatherActivity){
	array_push($activityIds, $gatherActivity['activity_id']);
}
$activities = Doctrine::getTable('ActivityData')->createQuery()->whereIn('id', $activityIds)->execute();
#print_r($activityIds);
?>
<?php 
$gatherData->next() ;
$list['タイトル'] = $gatherData->current(); 
$gatherData->next();
$list['詳細'] = $gatherData->current();
$options = array(
	'title' => 'ギャザー',
	'list' => $list,
)
?>
<?php op_include_parts('listBox', 'profile', $options); ?>

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

<?php endforeach ?>
