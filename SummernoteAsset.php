<?php

namespace marqu3s\summernote;

use Yii;
use yii\web\AssetBundle;

class SummernoteAsset extends AssetBundle
{
    /** @var string */
    public $sourcePath = '@bower/summernote/dist';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $postfix = YII_DEBUG ? '' : '.min';

        if (!isset(Yii::$app->params['bsVersion'])) {
            $this->css[] = 'summernote-lite.css';
            $this->js[] = 'summernote-lite' . $postfix . '.js';
        } else if (Yii::$app->params['bsVersion'] == 4) {
            $this->depends = ['yii\bootstrap4\BootstrapPluginAsset'];
            $this->css[] = 'summernote-bs4.css';
            $this->js[] = 'summernote-bs4' . $postfix . '.js';
        } else {
            $this->depends = ['yii\bootstrap\BootstrapPluginAsset'];
            $this->css[] = 'summernote.css';
            $this->js[] = 'summernote' . $postfix . '.js';
        }

        parent::init();
    }
}
