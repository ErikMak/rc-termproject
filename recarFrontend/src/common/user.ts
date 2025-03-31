import Ajax from "@/common/ajax";
import {ApiUserWithoutAuth} from "@/const";

export default {
    updateUserData(data: {exp: number, gender: boolean}, success: any, failure: any) {
        Ajax.put(ApiUserWithoutAuth, data, success, failure)
    }
}