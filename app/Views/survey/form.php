<form method="post" action="/survey/submit">

<input type="hidden" name="survey_id" value="<?= $survey['id'] ?>">

<?php foreach($questions as $q): ?>

<p><?= $q['question'] ?></p>

<?php
$options = json_decode($q['wrong_options']);
$options[] = $q['correct_answer'];
shuffle($options);
?>

<?php foreach($options as $option): ?>

<input type="radio" name="answer[<?= $q['id'] ?>]" value="<?= $option ?>">
<?= $option ?><br>

<?php endforeach; ?>

<hr>

<?php endforeach; ?>

<button type="submit">Submit</button>

</form>