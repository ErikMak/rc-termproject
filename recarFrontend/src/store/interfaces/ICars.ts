import type {CarType} from "@/types/ICarData";
import {PaginationType} from "@/types/IPaginationData";

interface CarsState {
    cars: CarType[]
    pagination: PaginationType | null
    preloaderShow: boolean
}

export type { CarsState as CarsStateType }