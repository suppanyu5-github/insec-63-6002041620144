<?php

namespace backend\models;

class AuthAssignment extends \common\models\AuthAssignment{
    public function getUserName(){
        return $this -> hasOne(User::class,[ 'id' => 'user_id']);
    }

    public function attributeLabels(){
        
        return array_merge(parent::attributeLabels(),[
            'item_name' => 'Role',
            'user_id' => 'Username',
        ]);
        
        /*return[
            'item_name' => 'Role',
            'user_id' => 'Username',
            'created_at' => 'Created At',

        ]*/
    }
}
?>