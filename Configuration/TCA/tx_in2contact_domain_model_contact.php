<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:tx_in2contact_domain_model_contact',
        'label' => 'last_name',
        'label_alt' => 'first_name',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,first_name,last_name,company,phone,fax,email,link,description,date_of_birth',
        'iconfile' => 'EXT:in2contact/Resources/Public/Icons/tx_in2contact_domain_model_contact.svg'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, gender, ' .
            'title, first_name, last_name, company, phone, fax, email, link, description, date_of_birth, ' .
            'image, attachments',
    ],
    'types' => [
        '1' => [
            'showitem' => 'gender, title, first_name, last_name, company, phone, fax, email, link, description, ' .
                'date_of_birth, image, attachments, ' .
                '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, sys_language_uid,' .
                ' l10n_parent, l10n_diffsource, hidden, starttime, endtime'
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_in2contact_domain_model_contact',
                'foreign_table_where' => 'AND tx_in2contact_domain_model_contact.pid=###CURRENT_PID### ' .
                    'AND tx_in2contact_domain_model_contact.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'gender' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.gender',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0
                    ],
                    [
                        'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                        'tx_in2contact_domain_model_contact.gender.1',
                        1
                    ],
                    [
                        'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                        'tx_in2contact_domain_model_contact.gender.2',
                        2
                    ]
                ],
                'default' => 0,
            ]
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'first_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.first_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'last_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.last_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'company' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.company',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'fax' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.fax',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.link',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'wizards' => [
                    'link' => [
                        'type' => 'popup',
                        'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:' .
                            'header_link_formlabel',
                        'icon' => 'actions-wizard-link',
                        'module' => [
                            'name' => 'wizard_link',
                        ],
                        'JSopenParams' => 'height=800,width=600,status=0,menubar=0,scrollbars=1',
                        'params' => [
                            'blindLinkOptions' => 'mail,spec,folder',
                            'blindLinkFields' => 'class,params,target,title',
                            'allowedExtensions' => 'svg',
                        ],
                    ],
                ],
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
        'date_of_birth' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.date_of_birth',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:' .
                'tx_in2contact_domain_model_contact.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' =>
                            'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        //'attachments' => [
        //    'exclude' => true,
        //    'label' => 'LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:tx_in2contact_domain_model_contact.attachments',
        //    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        //        'attachments',
        //        [
        //            'appearance' => [
        //                'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
        //            ],
        //            'foreign_types' => [
        //                '0' => [
        //                    'showitem' => '
        //                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                    --palette--;;filePalette'
        //                ],
        //                \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
        //                    'showitem' => '
        //                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                    --palette--;;filePalette'
        //                ],
        //                \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
        //                    'showitem' => '
        //                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                    --palette--;;filePalette'
        //                ],
        //                \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
        //                    'showitem' => '
        //                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                    --palette--;;filePalette'
        //                ],
        //                \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
        //                    'showitem' => '
        //                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                    --palette--;;filePalette'
        //                ],
        //                \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
        //                    'showitem' => '
        //                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                    --palette--;;filePalette'
        //                ]
        //            ],
        //            'maxitems' => 1
        //        ]
        //    ),
        //],
    ],
];
