import Ajax from "@/common/ajax";
import {ApiRating, ApiComments} from "@/const";

export default {
    getCarRating(data: any, success: any) {
        Ajax.get(ApiRating+'/'+data.model_id, {}, success, () => false)
    },

    getCarComments(data: any, success: any) {
        Ajax.get(ApiComments+'/'+data.model_id, {}, success, () => false)
    },

    addComment(data: any, success: any, failure: any) {
        Ajax.post(ApiComments, data, success, failure)
    }
}