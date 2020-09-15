import ControlFields from './controlFields.js';
import DynamicTextField from './dynamicTextField.js';
import Repeater from './repeater.js';

new ControlFields();

document.addEventListener('DOMContentLoaded', () => {
    let dynamicTextFields = document.querySelectorAll('.dynamicTextField');

    dynamicTextFields.forEach(ele => {
        new DynamicTextField(ele);
    });

    let dynamicAddButtons = document.querySelectorAll('.add-dynamic');
    dynamicAddButtons.forEach(btn => {
        new Repeater(btn);
    })
});