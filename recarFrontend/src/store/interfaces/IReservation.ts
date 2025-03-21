import {ReservationType} from "@/types/IReservationData";

interface ReservationState {
    model_id: string | null
    equip_id: string | null
    reservations: Array<ReservationType>
}

export type { ReservationState as ReservationStateType }