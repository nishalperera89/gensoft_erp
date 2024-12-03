import React, {useState} from 'react';
import {Link} from "react-router";
import EmployeeLogo from "../../../../../assets/icons/employee-icon.png";
import Image from "../../../../common/Image.tsx";

const EmployeeButton : React.FC = () => {
    const [isOpenDropdown,setIsOpenDropdown] = useState(false)

    const dropdownOpenAndClose = (isOpen: boolean) => {
        if(!isOpen){
            setIsOpenDropdown(true)
            return
        }

        setIsOpenDropdown(false)

    }

    return (
        <li>
            <Link to="/dashboard/add-employee"
                  onClick={() => {dropdownOpenAndClose(isOpenDropdown)}}
                  className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                <Image src={EmployeeLogo} width='28px' height='32px'/>
                <span className="flex-1 ms-3 whitespace-nowrap">Employee</span>
            </Link>

            <ul className={isOpenDropdown ? "py-2 space-y-4" : "hidden py-2 space-y-4"}>
                <li>
                    <Link to="/dashboard/add-employee" className="ml-12">Add Employee</Link>
                </li>
                <li>
                    <Link to="#" className="ml-12">Employee List</Link>
                </li>
            </ul>
        </li>
    );
};

export default EmployeeButton;
