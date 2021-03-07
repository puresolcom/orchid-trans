
<form id="editInvoiceForm" action="{{route('platform.invoice.edit',$invoice)}}" method="get">
    @csrf
    <div class="modal-header">
      <h5 class="modal-title">Edit Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label for="number">Invoice number</label>
            <input type="text" name="invoice[number]" value="{{$invoice->number}}">

        <label for="reference_number">Shipment reference number</label>
            <input type="text" name="invoice[reference_number]" value="{{$invoice->reference_number}}">
    </div>
    <div class="modal-footer">
        <button type="button" onclick="submitInvoiceEditForm()" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>

<script>
function submitInvoiceEditForm(){
    $("#editInvoiceForm").submit();
}
</script>