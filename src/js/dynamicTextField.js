class DynamicTextField
{
    constructor(tableRow)
    {
        this.numberOfInputs = tableRow.querySelectorAll('input[type="text"]').length;
        this.tableRow = tableRow;

        this.addButtonListeners();
    }

    addButtonListeners()
    {
        let addButton = this.tableRow.querySelector('.addTextField');
        addButton.addEventListener('click', (e) => this.addTextField(e));
    }

    addTextField(e){
        e.preventDefault();
        let oldName = e.currentTarget.dataset.name;

        let firstInput = this.tableRow.querySelector('td .inputs > *:first-child');
        
        let clone = firstInput.cloneNode();
        clone.value = "";
        clone.name = oldName + "[" + this.numberOfInputs + "]";

        this.tableRow.querySelector('.inputs').appendChild(clone);

        this.numberOfInputs++;
    }
}

export default DynamicTextField;