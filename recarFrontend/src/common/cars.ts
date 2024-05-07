import Ajax from './ajax'
import {ApiCars, ApiCarFind} from "@/const";

export default {
    getAllCars(data: any, success: any) {
        Ajax.get(ApiCars, data, success, () => false)
    },

    getCarById(data: any, success: any) {
        Ajax.get(ApiCars+'/'+data.id, {}, success, () => false)
    },

    getCarByName(data: any, success: any) {
        Ajax.get(ApiCarFind, data, success, () => false)
    }
}