import type {NavigationGuardNext} from "vue-router";
import store from "@/store";
import UserService from "@/services/UserService";
import router from "@/router/index";

// Предварительная проверка авторизации при переходе по маршруту
const guard = function (next: NavigationGuardNext) {
    UserService.loginStatus().then(
        response => {
            if(response.data.status == true) {
                store.commit('updateLoggedStatus', true)
                store.commit('updateLogin', response.data.data.login)
                next()
            } else {
                store.commit('updateLoggedStatus', false)
                router.push('/auth')
            }
        }
    )
}
export default guard;
