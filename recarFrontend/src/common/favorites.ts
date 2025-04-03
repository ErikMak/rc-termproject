import Ajax from "@/common/ajax";
import {ApiFavorites} from "@/const";
import requestMiddlewareService from "@/common/middleware";

export default {
    addToFavorite(data: any, success: any, failure: any) {
        try {
            requestMiddlewareService.checkRequestLimit()
            Ajax.post(ApiFavorites, data, success, failure)
        } catch (err: any) {
            if(err.message === 'request_limit') {
                failure({error: {request_limit: ['Превышен лимит запросов. Пожалуйста, попробуйте позже.']}})
            }
        }
    },

    getFavorites(data: {user: string}, success: any) {
        Ajax.get(ApiFavorites, data, success, () => false)
    },

    deleteFromFavorites(data: {favorite_id: string}, success: any, failure: any) {
        Ajax.delete(ApiFavorites+'/'+data.favorite_id, success, failure)
    }
}