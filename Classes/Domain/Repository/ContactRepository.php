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
        $this->extendQueryForSearchFilter($query, $filter);
        return $query->execute();
    }

    /**
     * @param QueryInterface $query
     * @param FilterDto|null $filter
     * @return void
     */
    protected function extendQueryForSearchFilter(QueryInterface $query, FilterDto $filter = null)
    {
        if ($filter !== null && $filter->getSearchterm() !== '') {
            $logicalAnd = [];
            foreach ($filter->getSearchterms() as $term) {
                $logicalOr = [];
                $logicalOr[] = $query->like('firstName', '%' . $term . '%');
                $logicalOr[] = $query->like('lastName', '%' . $term . '%');
                $logicalOr[] = $query->like('company', '%' . $term . '%');
                $logicalOr[] = $query->like('description', '%' . $term . '%');
                $logicalOr[] = $query->like('email', '%' . $term . '%');
                $logicalAnd[] = $query->logicalOr($logicalOr);
            }
            $query->matching($query->logicalAnd($logicalAnd));
        }
    }
}
