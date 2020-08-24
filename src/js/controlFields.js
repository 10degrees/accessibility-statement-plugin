class ControlFields {
    constructor()
    {
        document.addEventListener('DOMContentLoaded', () => this.controlStandardField());

        document.addEventListener('DOMContentLoaded', () => this.standardChanged());
    }

    controlStandardField()
    {
        let standardInputs = document.querySelectorAll('input[type="radio"][name="standard_followed"]');

        standardInputs.forEach(input => {
            input.addEventListener('change', (e) => {
                this.standardChanged(e);
            });
        });
    }

    standardChanged()
    {
        let standardField = document.querySelector('input#other_standard');

        if(!standardField){
            return;
        }

        let standardChosen = document.querySelector('input[name="standard_followed"]:checked').value;
        let parentRow = standardField.closest('tr');

        if(standardChosen == 'other'){
            parentRow.classList.remove('hidden');
        } else {
            parentRow.classList.add('hidden');
        }
    }
}

export default ControlFields;