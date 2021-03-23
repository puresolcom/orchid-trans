export default class extends window.Controller {
    /**
     *
     */
    static get targets() {
        return [ "count" ]
    }
    
    addMoreCharge(){
        var domClone = $("fieldset:last").clone().insertAfter("fieldset:last");
        $(domClone).find('.select2-container').remove();
        // var file = $(domClone).find('input[name=InvoiceAdditionalCost[attchment][]]');
        // $(domClone).find('div.dz-preview').remove();
        //$(file).val(' ');
        $(domClone).find('.select2-selection__rendered').remove();
        var btn = '<div data-controller="invoice"> <button data-action="click->invoice#removeCharge"> Remove </button></div>';
        $(domClone).find('.bg-white').append(btn);
    }

    removeCharge(){
        var rm = $(this).closest("fieldset").remove();
    }
}
