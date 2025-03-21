import Axios from 'axios'

const axios = Axios.create({
    // Backend сервер
    baseURL: "http://localhost:5173/",
    // baseURL: "http://recar.ru",
    headers: {
        "Content-type": "application/json"
    }
});

export default axios