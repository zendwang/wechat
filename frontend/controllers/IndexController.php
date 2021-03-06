<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class IndexController extends Controller
{

    public  $wechat;
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->wechat = Yii::$app->wechat;
    }
    public function actionIndex() {
        return 'index';
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionWeixin()
    {

        if (!isset($_GET['echostr'])) {
            //$this->wechat->createMenu([
            //    ['type' => 'click', 'name' => '今日歌曲', 'key' => 'V1001_TODAY_MUSIC'],
            //    ['type' => 'view', 'name' => '搜索', 'url' => 'http://www.soso.com']
            //]);
        }else{
            $echoStr = $_GET["echostr"];
            if($this->wechat->checkSignature()){
                return $echoStr;
            }
        }
    }
}
