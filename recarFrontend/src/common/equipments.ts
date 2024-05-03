import Ajax from "@/common/ajax";
import {ApiEquipments} from "@/const";

export default {
    getEquipmentsById(data: any, success: any) {
        Ajax.get(ApiEquipments+'/'+data.id, {}, success, () => false)
    }
}