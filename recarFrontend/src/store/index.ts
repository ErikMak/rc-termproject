import Vuex from 'vuex'

import User from '@/store/modules/User'
import Catalog from "@/store/modules/Catalog";
import Car from '@/store/modules/Car'

import type { CarsStateType } from "@/store/interfaces/ICars";
import type { UserStateType } from "@/store/interfaces/IUsers";
import type { CarStateType} from "@/store/interfaces/ICar";

interface State {
  user: UserStateType
  catalog: CarsStateType
  car: CarStateType
}

export default new Vuex.Store<State>({
  modules: {
    user: User,
    catalog: Catalog,
    car: Car
  }
})
