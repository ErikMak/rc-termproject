import type {ResponseType} from '@/types/IResponse'
import Api from '@/common/cars'
import type {CarsStateType} from "@/store/interfaces/ICars";
import type {CarType} from "@/types/ICarData";
import type {PaginationType} from "@/types/IPaginationData";

export default {
    state: (): CarsStateType => ({
        cars: [],
        pagination: null,
        preloaderShow: true,
    }),
    mutations: {
        updateCatalogCars(state: CarsStateType, data: CarType[]) : void {
            state.cars = data
            if(data.length > 0)
                state.preloaderShow = false
        },
        activatePreloaders(state: CarsStateType) : void {
            state.preloaderShow = true
        },
        updatePagination(state: CarsStateType, data: PaginationType) {
            state.pagination = data
        }
    },
    actions: {
        uploadCatalogCars(ctx: any, sample: Object) : void {
            ctx.commit('activatePreloaders')
            Api.getAllCars(sample, (res: ResponseType) => {
                ctx.commit('updateCatalogCars', res["data"]["cars"])
                ctx.commit('updatePagination', res["data"]["pagination"])
            })
        },
        findCatalogCars(ctx: any, sample: {name: string}) : void {
            ctx.commit('activatePreloaders')
            Api.getCarByName(sample, (res: ResponseType) => {
                ctx.commit('updateCatalogCars', res["data"]["cars"])
                ctx.commit('updatePagination', res["data"]["pagination"])
            })
        }
    },
    getters: {
        getCatalogCars(state: CarsStateType) : Object {
            return state.cars;
        },
        getCatalogPreloader(state: CarsStateType) : boolean {
            return state.preloaderShow
        },
        getPaginationData(state: CarsStateType) : PaginationType | null {
            return state.pagination
        },
    }
}