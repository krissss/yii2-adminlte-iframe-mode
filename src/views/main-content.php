<?php
/* @var $this \yii\web\View */
/* @var $content string */

\kriss\iframeLayout\widget\IframeModeAssetWidget::widget();

use dmstr\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="renderer" content="webkit">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="<?= \dmstr\helpers\AdminLteHelper::skinClass() ?>">
    <?php $this->beginBody() ?>

    <div class="wrapper">

        // header.php ...
        // left.php ...

        <div class="content-wrapper">
            <ul class="menu-tabs hidden">
                <li>
                    <?= Html::a('<span><i class="fa fa-home"></i></span>', '#') ?>
                </li>
            </ul>
            <div class="content-iframe">
                <section class="content-header">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'homeLink' => ['label' => '首页', 'url' => ['/home']],
                    ]) ?>
                </section>

                <section class="content">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </section>
            </div>
        </div>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
