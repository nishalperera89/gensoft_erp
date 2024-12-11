import React from "react";
import { SelectInputFieldProps } from "../../../utilities/types/form/inputElementTypes";

const SelectInputField: React.FC<SelectInputFieldProps> = ({
  fieldName,
  labelName,
  options,
  handleInput,
}) => {
  return (
    <div className="mb-5">
      <label
        htmlFor={fieldName}
        className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
      >
        {labelName}
      </label>
      <select
        id={fieldName}
        name={fieldName}
        className="input-field"
        onChange={handleInput}
      >
        {options.map((option) => (
          <option key={option.value} value={option.value}>
            {option.option_name}
          </option>
        ))}
      </select>
    </div>
  );
};

export default SelectInputField;
