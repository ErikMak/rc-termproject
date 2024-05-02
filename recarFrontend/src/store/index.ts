import Vuex from 'vuex'

import User from '@/store/modules/User'
import Catalog from "@/store/modules/Catalog";

import type { CarsStateType } from "@/store/interfaces/ICars";
import type { UserStateType } from "@/store/interfaces/IUsers";

interface State {
  user: UserStateType
  catalog: CarsStateType
}

export default new Vuex.Store<State>({
  modules: {
    user: User,
    catalog: Catalog
  }
})
