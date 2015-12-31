<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name',
            'population',
            'createtime',

            ['class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {update} {delete} {author} {author2}',
                'buttons' => [
                    'author' => function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Author Add'),
                            'aria-label' => Yii::t('yii', 'Author'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to author add this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ], []);
                        return Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', $url, $options);
                    },
                    'author2' => function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Author Remove'),
                            'aria-label' => Yii::t('yii', 'Author Remove'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to author remove this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ], []);
                        return Html::a('<span class="glyphicon glyphicon-minus-sign"></span>', $url, $options);
                    },
                ]
            ],
        ],
    ]); ?>

</div>
