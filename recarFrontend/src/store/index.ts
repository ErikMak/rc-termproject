import Vuex from 'vuex'

import User from '@/store/modules/User'
import Catalog from "@/store/modules/Catalog";
import Car from '@/store/modules/Car'
import Reservation from "@/store/modules/Reservation";

import type { CarsStateType } from "@/store/interfaces/ICars";
import type { UserStateType } from "@/store/interfaces/IUsers";
import type { CarStateType} from "@/store/interfaces/ICar";
import type { ReservationStateType } from "@/store/interfaces/IReservation";

import createPersistedState from 'vuex-persistedstate'

interface State {
  user: UserStateType
  catalog: CarsStateType
  car: CarStateType
  reservation: ReservationStateType
}

const dataState = createPersistedState({
  paths: ['reservation']
})

export default new Vuex.Store<State>({
  modules: {
    user: User,
    catalog: Catalog,
    car: Car,
    reservation: Reservation
  },
  plugins: [dataState]
})
