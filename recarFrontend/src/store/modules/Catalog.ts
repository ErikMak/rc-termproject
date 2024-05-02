import type {ResponseType} from '@/types/IResponse'
import Api from '@/common/cars'
import type {CarsStateType} from "@/store/interfaces/ICars";
import type {CarType} from "@/types/ICarData";

export default {
    state: (): CarsStateType => ({
        cars: []
    }),
    mutations: {
        updateCatalogCars(state: CarsStateType, data: CarType[]) : void {
            state.cars = data
            // прелоудеры
        }
    },
    actions: {
        uploadCatalogCars(ctx: any, sample: Object) : void {
            Api.getAllCars(sample, (res: ResponseType) => {
                ctx.commit('updateCatalogCars', res["cars"])
            })
        }
    },
    getters: {
        getCatalogCars(state: CarsStateType) : Object {
            return state.cars;
        }
    }
}