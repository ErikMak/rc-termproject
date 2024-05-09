import type {ReservationStateType} from "@/store/interfaces/IReservation";
import type {ReservationCoupleType} from "@/types/IReservationCouple";
import Api from "@/common/reservation"
import type {ResponseType} from "@/types/IResponse";
export default {
    state: (): ReservationStateType => ({
        reservations: [],
        model_id: '',
        equip_id: '',
    }),
    mutations: {
        createReservation(state: ReservationStateType, obj: ReservationCoupleType) {
            state.model_id = obj.model_id
            state.equip_id = obj.equip_id
        },
        updateUserReservations(state: ReservationStateType, data: Array<any>) : void {
            state.reservations = data
        }
    },
    actions: {
      uploadAllUserReservations(ctx: any, user_id: string) : void {
          Api.getAllReservations({user: user_id}, (res: ResponseType) => {
              ctx.commit('updateUserReservations', res["data"])
          })
      }
    },
    getters: {
        getReservationData(state: ReservationStateType) : ReservationCoupleType {
            return {
                model_id: state.model_id,
                equip_id: state.equip_id
            }
        },

        getUserReservations(state: ReservationStateType) : Array<any> {
            return state.reservations
        }
    }
}