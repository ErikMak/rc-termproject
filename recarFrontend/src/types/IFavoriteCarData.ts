import {CarType} from "@/types/ICarData";

interface FavoriteCar {
    car: CarType
    car_id: number
    user_id: number
}

export type { FavoriteCar as FavoriteCarType }