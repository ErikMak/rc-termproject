<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginationService
{
    public function getPaginationData(LengthAwarePaginator $paginator): array
    {
        $currPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();

        $currPage > 4 ? $start = $currPage - 3 : $start = 1;
        $currPage == $lastPage ? $next = 0 : $next = $currPage + 1;
        $currPage == 0 ? $prev = 0 : $prev = $currPage - 1;
        $currPage + 3 < $lastPage ? $end = $currPage + 3 : $end = $lastPage;

        return [
            'total' => $paginator->total(),
            'lastPage' => $lastPage,
            'perPage' => $paginator->perPage(),
            'currentPage' => $currPage,
            'nextPage' => $next,
            'previousPage' => $prev,
            'items' => range($start, $end),
        ];
    }
}
