export interface InitialState {
    isAuthenticated: boolean,
    loading: boolean,
    userFirstName: string,
    userLastName: string,
    userName: string,
    userRole: number,
    userToken: string
}

export interface UserPayload {
    first_name: string,
    last_name: string,
    user_name: string,
    role: number,
    token: string
}

export interface UserSignInDetails {
    user_name: string,
    user_password: string
}
