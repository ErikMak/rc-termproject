import axios from '@/plugins/axios'
import {ApiLogin, ApiRegister} from "@/const";
import TokenService from "@/services/TokenService";
import CookieService from "@/services/CookieService";

class AuthService {
    login(data: any) : Promise<void> {
        return axios.post(ApiLogin, {
            login: data.login,
            password: data.password
        }).then(response => {
            if(response.data.status == false) {
                throw response.data
            }
            if(response.headers.authorization) {
                TokenService.setLocalAccessToken(response.headers.authorization)
            }
        }).catch(error => {
            throw error
        })
    }

    register(data: any) : Promise<void> {
        return axios.post(ApiRegister, {
            login: data.login,
            password: data.password
        }).then(response => {
            if(response.data.status == false)
                throw response.data
        }).catch(error => {
            throw error
        })
    }

    /*
        NOTE!!

        Удаление токена JWT из localstorage, входит в реализацию метода
        выхода из аккаунта logout класса UserService
     */
    logout() : void {
        TokenService.removeLocalAccessToken()
        CookieService.eraseCookie('user')
    }
}

export default new AuthService()