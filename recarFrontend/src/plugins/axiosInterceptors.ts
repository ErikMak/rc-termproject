import axios from "@/plugins/axios";
import TokenService from "@/services/TokenService";
import {ApiLogin} from "@/const";
import type {AxiosRequestConfig} from "axios";

const setup = () => {
    interface RetryQueueItem {
        resolve: (value?: any) => void
        reject: (error?: any) => void
        config: AxiosRequestConfig
    }


    const refreshAndRetryQueue: RetryQueueItem[] = []

    let isRefreshing = false

    axios.interceptors.request.use(
        (config) => {
            const token = TokenService.getLocalAccessToken()

            if(token) {
                config.headers["Authorization"] = 'Bearer ' + token
            }
            return config
        },
        (err) => {
            return Promise.reject(err)
        }
    );

    axios.interceptors.response.use(function (response) {
        return response;
    }, async err => {
        console.info('перехвачен запрос')

        const originalRequest : AxiosRequestConfig = err.config;



        if(err.response && err.response.status === 401
            && originalRequest.url !== ApiLogin
        ) {
            if(!isRefreshing) {
                isRefreshing = true;

                try {
                    await TokenService.updateToken()
                    console.info('токен обновился, повтор запроса')

                    const token = TokenService.getLocalAccessToken()

                    if (token) {
                        err.config.headers["Authorization"] = 'Bearer ' + token
                    }
                    console.info(refreshAndRetryQueue)

                    refreshAndRetryQueue.forEach(({
                                                      config, resolve, reject
                                                  }) => {
                        axios
                            .request(config)
                            .then((response) => resolve(response))
                            .catch((error) => reject(error));
                    })

                    refreshAndRetryQueue.length = 0

                    return axios(originalRequest);
                } catch (err) {
                    console.info('токен не действителен')
                    throw new Error('token_error');
                } finally {
                    isRefreshing = false;
                }
            }

            return new Promise<void>((resolve, reject) => {
                console.info('промис записан')
                refreshAndRetryQueue.push({config: originalRequest, resolve, reject})
            })
        }

        return Promise.reject(err);
    });
}

export default setup;