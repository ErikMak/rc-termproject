import Ajax from "@/common/ajax";
import {ApiReservation} from "@/const";
import requestMiddlewareService from "@/common/middleware";

export default {
    createReservation(data: any, success: any, failure: any) {
        try {
            requestMiddlewareService.checkRequestLimit()
            Ajax.post(ApiReservation, data, success, failure)
        }  catch (err: any) {
            if(err.message === 'request_limit') {
                failure({error: {request_limit: ['Превышен лимит запросов. Пожалуйста, попробуйте позже.']}})
            }
        }
    },

    getAllReservations(data: {user: string}, success: any) {
        Ajax.get(ApiReservation, data, success, () => false)
    }
}