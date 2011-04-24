<?
?>

<?php
$gatherActivities = Doctrine::getTable('GatherActivity')->createQuery()->where('gather_data_id = ?', $data->getId())->fetchArray();
$activityIds = array();

foreach ($gatherActivities as $gatherActivity){
	array_push($activityIds, $gatherActivity['activity_id']);
}
$activities = Doctrine::getTable('ActivityData')->createQuery()->whereIn('id', $activityIds)->execute();
?>

<tr>
	<th>タイトル</th>
	<td><?php print($data->getTitle()) ?></td>
</tr>
<tr>
	<th>詳細</th>
	<td><?php print($data->getDescription()) ?></td?
</tr>

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

