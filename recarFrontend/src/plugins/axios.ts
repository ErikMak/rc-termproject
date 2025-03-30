import Axios from 'axios'

const axios = Axios.create({
    baseURL: import.meta.env.VITE_VUE_APP_URL,
    headers: {
        "Content-type": "application/json"
    }
});

export default axios