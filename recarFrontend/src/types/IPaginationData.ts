interface Pagination {
    currentPage: number,
    lastPage: number,
    nextPage: string,
    perPage: number,
    previousPage: string,
    total: number,
    items: number[]
}

export type { Pagination as PaginationType }