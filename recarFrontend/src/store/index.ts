import Vuex from 'vuex'
import User from '@/store/modules/User'

interface State {
  user: UserState
}

export default new Vuex.Store<State>({
  modules: {
    user: User
  }
})
