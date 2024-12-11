import React from "react";

export interface InputFieldProps{
    fieldType: string,
    labelName: string,
    fieldName: string,
    handleInput: (event: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => void;
}

export interface UserTypes {
    value: string,
    option_name: string
}

export interface SelectInputFieldProps {
    fieldName: string,
    labelName: string,
    options: UserTypes[],
    handleInput: (event: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => void;
}
