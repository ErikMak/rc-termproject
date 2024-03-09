import axios from '../plugins/axios'
export default class Ajax {
    static get(url: any, data: any = {}, success: any, failure: any) {
        const param = this.createParameter(data)
        axios.get(url+'?'+param.toString())
            .then(response => {
                if(response.data["status"]) success(response.data)
                else {
                    failure(response.data)
                }
            })
            .catch(error => {
                throw error;
            });
    }

    static post(url: any, data: any = {}, success: any, failure: any) {
        axios.post(url, data)
            .then(response => {
                if(response.data["status"]) success(response.data)
                else {
                    failure(response.data)
                }
            })
            .catch(error => {
                throw error;
            });
    }

    static put(url: any, data: any = {}, success: any, failure: any) {
        axios.put(url, data)
            .then(response => {
                if(response.data["status"]) success(response.data)
                else {
                    failure(response.data)
                }
            })
            .catch(error => {
                throw error;
            });
    }

    static delete(url: any, success: any, failure: any) {
        axios.delete(url)
            .then(response => {
                if(response.data["status"]) success(response.data)
                else {
                    failure(response.data)
                }
            })
            .catch(error => {
                throw error;
            });
    }

    static createParameter(data: any = {}) {
        const params = new URLSearchParams();
        Object.keys(data).forEach(key => {
            if(data[key]) {
                params.append(key, data[key])
            }
        });
        return params
    }
}