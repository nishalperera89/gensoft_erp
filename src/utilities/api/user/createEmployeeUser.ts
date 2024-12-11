import axios from "axios";

export const createEmployeeUser = (employeeBasicDetails) => {
    return axios.post('api/user-register', employeeBasicDetails)
}
