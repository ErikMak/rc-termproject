import axios from '@/plugins/axios'
import {ApiLogin} from "@/const";

class AuthService {
    login(data: any) : Promise<void> {
        return axios.post(ApiLogin, {
            login: data.login,
            password: data.password
        }).then(response => {
            if(response.data.status == false) {
                alert(response.data.error)
            }
            if(response.headers.authorization) {
                localStorage.setItem('user', JSON.stringify(response.headers.authorization));
            }
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
        localStorage.removeItem('user');
    }
}

export default new AuthService()