
@section('content')
<div data-controller="invoice">
<table class="table table-bordered">
<thead>
<th>Invoice number</th>
<th>Shipment reference number</th>
<th>Action</th>
</thead>
<tbody>
@foreach($invoices as $invoice)
<input type="hidden" data-invoice-target='invoiceId' value="{{$invoice->id}}">
<td>{{$invoice->number}}</td>
<td>{{$invoice->reference_number}}</td>
<td> <button type="button" data-action="click->invoice#editInvoice">Edit</button> </td>
@endforeach
</tbody>
</table>
</div>


<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="modal" id="invoiceEditModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="appendHtmlInvoiceEditForm">

    </div>
  </div>
</div>

<script>
    // global app configuration object
    var config = {
        routes: {
            invoiceRoute: "{{route('invoice.data.modal')}}"
        }
    };
</script>


<script>
// function editInvoice(id){
//     token = $('input[name=_token]').val();
//     $.ajax({
//         type: 'GET',
//         url: "{{route('invoice.data.modal')}}",
//         datatype: 'html',
//         data: {'id': id, _token: token},
//         success: function (data) {

//             $('#appendHtmlInvoiceEditForm').html(data);
//             $("#invoiceEditModal").modal('show');

//         },

//     });
// }

</script>
@endsection

