import Axios from 'axios'

const axios = Axios.create({
    // Backend сервер
    baseURL: "http://localhost:8081/",
    headers: {
        "Content-type": "application/json"
    }
});

export default axios