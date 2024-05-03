import type {ResponseType} from '@/types/IResponse'
import Api from '@/common/cars'
import type {CarsStateType} from "@/store/interfaces/ICars";
import type {CarType} from "@/types/ICarData";

export default {
    state: (): CarsStateType => ({
        cars: [],
        preloaderShow: true,
    }),
    mutations: {
        updateCatalogCars(state: CarsStateType, data: CarType[]) : void {
            state.cars = data
            if(data.length > 0) {
                state.preloaderShow = false
            }
        },
        activatePreloaders(state: CarsStateType) : void {
            state.preloaderShow = true
        }
    },
    actions: {
        uploadCatalogCars(ctx: any, sample: Object) : void {
            ctx.commit('activatePreloaders')
            Api.getAllCars(sample, (res: ResponseType) => {
                ctx.commit('updateCatalogCars', res["data"])
            })
        }
    },
    getters: {
        getCatalogCars(state: CarsStateType) : Object {
            return state.cars;
        },
        getCatalogPreloader(state: CarsStateType) : boolean {
            return state.preloaderShow
        }
    }
}