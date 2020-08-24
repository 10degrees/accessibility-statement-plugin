import ControlFields from './controlFields.js';
import DynamicTextField from './dynamicTextField.js';

new ControlFields();

document.addEventListener('DOMContentLoaded', () => {
    let dynamicTextFields = document.querySelectorAll('.dynamicTextField');

    dynamicTextFields.forEach(ele => {
        new DynamicTextField(ele);
    })
});