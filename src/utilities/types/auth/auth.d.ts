import React from "react";

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

export interface UserSignInFormProps {
    handleInput: (event: React.ChangeEvent<HTMLInputElement>) => void;
    handleSubmit: (event: React.FormEvent) => Promise<void>;
}

export interface EmployeeUserRegisterType {
    isPasswordSame: boolean;
    handleInput: (event: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => void;
    handleSubmit: (event: React.FormEvent) => Promise<void>;
    checkPasswordIsSame: (event: React.ChangeEvent<HTMLInputElement>) => void;
}
