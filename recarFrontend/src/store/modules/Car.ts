import type {CarStateType} from "@/store/interfaces/ICar";
import type {EquipmentType} from "@/types/IEquipData";
import ApiEquip from '@/common/equipments'
export default {
    state: (): CarStateType => ({
        equipments: []
    }),
    mutations: {
        updateEquipments(state: CarStateType, data: EquipmentType[]) : void {
            state.equipments = data
        }
    },
    actions: {
        uploadCarEquipments(ctx: any, sample: Object) : void {
            ApiEquip.getEquipmentsById(sample, (res: ResponseType) => {
                ctx.commit('updateEquipments', res["data"])
            })
        }
    },
    getters: {
        getCarEquipments(state: CarStateType) : EquipmentType[] {
            return state.equipments
        }
    }
}