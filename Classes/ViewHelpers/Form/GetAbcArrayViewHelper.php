<?php
namespace In2code\In2contact\ViewHelpers\Form;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class GetAbcArrayViewHelper
 */
class GetAbcArrayViewHelper extends AbstractViewHelper
{

    /**
     * @return array
     */
    public function render(): array
    {
        return range('A', 'Z');
    }
}
