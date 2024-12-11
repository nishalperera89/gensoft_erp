import React from 'react';
import {InputFieldProps} from "../../../utilities/types/form/inputElementTypes";


const InputField : React.FC<InputFieldProps> = ({
    fieldType,
    fieldName,
    labelName,
    handleInput
                               }) => {
    return (
        <div className="mb-5">
            <label
                htmlFor={fieldName}
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >
                {labelName}
            </label>
            <input
                type={fieldType}
                id={fieldName}
                name={fieldName}
                className="input-field"
                onChange={handleInput}
                required
            />
        </div>
    );
};

export default InputField;
