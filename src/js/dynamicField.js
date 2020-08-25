class DynamicField
{
    constructor(btn){
        this.groupName = btn.dataset.name;

        this.inputsPerRow = parseInt(document.querySelector('.' + this.groupName + '_fields').value);
        this.numberOfInputs = this.getNumberOfRows();

        this.btn = btn;

        this.addButtonListener();
    }

    addButtonListener()
    {
        this.btn.addEventListener('click', (e) => this.addRow(e));
    }

    getNumberOfRows()
    {
        let totalInputs = document.querySelectorAll('.' + this.groupName).length;
        
        return totalInputs / this.inputsPerRow;
    }

    addRow(e){
        e.preventDefault();

        let allInputs = [...document.querySelectorAll('.' + this.groupName)];
        let toClone = allInputs.slice(0, this.inputsPerRow);

        toClone.forEach(ele => {
            let clone = ele.cloneNode(true);

            let textInput = clone.querySelector('input[type="text"]');

            if(textInput){
                textInput.value = "";

                let id = textInput.id;
                
                let baseId = id.replace(/ *\[[^\]]*]/,'');
                let inputName = baseId.match(/\[(.*?)\]/);

                baseId = baseId.replace(/ *\[[^\]]*]/,'');

                if(inputName.length){
                    textInput.id = baseId +  "[" + this.numberOfInputs + "][" + inputName[1] + "]" ;
                    textInput.name = baseId +  "[" + this.numberOfInputs + "][" + inputName[1] + "]";
                }

            }

            this.btn.parentNode.insertBefore(clone, this.btn);
            
        });
        this.numberOfInputs++;
    }
}

export default DynamicField;