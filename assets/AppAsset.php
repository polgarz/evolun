<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'css/main.css'
    ];

    public $js = [
        'https://cdn.jsdelivr.net/npm/vue-resource@1.5.1',
        'https://unpkg.com/vuejs-paginate@latest'
    ];

    public $depends = [
        'app\assets\AdminLTEAsset',
    ];

    public function init()
    {
        if (YII_ENV_DEV) {
            array_unshift($this->js, 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
        } else {
            array_unshift($this->js, 'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js');
        }
    }
}
