import React, {useEffect, useState} from "react";
import {TypedUseSelectorHook, useDispatch, useSelector} from "react-redux";
import {UserLoginIn} from "../../utilities/api/user/UserLoginIn.js";
import {UserSignInDetails} from "../../utilities/types/auth/auth";
import {AppDispatch, AppState} from "../../../store";
import UserSignInForm from "./UserSignInForm";
import {useNavigate} from "react-router";


const UserSignIn = () => {

    const [userSignInDetails, setUserSignInDetails] = useState<UserSignInDetails>({
        user_name: "",
        user_password: "",
    });

    const navigate = useNavigate()
    const dispatch = useDispatch<AppDispatch>();
    const useStateValues: TypedUseSelectorHook<AppState> = useSelector;
    const isAuthenticated = useStateValues(
        ((state) => state.auth.isAuthenticated)
    );

    useEffect(() => {
        if (isAuthenticated){
            navigate("/dashboard/")
        }
    }, [navigate,isAuthenticated]);

    const handleInput = (event: React.ChangeEvent<HTMLInputElement>): void => {
        setUserSignInDetails({
            ...userSignInDetails,
            [event.target.name]: event.target.value,
        });
    };

    const handleSubmit = async (event: React.FormEvent):Promise<void> => {
        event.preventDefault();

        await dispatch(UserLoginIn({userSignInDetails}));
    };

    return (
        <UserSignInForm
            handleInput={handleInput}
            handleSubmit={handleSubmit}
        />
    );

}
export default UserSignIn;
