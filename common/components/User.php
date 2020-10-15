<?php

/*
 * 2014-06-25
 * prawee@hotmail.com
 */

namespace common\components;

class User extends \yii\web\User {
    public $identityClass = '\common\models\User';

    public function checkAccess($operation, $params = [], $allowCaching = true) {
        // Always return true when SuperAdmin user
        if (\Yii::$app->user->id == 1) {
            return true;
        }
        return parent::can($operation, $params, $allowCaching);
    }
}

?>
