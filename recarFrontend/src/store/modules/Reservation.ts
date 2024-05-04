import type {ReservationStateType} from "@/store/interfaces/IReservation";
import type {ReservationCoupleType} from "@/types/IReservationCouple";

export default {
    state: (): ReservationStateType => ({
        model_id: '',
        equip_id: '',
    }),
    mutations: {
        createReservation(state: ReservationStateType, obj: ReservationCoupleType) {
            state.model_id = obj.model_id
            state.equip_id = obj.equip_id
        }
    },
    getters: {
        getReservationData(state: ReservationStateType) : ReservationCoupleType {
            return {
                model_id: state.model_id,
                equip_id: state.equip_id
            }
        }
    }
}