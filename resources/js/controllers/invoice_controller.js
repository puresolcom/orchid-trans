export default class extends window.Controller {
    /**
     *
     */
    static get targets(){
        return  [ "invoiceId" ]
    }
    
    editInvoice(){
        const element = this.invoiceIdTarget
        const id = element.value

        $.ajax({
            type: 'GET',
            url: config.route.invoiceRoute,
            datatype: 'html',
            data: {'id': id, _token: token},
            success: function (data) {
    
                $('#appendHtmlInvoiceEditForm').html(data);
                $("#invoiceEditModal").modal('show');
    
            },
    
        });
    }
}
