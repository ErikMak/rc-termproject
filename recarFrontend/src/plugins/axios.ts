import Axios from 'axios'

const axios = Axios.create({
    // Backend сервер
    baseURL: "http://77.232.129.179",
    headers: {
        "Content-type": "application/json"
    }
});

export default axios