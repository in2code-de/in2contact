<?php
namespace In2code\In2contact\ViewHelpers\Form;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class IsFilterArgumentExistingViewHelper
 */
class IsFilterArgumentExistingViewHelper extends AbstractViewHelper
{

    /**
     * @return bool
     */
    public function render(): bool
    {
        $arguments = GeneralUtility::_GP('tx_in2contact_pi1');
        return !empty($arguments['filter']);
    }
}
