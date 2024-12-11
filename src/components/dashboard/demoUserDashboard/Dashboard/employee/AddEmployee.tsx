import React, { useState } from "react";
import { createEmployeeUser } from "../../../../../utilities/api/user/createEmployeeUser.ts";
import AddEmployeeForm from "./AddEmployeeForm.tsx";
import {EmployeeBasicDataTypes} from "../../../../../utilities/types/form/employeeUserRegisterTypes.d.tsx";
import {EmployeeUserRegisterFormAttributes} from "../../../../../utilities/form/EmployeeUserRegisterFormAttributes.ts";

const AddEmployee: React.FC<EmployeeBasicDataTypes> = () => {

  const [employeeBasicDetails, setEmployeeBasicDetails] =
    useState<EmployeeBasicDataTypes>(EmployeeUserRegisterFormAttributes);

  const [isPasswordSame,setIsPasswordSame] = useState<boolean>(false)

  const handleInput = (event: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    const { name, value } = event.target;

    setEmployeeBasicDetails((prevState) => ({
      ...prevState,
      [name]: value,
    }));
  };

  const checkPasswordIsSame = (event: React.ChangeEvent<HTMLInputElement>) => {
      //console.log(employeeBasicDetails.password,event.target.value)

      if(employeeBasicDetails.password === event.target.value){
          setIsPasswordSame(true)
          return
      }
      setIsPasswordSame(false)
  }

  const handleSubmit = async (event: React.FormEvent) => {
    event.preventDefault();

    const createEmployeeResponse =
        await createEmployeeUser(employeeBasicDetails);

    //console.log(createEmployeeResponse)
  };

  return (
    <AddEmployeeForm
        isPasswordSame={isPasswordSame}
        handleInput={handleInput}
        handleSubmit={handleSubmit}
        checkPasswordIsSame={checkPasswordIsSame}
    />
  );
};

export default AddEmployee;
