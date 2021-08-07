<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.





return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Early Warning System Inventaris Fakultas Sains & Teknologi UNIVERSITAS PGRI YOGYAKARTA',
	'theme'=>'smartadmin',
	/*'homeUrl'=>array('index.php/web'),*/
	 /*'defaultController' => 'web',*/ 
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.app.models.Tblmenu',
		'application.modules.app.models.Kendalibloksistem',
		'application.modules.app.models.Kendaliproses',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'$#EWSKAMPUSS%',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'app', // load modul utama
		'backend',
		'referensi',
		'kontent',
		'aset',
		'laporan',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
   		// 'counter' => array(
     //        'class' => 'UserCounter',
     //    ),
        'class'=>'application.components.EWebUser',
        'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
        ),
        'userCounter' => array(
            // Use this when you copied the file to components folder
            'class' => 'application.components.UserCounter',

            // ... or this for extensions folder
            // 'class' => 'ext.UserCounter',

            // You can setup these options:
            // 'tableUsers' => 'pcounter_users',
            // 'tableSave' => 'pcounter_save',
            // 'autoInstallTables' => true,
            // 'onlineTime' => 10, // min
        ),


       //itswitch 
		
		//end itswitch

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false, // jangan tampilkan index.php di URL
			'rules'=>array(
				'web/page/<id>'=>'web/page/id/<id>',
				'web/page/<id>/<dummy>'=>'web/page/id/<id>',
				'web/diskusi/<id>'=>'web/diskusi/id/<id>',
				'web/diskusi/<id>/<dummy>'=>'web/diskusi/id/<id>',
				'web/kontent/<id>'=>'web/kontent/id/<id>',
				'web/kontent/<id>/<dummy>'=>'web/kontent/id/<id>',
				'web/detail/<id>'=>'web/detail/id/<id>',
				'web/detail/<id>/<dummy>'=>'web/detail/id/<id>',
				'web/grupgallery/<id>'=>'web/grupgallery/id/<id>',
				'web/grupgallery/<id>/<dummy>'=>'web/grupgallery/id/<id>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				),
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=db_ews',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'rohmanmvg@gmail.com',
		'salt'=>'EWSkampus!@#$%^&*()',
	),
);