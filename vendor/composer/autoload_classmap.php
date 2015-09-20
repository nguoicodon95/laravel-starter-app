<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AuthController' => $baseDir . '/app/controllers/AuthController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'CreateOwnershipsTable' => $baseDir . '/app/database/migrations/2015_09_19_020742_create_ownerships_table.php',
    'CreatePhotosTable' => $baseDir . '/app/database/migrations/2015_09_03_085734_create_photos_table.php',
    'CreatePostsTable' => $baseDir . '/app/database/migrations/2015_09_02_185012_create_posts_table.php',
    'CreatePostsphotosTable' => $baseDir . '/app/database/migrations/2015_09_19_022212_create_postsphotos_table.php',
    'CreateProfilesTable' => $baseDir . '/app/database/migrations/2015_09_19_020836_create_profiles_table.php',
    'CreateTaggablesTable' => $baseDir . '/app/database/migrations/2015_09_06_071839_create_taggables_table.php',
    'CreateTagsTable' => $baseDir . '/app/database/migrations/2015_09_02_185116_create_tags_table.php',
    'CreateUsersTable' => $baseDir . '/app/database/migrations/2015_09_19_020644_create_users_table.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'FileHelper' => $baseDir . '/app/helpers/FileHelper.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'InstallHelper' => $baseDir . '/app/helpers/InstallHelper.php',
    'Parsedown' => $baseDir . '/app/libs/parsedown/Parsedown.php',
    'ParsedownHelper' => $baseDir . '/app/helpers/ParsedownHelper.php',
    'Photo' => $baseDir . '/app/models/Photo.php',
    'PhotosController' => $baseDir . '/app/controllers/PhotosController.php',
    'Post' => $baseDir . '/app/models/Post.php',
    'PostHelper' => $baseDir . '/app/helpers/PostHelper.php',
    'PostsController' => $baseDir . '/app/controllers/PostsController.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'StreamController' => $baseDir . '/app/controllers/StreamController.php',
    'StreamFile' => $baseDir . '/app/models/StreamFile.php',
    'StreamPost' => $baseDir . '/app/models/StreamPost.php',
    'StreamUser' => $baseDir . '/app/models/StreamUser.php',
    'Streamv2Controller' => $baseDir . '/app/controllers/Streamv2Controller.php',
    'Tag' => $baseDir . '/app/models/Tag.php',
    'TagsController' => $baseDir . '/app/controllers/TagsController.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'UsersSeeder' => $baseDir . '/app/database/seeds/UsersSeeder.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
);
