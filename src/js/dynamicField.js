class DynamicField
{
    constructor(btn){
        this.btn = btn;
        this.fieldName = btn.dataset.name;

        this.inputsPerRow = parseInt(document.querySelector('.' + this.fieldName + '_fields').value);
        this.numberOfRows = this.getNumberOfRows();

        this.addButtonListener();
    }

    addButtonListener()
    {
        this.btn.addEventListener('click', (e) => this.addRow(e));
    }

    getNumberOfRows()
    {
        let totalInputs = document.querySelectorAll('.' + this.fieldName).length;
        
        return totalInputs / this.inputsPerRow;
    }

    addRow(e){
        e.preventDefault();

        let allInputs = [...document.querySelectorAll('.' + this.fieldName)];
        let singleRow = allInputs.slice(0, this.inputsPerRow);

        singleRow.forEach(field => {
            let clonedField = field.cloneNode(true);
            let textInput = clonedField.querySelector('input[type="text"]');

            if(textInput){
                textInput.value = "";

                let newId = textInput.id.replace(/\d+/, () => this.numberOfRows); // Replace digit with this.numberOfRows

                textInput.id = newId;
                textInput.name = newId;
            }

            this.btn.parentNode.insertBefore(clonedField, this.btn);
            
        });
        this.numberOfRows++;
    }
}

export default DynamicField;