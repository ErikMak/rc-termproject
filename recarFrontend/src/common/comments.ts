import Ajax from "@/common/ajax";
import {ApiRating, ApiComments} from "@/const";
import requestMiddlewareService from "@/common/middleware";

export default {
    getCarRating(data: any, success: any) {
        Ajax.get(ApiRating+'/'+data.model_id, {}, success, () => false)
    },

    getCarComments(data: any, success: any) {
        Ajax.get(ApiComments+'/'+data.model_id, {}, success, () => false)
    },

    addComment(data: any, success: any, failure: any) {
        try {
            requestMiddlewareService.checkRequestLimit()

            Ajax.post(ApiComments, data, success, failure)
        } catch (err: any) {
            if(err.message === 'request_limit') {
                failure({error: {request_limit: ['Превышен лимит запросов. Пожалуйста, попробуйте позже.']}})
            }
        }
    }
}