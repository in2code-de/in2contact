<?php
namespace In2code\In2contact\Domain\Model\Transfer;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class FilterDto
 */
class FilterDto
{
    /**
     * Fulltext searchterm
     *
     * @var string
     */
    protected $searchterm = '';

    /**
     * Leading character for ABC filter
     *
     * @var string
     */
    protected $character = '';

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

    /**
     * @return string
     */
    public function getCharacter(): string
    {
        return $this->character;
    }

    /**
     * @param string $character
     * @return FilterDto
     */
    public function setCharacter(string $character)
    {
        $this->character = $character;
        return $this;
    }
}
