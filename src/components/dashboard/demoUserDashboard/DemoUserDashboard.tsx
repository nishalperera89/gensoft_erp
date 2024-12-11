import React from 'react';
import Navbar from "../common/navbar/Navbar.tsx";
import Sidebar from "../common/sidebar/Sidebar.tsx";
import MainDashboard from "./Dashboard/MainDashboard.tsx";
import {Route, Routes} from "react-router";
import AddEmployee from "./Dashboard/employee/AddEmployee.tsx";

const DemoUserDashboard:React.FC = () => {
    return (
        <>
            <Navbar />
            <Sidebar />

            <Routes>
                <Route path="/" element={<MainDashboard />} />
                <Route path="/add-employee" element={<AddEmployee />} />
            </Routes>
        </>
    );
};

export default DemoUserDashboard;
