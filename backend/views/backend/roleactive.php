<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;//时间
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$startyearmonth =  '';
$endyearmonth = '';
if(Yii::$app->request->get()){
    $startyearmonth = Yii::$app->request->get('yearmonthstart');
    $endyearmonth = Yii::$app->request->get('yearmonthend');
}
$this->title = '综合管理系统';
?>

<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/sidebar-menu') ?>
<?php $this->endBlock(); ?>
<div class="site-index">
<?php $form = ActiveForm::begin(['method'=>'get','options'=>['class'=>'form-horizontal'],'id' => 'mainForm']); ?>
    <div class="row" style=" padding: 20px 15px" >
            <div style="width: 110px; float:left;font-size: 15px;margin-top:7px">月份区间：</div>
            <div style="width: 200px; float:left;">
                <?= DatePicker::widget([
                    'name' => 'yearmonthstart',
                    'value' => $startyearmonth,
                    'template' => '{addon}{input}',
                    'language' => 'zh-CN',
                    'clientOptions' => [
                      'todayBtn' => 'linked',
                        // 'startView' =>1,
                        // 'maxViewMode' => 2,
                        // 'minViewMode' =>1,
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',

                    ]
                ]);?>
            </div>
            <div style="width: 200px; float:left; ">
                <?= DatePicker::widget([
                    'name' => 'yearmonthend',
                    'value' => $endyearmonth,
                    'template' => '{addon}{input}',
                    'language' => 'zh-CN',
                    'clientOptions' => [
                      'todayBtn' => 'linked',
                        // 'startView' =>1,
                        // 'maxViewMode' => 2,
                        // 'minViewMode' =>1,
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',

                    ]
                ]);?>

            </div>
            <input type="submit" class="btn btn-success" value="查询"/>

           
    </div>
    <?php ActiveForm::end(); ?>
   <?= GridView::widget([
        'id' => "myform",
        'pjax'=>false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'myform'],
        'filterRowOptions'=>['class'=>'filters'],
        'panel'=>[
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> 数据列表</h3>',
            'type'=>'default',
            'footer'=>false
        ],
        'toolbar' => [
          '{export}',
        ],
        'export' => [
            'fontAwesome' => true,
        ],
        'pager'=>[
            'options'=>['class'=>'hidden']//关闭自带分页
        ],
        'persistResize'=>false,


        'columns' => [
            [
                'class'=>'kartik\grid\CheckboxColumn',
                
                'headerOptions'=>['class'=>'my-table'],
            ],

            'buildname',

        
            'projectname',
            [
              'attribute' => 'qddate',
              'value' => 'finance.qddate',
              'format' => ['date', 'Y-M-d'],
              'label' => '合同签订日期',
            ],
            [
              'attribute' => 'htmoney',
              'value' => 'finance.htmoney',
              'label' => '合同金额（万元）',
            ],
            [
              'attribute' => 'writename',
              'value' => 'filemanage.writename',
              'label' => '项目编写人',
            ],
     
            'projectuser',
            'jindu',
            ['class' => 'kartik\grid\ActionColumn',
                'header' => '操作',
                'template' => '',
                'headerOptions' => ['width' => '200'],
                'buttons' => [
                    

                ],
            ],
  


  
        ],
    ]); ?>
        <?= \backend\components\GoLinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'go' => true,
        ]); ?>
</div>
<?php $this->beginBlock('footer_scripts'); ?>
<script>



</script>

<?php $this->endBlock(); ?>
