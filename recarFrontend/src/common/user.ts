import Ajax from "@/common/ajax";
import {ApiUserWithoutAuth} from "@/const";

export default {
    updateUserData(data: {exp: number, gender: boolean}, success: any, failure: any) {
        try {
            Ajax.put(ApiUserWithoutAuth, data, success, failure)
        }  catch (err: any) {
            if(err.message === 'request_limit') {
                failure({error: {request_limit: ['Превышен лимит запросов. Пожалуйста, попробуйте позже.']}})
            }
        }
    }
}