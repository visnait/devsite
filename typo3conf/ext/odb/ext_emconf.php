
<?php
$EM_CONF[$_EXTKEY] = array(
    'title' => 'ODB2 DB ',
    'description' => 'ODB2 code base',
    'category' => 'plugin',
    'author' => 'Tibor Višnai   ',
    'author_company' => '',
    'author_email' => 'visnait@gmail.com',
    'dependencies' => 'extbase,fluid',
    'state' => 'alpha',
    'clearCacheOnLoad' => '1',
    'version' => '0.0.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.0-7.6.99',
            'extbase' => '1.0.0-0.0.0',
            'fluid' => '7.6.0-0.0.0',
        )
    )
);