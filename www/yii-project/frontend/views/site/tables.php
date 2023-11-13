<!---->
<!--<table class="table">-->
<!---->
<!--<tr><td>{$rows['id']}</td><td>{$rows['serial_number']}</td><td>{$rows['store_id']}</td><td>{$rows['created_at']}</td><td>{$rows['updated_at']}</td></tr>-->
<!--</table>-->



<?php


use frontend\models\TablesDeviceAndStoreModel;
use yii\bootstrap5\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;


echo Html::a('Добавить', ['create'], ['class' => 'btn btn-success']);


$dataProvider = new ActiveDataProvider([
    'query' => TablesDeviceAndStoreModel::find(),
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'serial_number',
        [
            'attribute' => 'store_id',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a(
                    $model->store_id,
                    ['store', 'store_id' => $model->store_id],
                    [
                        'data-toggle' => 'modal',
                        'data-target' => '#store-modal',
                        'class' => 'modal-link',
                    ]
                );
            },
        ],
        'about',
        'created_at',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);

// Create a Bootstrap Modal for store_id
Modal::begin([
    'id' => 'store-modal',
    'header' => '<h4 class="modal-title">Store Details</h4>',
]);

echo '<div id="store-modal-content"></div>';

Modal::end();

$js = <<<JS
    // Attach click event to modal links
    $('.modal-link').click(function() {
        var modal = $('#store-modal');
        modal.find('.modal-body').load($(this).attr('href'));
    });
JS;

$this->registerJs($js);




?>