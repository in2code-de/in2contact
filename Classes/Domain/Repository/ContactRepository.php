<?php
namespace In2code\In2contact\Domain\Repository;

use In2code\In2contact\Domain\Model\Transfer\FilterDto;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * Class ContactRepository
 */
class ContactRepository extends AbstractRepository
{

    /**
     * @param FilterDto $filter
     * @return QueryResultInterface
     */
    public function findByFilter(FilterDto $filter = null): QueryResultInterface
    {
        $query = $this->createQuery();
        $this->extendQueryForFilter($query, $filter);
        return $query->execute();
    }

    /**
     * @param QueryInterface $query
     * @param FilterDto|null $filter
     * @return void
     */
    protected function extendQueryForFilter(QueryInterface $query, FilterDto $filter = null)
    {
        if ($filter !== null) {
            $logicalAnd = [];
            $logicalAnd = $this->extendQueryForFulltextSearch($query, $filter, $logicalAnd);
            $logicalAnd = $this->extendQueryForAbcFilter($query, $filter, $logicalAnd);
            $query->matching($query->logicalAnd($logicalAnd));
        }
    }

    /**
     * @param QueryInterface $query
     * @param FilterDto $filter
     * @param array $logicalAnd
     * @return array
     */
    protected function extendQueryForFulltextSearch(QueryInterface $query, FilterDto $filter, array $logicalAnd): array
    {
        if ($filter->getSearchterm() !== '') {
            foreach ($filter->getSearchterms() as $term) {
                $logicalOr = [];
                $logicalOr[] = $query->like('firstName', '%' . $term . '%');
                $logicalOr[] = $query->like('lastName', '%' . $term . '%');
                $logicalOr[] = $query->like('company', '%' . $term . '%');
                $logicalOr[] = $query->like('description', '%' . $term . '%');
                $logicalOr[] = $query->like('email', '%' . $term . '%');
                $logicalAnd[] = $query->logicalOr($logicalOr);
            }
        }
        return $logicalAnd;
    }

    /**
     * @param QueryInterface $query
     * @param FilterDto $filter
     * @param array $logicalAnd
     * @return array
     */
    protected function extendQueryForAbcFilter(QueryInterface $query, FilterDto $filter, array $logicalAnd): array
    {
        if ($filter->getCharacter() !== '') {
            $logicalAnd[] = $query->like('lastName', $filter->getCharacter() . '%');
        }
        return $logicalAnd;
    }
}
