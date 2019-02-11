<?php

namespace App\Pagination;


class Builder
{
    /**
     * @var
     */
    protected $builder;

    /**
     * Builder constructor.
     * @param $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param int $page
     * @param int $perPage
     */
    public function paginate($page = 1, $perPage = 10)
    {
        $page = max(1, $page);

        $total = $this->builder->execute()->rowCount();

        dump($total);

        $result = $this->builder
            ->setFirstResult(
                $this->getFirstIndex($page, $perPage)
            )
            ->setMaxResults($perPage)
            ->execute()
            ->fetchAll();
    }

    /**
     * @param $page
     * @param $perPage
     * @return float|int
     */
    protected function getFirstIndex($page, $perPage)
    {
        return ($page - 1) * $perPage;
    }

}