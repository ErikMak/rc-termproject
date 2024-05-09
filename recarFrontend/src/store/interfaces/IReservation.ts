interface ReservationState {
    model_id: string | null
    equip_id: string | null
    reservations: Array<any>
}

export type { ReservationState as ReservationStateType }