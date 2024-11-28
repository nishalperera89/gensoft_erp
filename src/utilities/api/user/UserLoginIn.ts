import axios, {AxiosResponse} from "axios";
import {createAsyncThunk} from "@reduxjs/toolkit";

interface SignInPayload {
    userSignInDetails: object
}

export const UserLoginIn = createAsyncThunk<
    AxiosResponse<any>,
    SignInPayload
>(
    'auth/login',
    async ({userSignInDetails}) => {
        return axios.post(
    "/api/user-sign-in",
        userSignInDetails,
        ).then((response) => {
            return response.data.user_details
        })
    }
)

