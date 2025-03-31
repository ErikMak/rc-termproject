import type { UserStateType } from "@/store/interfaces/IUsers";
import UserService from "@/services/UserService";
import TokenService from "@/services/TokenService";
import type {UserDataType} from "@/types/IUserData";
export default {
    state: (): UserStateType => ({
        user_id: null,
        login: '',
        userData: {
            exp: 0,
            balance: '',
            gender: false
        },
        loggedIn: false,
        preloaderShow: false
    }),
    mutations: {
        updateLoggedStatus(state: UserStateType, loggedIn: boolean) : void {
            state.loggedIn = loggedIn
        },
        updateLogin(state: UserStateType, login: string) : void {
            state.login = login
        },
        updateUserData(state: UserStateType, data: UserDataType) : void {
            state.userData = data
        },
        updateUserID(state: UserStateType, id: number) : void {
            state.user_id = id
        },
        updatePreloader(state: UserStateType, status: boolean) {
            state.preloaderShow = status
        }
    },
    actions: {
        checkLoggedStatus(ctx: any) {
            const token = TokenService.getLocalAccessToken()

            /*
             Если токен существует, то запускается прелоудер
             */
            if(token) {
                ctx.commit('updatePreloader', true)
            }


            UserService.loginStatus().then(
                response => {
                    if(response.data.status == true) {
                        ctx.commit('updateLoggedStatus', true)
                        ctx.commit('updateLogin', response.data.data.login)
                        ctx.commit('updateUserData', {
                            balance: response.data.data.balance,
                            gender: response.data.data.gender,
                            exp: response.data.data.exp
                        })
                        ctx.commit('updateUserID', response.data.data.id)
                        ctx.commit('updatePreloader', false)
                    }
                }
            ).catch(err => {
                if(err.message === 'token_error') {
                    // pass
                } else {
                    console.error(err);
                }
            })
        }
    },
    getters: {
        getUserLogin(state: UserStateType) : string {
            return state.login
        },
        getUserData(state: UserStateType) : UserDataType {
            return state.userData
        },
        getLoggedStatus(state: UserStateType) : boolean {
            return state.loggedIn
        },
        getUserID(state: UserStateType) : number | null {
            return state.user_id
        },
        getUserPreloader(state: UserStateType) {
            return state.preloaderShow
        }
    }
}