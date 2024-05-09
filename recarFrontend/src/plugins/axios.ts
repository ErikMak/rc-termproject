import Axios from 'axios'

const axios = Axios.create({
    // Backend сервер
    baseURL: "http://127.0.0.1:8000",
    headers: {
        "Content-type": "application/json"
    }
});

export default axios