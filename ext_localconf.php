<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'In2code.In2contact',
            'Pi1',
            [
                'Contact' => 'list, list2, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Contact' => 'list, list2, create, update, delete'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        pi1 {
                            iconIdentifier = in2contact-plugin1
                            title = LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:plugin1.title
                            description = LLL:EXT:in2contact/Resources/Private/Language/locallang_db.xlf:plugin1.description
                            tt_content_defValues {
                                CType = list
                                list_type = in2contact_pi1
                            }
                        }
                    }
                    show = *
                }
            }'
        );
    }
);
