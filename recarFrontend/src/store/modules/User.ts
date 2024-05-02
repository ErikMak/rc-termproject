import type { UserStateType } from "@/store/interfaces/IUsers";
import UserService from "@/services/UserService";
export default {
    state: (): UserStateType => ({
        login: '',
        loggedIn: false
    }),
    mutations: {
        updateLoggedStatus(state: UserStateType, loggedIn: boolean) : void {
            state.loggedIn = loggedIn
        },
        updateLogin(state: UserStateType, login: string) : void {
            state.login = login
        }
    },
    actions: {
        checkLoggedStatus(ctx: any) {
            UserService.loginStatus().then(
                response => {
                    if(response.data.status == true) {
                        ctx.commit('updateLoggedStatus', true)
                        ctx.commit('updateLogin', response.data.data.login)
                    } else {
                        ctx.commit('updateLoggedStatus', false)
                    }
                }
            )
        }
    },
    getters: {
        getUserLogin(state: UserStateType) : string {
            return state.login
        },
        getLoggedStatus(state: UserStateType) : boolean {
            return state.loggedIn
        }
    }
}