import type {CarType} from "@/types/ICarData";

interface CarsState {
    cars: CarType[]
    preloaderShow: boolean
}

export type { CarsState as CarsStateType }