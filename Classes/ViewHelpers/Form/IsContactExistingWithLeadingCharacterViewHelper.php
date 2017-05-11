<?php
namespace In2code\In2contact\ViewHelpers\Form;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class IsContactExistingWithLeadingCharacterViewHelper
 */
class IsContactExistingWithLeadingCharacterViewHelper extends AbstractViewHelper
{

    /**
     * @param QueryResultInterface $contacts
     * @param string $character
     * @param string $property
     * @return bool
     */
    public function render(QueryResultInterface $contacts, string $character, $property = 'lastName'): bool
    {
        foreach ($contacts as $contact) {
            $value = ObjectAccess::getProperty($contact, $property);
            if ($this->getFirstCharacterLowercase($value) === strtolower($character)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $value
     * @return string
     */
    protected function getFirstCharacterLowercase(string $value): string
    {
        return strtolower(substr($value, 0, 1));
    }
}
