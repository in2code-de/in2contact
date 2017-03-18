<?php
namespace In2code\In2contact\Domain\Repository;

use In2code\In2contact\Domain\Model\Transfer\FilterDto;
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
    public function findByFilter(FilterDto $filter): QueryResultInterface
    {
        $query = $this->createQuery();
        $this->extendQueryForSearchFilter($filter, $query);
        return $query->execute();
    }

    /**
     * @param FilterDto $filter
     * @param $query
     * @return void
     */
    protected function extendQueryForSearchFilter(FilterDto $filter, $query)
    {
        if ($filter->getSearchterm() !== '') {
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
