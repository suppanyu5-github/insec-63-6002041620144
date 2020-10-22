<?php

use yii\db\Migration;

/**
 * Class m201022_113443_create_post_permission_to_role
 */
class m201022_113443_create_post_permission_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->getRole('author');
        $admin = $auth->getRole('admin');
        $superAdmin = $auth->getRole('super-admin');

        $listPost = $auth->getPermission('post-index');
        $createPost = $auth->getPermission('post-create');
        $updatePost = $auth->getPermission('post-update');
        $viewPost = $auth->getPermission('post-view');
        $deletePost = $auth->getPermission('post-delete');

        $auth->addChild($author, $createPost);
        $auth->addChild($author, $listPost);
        $auth->addChild($author, $updatePost);
        $auth->addChild($author, $viewPost);

        $auth->addChild($admin, $author);
        
        $auth->addChild($superAdmin, $admin);
        $auth->addChild($superAdmin, $deletePost);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->getRole('author');
        $admin = $auth->getRole('admin');
        $superAdmin = $auth->getRole('super-admin');

        $listPost = $auth->getPermission('post-index');
        $createPost = $auth->getPermission('post-create');
        $updatePost = $auth->getPermission('post-update');
        $viewPost = $auth->getPermission('post-view');
        $deletePost = $auth->getPermission('post-delete');

        $auth->removeChild($author, $createPost);
        $auth->removeChild($author, $listPost);
        $auth->removeChild($author, $updatePost);
        $auth->removeChild($author, $viewPost);

        $auth->removeChild($admin, $author);
        
        $auth->removeChild($superAdmin, $admin);
        $auth->removeChild($superAdmin, $deletePost);


        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_113443_create_post_permission_to_role cannot be reverted.\n";

        return false;
    }
    */
}
