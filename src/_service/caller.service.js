import axios from "axios";

const Axios = axios.create({
    baseURL: 'http://localhost:8888/finance-project/src/API/'
})
export default Axios

// http://localhost:8888/finance-project/src/API/