<?php

/*
 * @var $this yii\web\View
 * @var $message string
 */

use yii\helpers\Html;

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h2><?= $message ?></h2>
    <p>
        This is the Test page. You may modify the following file to customize its content:
    </p>


    <code><?= __FILE__ ?></code>
</div>
