import React from "react";
import { EmployeeUserRegisterType } from "../../../../../utilities/types/auth/auth";
import InputField from "../../../../common/form/InputField.tsx";
import SelectInputField from "../../../../common/form/SelectInputField.tsx";
import {userTypes} from "../../../../../utilities/dynamicValues/EmployeeTypes.ts";

const AddEmployeeForm: React.FC<EmployeeUserRegisterType> = ({
  isPasswordSame,
  handleInput,
  handleSubmit,
  checkPasswordIsSame
}) => {

  return (
      <div className="p-4 sm:ml-64">
          <div className="p-4 mt-14">
              <div className="h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                  <form className="w-3/4 m-auto" onSubmit={handleSubmit}>
                      <InputField
                          fieldType="text"
                          fieldName="first_name"
                          labelName="First Name"
                          handleInput={handleInput}
                      />
                      <InputField
                          fieldType="text"
                          fieldName="last_name"
                          labelName="Last Name"
                          handleInput={handleInput}
                      />
                      <InputField
                          fieldType="text"
                          fieldName="user_name"
                          labelName="User Name"
                          handleInput={handleInput}
                      />
                      <InputField
                          fieldType="text"
                          fieldName="user_name"
                          labelName="User Name"
                          handleInput={handleInput}
                      />
                      <InputField
                          fieldType="email"
                          fieldName="email"
                          labelName="Email"
                          handleInput={handleInput}
                      />
                      <SelectInputField
                          fieldName="role"
                          labelName="User Role"
                          options={userTypes}
                          handleInput={handleInput}
                      />
                      <InputField
                          fieldType="password"
                          fieldName="password"
                          labelName="Password"
                          handleInput={handleInput}
                      />
                      <div className="mb-5">
                          <label
                              htmlFor="confirm_password"
                              className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >
                              Confirm Password
                          </label>
                          <input
                              type="password"
                              id="confirm_password"
                              name="confirm_password"
                              className="input-field"
                              onChange={checkPasswordIsSame}
                              required
                          />
                      </div>
                      {!isPasswordSame ? 'Password is not Same' : ''}
                      <button type="submit" className="dark-btn">
                          Register Employee
                      </button>
                  </form>
              </div>
          </div>
      </div>
  );
};

export default AddEmployeeForm;
