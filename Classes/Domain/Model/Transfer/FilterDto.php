<?php
namespace In2code\In2contact\Domain\Model\Transfer;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class FilterDto
 */
class FilterDto
{
    /**
     * @var string
     */
    protected $searchterm = '';

    /**
     * @return string
     */
    public function getSearchterm(): string
    {
        return $this->searchterm;
    }

    /**
     * Get all searchterms (split on space)
     *
     * @return array
     */
    public function getSearchterms(): array
    {
        return GeneralUtility::trimExplode(' ', $this->searchterm, true);
    }

    /**
     * @param string $searchterm
     * @return FilterDto
     */
    public function setSearchterm(string $searchterm)
    {
        $this->searchterm = $searchterm;
        return $this;
    }
}
