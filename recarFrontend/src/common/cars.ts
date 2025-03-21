import Ajax from './ajax'
import {ApiCars, ApiCarFind} from "@/const";

export default {
    getAllCars(data: any, success: any) {
        Ajax.get(ApiCars, data, success, () => false)
    },

    getCarById(data: { id: string | string[] }, success: any, failure: any) {
        Ajax.get(ApiCars+'/'+data.id, {}, success, failure)
    },

    getCarByName(data: any, success: any) {
        Ajax.get(ApiCarFind, data, success, () => false)
    }
}