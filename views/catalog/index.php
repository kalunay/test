<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;

$this->title = $title;

?>
<h1><?php echo $this->title; ?></h1>

<div class="filters">
    <form class="form-inline" method="post" id="form-filter">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <select class="custom-select my-1 mr-sm-2" name="category">
            <option value="0" selected>Марка автомобиля</option>
            <?php foreach($categories as $category): ?>
            <option value="<?php echo $category->link; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
        <select class="custom-select my-1 mr-sm-2" name="model">
            <option value="0" selected>Модель</option>
            <?php foreach($models as $model): ?>
            <option value="<?php echo $model->link; ?>"><?php echo $model->name; ?></option>
            <?php endforeach; ?>
        </select>             
        <select class="custom-select my-1 mr-sm-2" name="engine">
            <option value="0" selected>Тип двигателя</option>
            <?php foreach($engines as $engine): ?>
            <option value="<?php echo $engine->id; ?>"><?php echo $engine->name; ?></option>
            <?php endforeach; ?>
        </select>     
        <select class="custom-select my-1 mr-sm-2" name="drive">
            <option value="0" selected>Привод</option>
            <?php foreach($drives as $drive): ?>
            <option value="<?php echo $drive->id; ?>"><?php echo $drive->name; ?></option>
            <?php endforeach; ?>
        </select>        
        <button type="submit" class="btn btn-primary my-1">Поск</button>
    </form>
</div>

<?= ListView::widget([
    'dataProvider' => $cars,
    'itemView' => '_car',
    'layout' => "{items}\n{pager}",
    'options' => [
        'class' => 'row'
    ],
    'itemOptions' => [
        'tag' => 'div',
        'class' => 'col-md-4'
    ]
]) ?>

<?php
$this->registerJs( <<< EOT_JS_CODE

    $('#form-filter').submit(function(e){
        var form = $(this);
        if(form.serializeArray()[1]['value'] != 0 || form.serializeArray()[2]['value'] != 0){
            e.preventDefault();
            window.location.replace('/web/catalog' + ((form.serializeArray()[1]['value'] != 0) ? '/'+form.serializeArray()[1]['value'] : '') + ((form.serializeArray()[2]['value'] != 0) ? '/'+form.serializeArray()[2]['value'] : ''));
        }
    });

EOT_JS_CODE
);
?>