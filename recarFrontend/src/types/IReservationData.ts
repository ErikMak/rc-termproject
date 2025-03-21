interface Reservation {
    brand: string
    car_name: string
    date_issue: string
    date_return: string
    equip_name: string
    id: number
    is_active: boolean
    model_id: number
    total_cost: number
}

export type { Reservation as ReservationType }