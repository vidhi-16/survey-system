<head><link rel="stylesheet" href="<?= base_url('css/style_pro.css') ?>"></head>
<form method="post" enctype="multipart/form-data" action="/admin/upload">

<input type="text" name="survey_name" placeholder="Survey Name">

<input type="file" name="csv">

<button type="submit">Upload</button>

</form>

<hr>
<?php foreach($surveys as $survey): ?>
<div>
<tr>
    <td><?= $survey['topic_name'] ?></td>

    <td>
    <?php $url = base_url('survey/'.$survey['id']); ?>

    <a href="<?= $url ?>" target="_blank">
        <?= $url ?>
    </a>
</td>

    <td>
        <span class="<?= $survey['status']=='on' ? 'status-on' : 'status-off' ?>">
            <?= strtoupper($survey['status']) ?>
        </span>
    </td>

    <td>
        <a href="<?= base_url('admin/toggle/'.$survey['id']) ?>"
           class="<?= $survey['status']=='on' ? 'disable' : 'enable' ?>">
           <?= $survey['status']=='on' ? 'Disable' : 'Enable' ?>
        </a>

        <a href="<?= base_url('admin/export/'.$survey['id']) ?>" class="download">
            Download
        </a>
    </td>
</tr>
</div>
<?php endforeach; ?>

