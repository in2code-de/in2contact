<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'In2code.In2contact',
            'Pi1',
            'Personenliste'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'in2contact',
            'Configuration/TypoScript',
            'In2contact'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_in2contact_domain_model_contact'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
            'in2contact',
            'tx_in2contact_domain_model_contact'
        );
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['in2contact_pi1'] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            'in2contact_pi1',
            'FILE:EXT:in2contact/Configuration/FlexForm/FlexFormPi1.xml'
        );
    }
);
