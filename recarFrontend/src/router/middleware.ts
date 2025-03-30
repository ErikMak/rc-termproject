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
                store.commit('updateBalance', response.data.data.balance)
                store.commit('updateUserID', response.data.data.id)
                next()
            }
        }
    ).catch(err => {
        if(err.message === 'token_error') {
            router.push({ name: 'auth' });
        }
        console.error(err);
    })
}

// Предварительная проверка прав админа при переходе по маршруту
const adminGuard = function (next: NavigationGuardNext) {
    UserService.adminStatus().then(        response => {
        if(response.data.status == true) {
            store.commit('updateLoggedStatus', true)
            store.commit('updateLogin', response.data.data.login)
            store.commit('updateBalance', response.data.data.balance)
            store.commit('updateUserID', response.data.data.id)
            next()
        }
    }).catch(err => {
        if(err.message === 'token_error') {
            router.push({ name: 'auth' });
        }


        if (err.response && err.response.status === 423) {

            next({name: '404'})

            console.error(err.response.statusText);
            return;
        }

        console.error(err);
    })
}

export { guard, adminGuard };