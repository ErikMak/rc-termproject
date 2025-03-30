import axios from '@/plugins/axios'
import {ApiUser, ApiLogout, ApiJWTRefresh, ApiAdmin} from "@/const";
import AuthService from "@/services/AuthService";
import CookieService from "@/services/CookieService";


class UserService {
    fetchData(url: string) {
        const userDataCookie = CookieService.getCookie('user')

        if (userDataCookie) {
            const userData = JSON.parse(userDataCookie);

            console.info('user данные получены с cookie')

            return Promise.resolve({ data: { status: true, data: userData } });
        } else {
            return axios.get(url).then(response => {
                console.info('user данные получены через запрос')

                if(parseInt(import.meta.env.VITE_VUE_APP_COOKIE_ON))
                    CookieService.setCookie('user', JSON.stringify(response.data.data),
                        parseInt(import.meta.env.VITE_VUE_APP_COOKIE_LIFETIME))

                return response
            })
        }
    }

    loginStatus()  {
        return this.fetchData(ApiUser)
    }

    adminStatus() {
        return axios.get(ApiAdmin)
    }

    logout() : Promise<void> {
        return axios.get(ApiLogout).then(
            AuthService.logout
        )
    }

    refresh() {
        // Удаление неактуального cookie
        CookieService.eraseCookie('user')
        return this.fetchData(ApiJWTRefresh)
    }
}

export default new UserService();