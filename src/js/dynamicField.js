class DynamicField
{
    constructor(btn){
        let groupName = btn.dataset.name;

        this.numberOfInputs = this.getNumberOfRows(groupName);

        this.addButtonListener(btn);
    }

    addButtonListener(btn)
    {
        btn.addEventListener('click', (e) => this.addRow(e));
    }

    getNumberOfRows(name)
    {
        let totalInputs = document.querySelectorAll('.' + name).length;
        let inputsPerRow = document.querySelector('.' + name + '_fields').value;

        inputsPerRow = parseInt(inputsPerRow);
        
        return totalInputs / inputsPerRow;
    }

    addRow(e){
        e.preventDefault();

        
    }
}

export default DynamicField;