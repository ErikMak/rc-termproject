import Ajax from "@/common/ajax";
import {ApiFavorites} from "@/const";
import authHeader from "@/services/AuthHeader";

export default {
    addToFavorite(data: any, success: any, failure: any) {
        Ajax.post(ApiFavorites, data, success, failure)
    },

    getFavorites(data: {user: string}, success: any) {
        Ajax.get(ApiFavorites, data, success, () => false)
    },

    deleteFromFavorites(data: {favorite_id: string}, success: any) {
        Ajax.delete(ApiFavorites+'/'+data.favorite_id,
            success,
            () => false,
            authHeader()
        )
    }
}