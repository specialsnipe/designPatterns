<?php

class QueryBuilder
{
    private array $select = [];
    private array $from = [];
    private array $where = [];

    public function select(array $select): QueryBuilder
    {
        $this->select = $select;
        return $this;
    }
    public function form(array $from): QueryBuilder
    {
        $this->from = $from;
        return $this;
    }
    public function where(array $where): QueryBuilder
    {
        $this->where = $where;
        return $this;
    }

    public function get()
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s;' ,
            join(', ', $this->select),
            join(', ', $this->from),
            join(' AND ', $this->where)
        );
    }
}

$queryBuilder = new QueryBuilder();
$query = $queryBuilder->select(['id', 'title'])->form(['users'])->where(['id = 1'])->get();
var_dump($query);