import type { UserStateType } from "@/store/interfaces/IUsers";
import UserService from "@/services/UserService";
export default {
    state: (): UserStateType => ({
        user_id: null,
        login: '',
        balance: '',
        loggedIn: false
    }),
    mutations: {
        updateLoggedStatus(state: UserStateType, loggedIn: boolean) : void {
            state.loggedIn = loggedIn
        },
        updateLogin(state: UserStateType, login: string) : void {
            state.login = login
        },
        updateBalance(state: UserStateType, balance: string) : void {
            state.balance = balance
        },
        updateUserID(state: UserStateType, id: number) : void {
            state.user_id = id
        }
    },
    actions: {
        checkLoggedStatus(ctx: any) {
            UserService.loginStatus().then(
                response => {
                    if(response.data.status == true) {
                        ctx.commit('updateLoggedStatus', true)
                        ctx.commit('updateLogin', response.data.data.login)
                        ctx.commit('updateBalance', response.data.data.balance)
                        ctx.commit('updateUserID', response.data.data.id)
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
        getUserBalance(state: UserStateType) : string {
            return state.balance
        },
        getLoggedStatus(state: UserStateType) : boolean {
            return state.loggedIn
        },
        getUserID(state: UserStateType) : number | null {
            return state.user_id
        }
    }
}