import Vuex from 'vuex'

import User from '@/store/modules/User'
import Catalog from "@/store/modules/Catalog";
import Car from '@/store/modules/Car'
import Reservation from "@/store/modules/Reservation";
import Comments from "@/store/modules/Comments";

import type { CarsStateType } from "@/store/interfaces/ICars";
import type { UserStateType } from "@/store/interfaces/IUsers";
import type { CarStateType} from "@/store/interfaces/ICar";
import type { ReservationStateType } from "@/store/interfaces/IReservation";
import type { CommentsStateType } from "@/store/interfaces/IComments";

import createPersistedState from 'vuex-persistedstate'

interface State {
  user: UserStateType
  catalog: CarsStateType
  car: CarStateType
  reservation: ReservationStateType,
  comments: CommentsStateType
}

const dataState = createPersistedState({
  paths: ['reservation']
})

export default new Vuex.Store<State>({
  modules: {
    user: User,
    catalog: Catalog,
    car: Car,
    reservation: Reservation,
    comments: Comments
  },
  plugins: [dataState]
})
