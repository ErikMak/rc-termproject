import Ajax from "@/common/ajax";
import {ApiReservation} from "@/const";

export default {
    createReservation(data: any, success: any, failure: any) {
        Ajax.post(ApiReservation, data, success, failure)
    },

    getAllReservations(data: {user: string}, success: any) {
        Ajax.get(ApiReservation, data, success, () => false)
    }
}