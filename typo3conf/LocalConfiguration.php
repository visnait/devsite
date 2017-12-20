<?php
return [
    'BE' => [
        'debug' => true,
        'explicitADmode' => 'explicitAllow',
        'installToolPassword' => '$pbkdf2-sha256$25000$XoflFUw.rlvXx4p07Adlgw$eUjl1c.Znqd4JA1DNYKRIMMPxAbZss8HERKsYK1dK0o',
        'loginSecurityLevel' => 'rsa',
    ],
    'DB' => [
        'Connections' => [
            'Default' => [
                'charset' => 'utf8',
                'dbname' => 'u891076453_sahun',
                'driver' => 'mysqli',
                'host' => 'mysql',
                'password' => 'DeGyJyWapa',
                'port' => 3306,
                'user' => 'u891076453_pabat',
            ],
        ],
    ],
    'EXT' => [
        'extConf' => [
            'fluidcontent' => 'a:0:{}',
            'fluidpages' => 'a:3:{s:8:"autoload";s:1:"1";s:8:"doktypes";s:0:"";s:33:"pagesLanguageConfigurationOverlay";s:1:"0";}',
            'flux' => 'a:4:{s:9:"debugMode";s:1:"0";s:7:"compact";s:1:"0";s:17:"listNestedContent";s:1:"0";s:12:"handleErrors";s:1:"0";}',
            'rsaauth' => 'a:1:{s:18:"temporaryDirectory";s:0:"";}',
            'saltedpasswords' => 'a:2:{s:3:"BE.";a:4:{s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\Pbkdf2Salt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}s:3:"FE.";a:5:{s:7:"enabled";i:1;s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\Pbkdf2Salt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}}',
            'vhs' => 'a:1:{s:20:"disableAssetHandling";s:1:"0";}',
        ],
    ],
    'FE' => [
        'debug' => true,
        'loginSecurityLevel' => 'rsa',
    ],
    'GFX' => [
        'jpg_quality' => '80',
        'processor' => 'ImageMagick',
        'processor_allowTemporaryMasksAsPng' => '',
        'processor_colorspace' => 'RGB',
        'processor_effects' => '0',
        'processor_enabled' => '1',
        'processor_path' => '/usr/bin/',
        'processor_path_lzw' => '/usr/bin/',
    ],
    'MAIL' => [
        'transport' => 'sendmail',
        'transport_sendmail_command' => '/usr/sbin/sendmail -t -i',
        'transport_smtp_encrypt' => '',
        'transport_smtp_password' => '',
        'transport_smtp_server' => '',
        'transport_smtp_username' => '',
    ],
    'SYS' => [
        'caching' => [
            'cacheConfigurations' => [
                'extbase_object' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'frontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend',
                    'groups' => [
                        'system',
                    ],
                    'options' => [
                        'defaultLifetime' => 0,
                    ],
                ],
            ],
        ],
        'devIPmask' => '*',
        'displayErrors' => 1,
        'enableDeprecationLog' => 'file',
        'encryptionKey' => '6404113197b0b249b688964ad81154a8b81d903d74fbe2a1a35d4294ec60a3a50d8431052ac61857f872fca71556066a',
        'exceptionalErrors' => 28674,
        'isInitialDatabaseImportDone' => true,
        'isInitialInstallationInProgress' => false,
        'sitename' => 'Dev site',
        'sqlDebug' => 1,
        'systemLogLevel' => 0,
    ],
];
