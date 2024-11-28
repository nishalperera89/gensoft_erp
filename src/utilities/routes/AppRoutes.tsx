import React from 'react';
import {Route, Routes} from "react-router";
import UserSignIn from "../../components/user/UserSignIn";

const AppRoutes:React.FC = () => {
    return (
        <Routes>
            <Route path="/" element={<UserSignIn />} />
        </Routes>
    );
};

export default AppRoutes;
