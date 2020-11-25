<?php


namespace App\Http\Traits;



use Spatie\QueryBuilder\QueryBuilder;

trait Pagination
{

    protected function getPageQuery($query, $default)
    {
        if ($page_request = request()->query('page')) {
            return isset($page_request[$query])
                ? $page_request[$query]
                : $default;
        }
        return $default;
    }

    protected function getPageInfo()
    {
        $offset = $this->getPageQuery('offset', 0);
        $limit = $this->getPageQuery('limit', 10);
        $page = ($offset/$limit) + 1;

        return compact(['offset', 'limit', 'page']);
    }

    protected function paginate(QueryBuilder $query)
    {
        $page_info = $this->getPageInfo();

        return $query->paginate(
            $page_info['limit'],
            ['*'],
            'page',
            $page_info['page']);
    }

}
