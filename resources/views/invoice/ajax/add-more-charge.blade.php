<fieldset id="chargeLine{{$count}}" class="mb-3" data-async="">
<div data-controller="invoice">
 <input id="count" type="hidden" value="{{$count}}">
</div>    
    <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-column">
        <div class="row align-items-baseline">
            <div class="col  pr-0 ">
            <div class="form-group">
            <label for="field-invoiceadditionalcostdescription-5bb071fb4dcf4e1296373e49313ca2d6d174abe4" class="form-label">Charge line
            
                    </label>
    
    <div data-controller="fields--select">
        <select class="form-control select2-hidden-accessible" name="InvoiceAdditionalCost[description][]" title="Charge line" id="field-invoiceadditionalcostdescription-5bb071fb4dcf4e1296373e49313ca2d6d174abe4" data-select2-id="field-invoiceadditionalcostdescription-5bb071fb4dcf4e1296373e49313ca2d6d174abe4" tabindex="-1" aria-hidden="true">
                            <option value="1" data-select2-id="54">Truck Waiting Charges</option>
                            <option value="2">Truck Detention Charges</option>
                            @foreach($additionalCharges as $additionalCharge)

                            <option value="{{$additionalCharge->id}}">{{$additionalCharge->charge_line}}</option>
                            @endforeach
                    </select>
    </div>

    </div>


        </div>
            <div class="col  pr-0 ">
            <div class="form-group">
            <label for="field-invoiceadditionalcostcost-f13cac6a0de318398a560e9c786c666b668adaad" class="form-label">Cost
            
                    </label>
    
    <div data-controller="fields--input" data-fields--input-mask="">
        <input class="form-control" name="InvoiceAdditionalCost[cost][]" title="Cost" placeholder="cost" id="field-invoiceadditionalcostcost-f13cac6a0de318398a560e9c786c666b668adaad">
    </div>

    </div>


        </div>
            <div class="col  pr-0 ">
            <div class="form-group">
            <label for="field-invoiceadditionalcostvat-9efeb9182b260b9c004067eca5724569724a9415" class="form-label">Vat
            
                    </label>
    
    <div data-controller="fields--input" data-fields--input-mask="">
        <input class="form-control" name="InvoiceAdditionalCost[vat][]" title="Vat" placeholder="vat" id="field-invoiceadditionalcostvat-9efeb9182b260b9c004067eca5724569724a9415">
    </div>

    </div>


        </div>
        <div class="col ">
            <div class="form-group">
            <label for="field-invoiceadditionalcostattchment-975aa3edc38c05428d3cb54f6bc9e3b4585b72d6" class="form-label">Charge attachment
            
                    </label>
    
    <div data-controller="fields--upload" data-fields--upload-storage="public" data-fields--upload-name="InvoiceAdditionalCost[attchment][]" data-fields--upload-id="dropzone-field-invoiceadditionalcostattchment-975aa3edc38c05428d3cb54f6bc9e3b4585b72d6" data-fields--upload-data="[]" data-fields--upload-groups="photo" data-fields--upload-multiple="1" data-fields--upload-parallel-uploads="10" data-fields--upload-max-file-size="40" data-fields--upload-max-files="1" data-fields--upload-timeout="0" data-fields--upload-accepted-files="" data-fields--upload-resize-quality="0.8" data-fields--upload-resize-width="" data-fields--upload-is-media-library="" data-fields--upload-close-on-add="" data-fields--upload-resize-height="">
        <div id="dropzone-field-invoiceadditionalcostattchment-975aa3edc38c05428d3cb54f6bc9e3b4585b72d6" class="dropzone-wrapper dz-clickable">
            
            <div class="visual-dropzone sortable-dropzone dropzone-previews">
                <div class="dz-message dz-preview dz-processing dz-image-preview">
                    <div class="bg-light d-flex justify-content-center align-items-center border r-2x" style="min-height: 112px;">
                        <div class="pr-1 pl-1 pt-3 pb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="text-2x" role="img" fill="currentColor" componentname="orchid-icon">
    <path d="M23.845 8.124c-1.395-3.701-4.392-6.045-8.921-6.045-5.762 0-9.793 4.279-10.14 9.86-2.778 0.889-4.784 3.723-4.784 6.933 0 3.93 3.089 7.249 6.744 7.249h2.889c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2.889c-2.572 0-4.776-2.404-4.776-5.249 0-2.514 1.763-4.783 3.974-5.163l0.907-0.156-0.080-0.916-0.008-0.011c0-4.871 3.205-8.545 8.161-8.545 3.972 0 6.204 1.957 7.236 5.295l0.214 0.688 0.721 0.015c3.715 0.078 6.972 3.092 6.972 6.837 0 3.408-2.259 7.206-5.678 7.206h-2.285c-0.552 0-1 0.448-1 1s0.448 1 1 1l2.277-0.003c5-0.132 7.605-4.908 7.605-9.203 0-4.616-3.617-8.305-8.14-8.791zM16.75 16.092c-0.006-0.006-0.008-0.011-0.011-0.016l-0.253-0.264c-0.139-0.146-0.323-0.219-0.508-0.218-0.184-0.002-0.368 0.072-0.509 0.218l-0.253 0.264c-0.005 0.005-0.006 0.011-0.011 0.016l-3.61 3.992c-0.28 0.292-0.28 0.764 0 1.058l0.252 0.171c0.28 0.292 0.732 0.197 1.011-0.095l2.128-2.373v10.076c0 0.552 0.448 1 1 1s1-0.448 1-1v-10.066l2.199 2.426c0.279 0.292 0.732 0.387 1.011 0.095l0.252-0.171c0.279-0.293 0.279-0.765 0-1.058z"></path>
</svg>
                            <small class="text-muted w-b-k text-xs d-block">Upload file</small>
                        </div>
                    </div>
                </div>

                            </div>

            <div class="attachment modal fade disable-scroll" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog slide-up">
                    <div class="modal-content-wrapper">
                        <div class="modal-content">
                            <div class="modal-header clearfix">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1em" height="1em" role="img" fill="currentColor" componentname="orchid-icon">
    <path d="M21.66,10.34a1,1,0,0,0-1.42,0L16,14.59l-4.24-4.25a1,1,0,0,0-1.42,1.42L14.59,16l-4.25,4.24a1,1,0,0,0,1.42,1.42L16,17.41l4.24,4.25a1,1,0,0,0,1.42-1.42L17.41,16l4.25-4.24A1,1,0,0,0,21.66,10.34Z"></path>
</svg>
                                </button>
                                <h5>File Information</h5>
                                <p class="mb-3">Information to display</p>
                            </div>
                            <div class="modal-body px-4">
                                <div class="form-group">
                                    <label>System name</label>
                                    <input type="text" class="form-control" data-target="fields--upload.name" readonly="" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>Display name</label>
                                    <input type="text" class="form-control" data-target="fields--upload.original" maxlength="255" placeholder="Display Name">
                                </div>
                                <div class="form-group">
                                    <label>Alternative text</label>
                                    <input type="text" class="form-control" data-target="fields--upload.alt" maxlength="255" placeholder="Alternative Text">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control no-resize" data-target="fields--upload.description" placeholder="Description" maxlength="255" rows="3"></textarea>
                                </div>


                                                                <div class="form-group">
                                    <a href="#" data-action="click->fields--upload#openLink">
                                        <small>
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="mr-2" role="img" fill="currentColor" componentname="orchid-icon">
    <path d="M9.239 22.889c0.195 0.195 0.451 0.293 0.707 0.293s0.511-0.098 0.707-0.293l12.114-12.209c0.39-0.39 0.39-1.024 0-1.414s-1.023-0.39-1.414 0l-12.114 12.209c-0.391 0.39-0.391 1.023 0 1.414zM14.871 20.76c0.331 1.457-0.026 2.887-1.152 4.014l-4.039 3.914c-0.85 0.849-1.98 1.317-3.182 1.317s-2.332-0.468-3.182-1.317c-1.754-1.755-1.754-4.61-0.010-6.354l3.946-4.070c0.85-0.849 1.98-1.318 3.182-1.318 0.411 0 0.807 0.073 1.193 0.179l1.561-1.561c-0.871-0.407-1.811-0.619-2.754-0.619-1.663 0-3.327 0.635-4.596 1.904l-3.936 4.061c-2.538 2.538-2.538 6.654 0 9.193 1.269 1.27 2.933 1.904 4.596 1.904s3.327-0.634 4.596-1.904l4.030-3.904c1.942-1.942 2.361-4.648 1.333-7.023zM30.098 1.899c-1.27-1.269-2.933-1.904-4.596-1.904-1.664 0-3.328 0.635-4.596 1.904l-4.029 3.905c-2.012 2.013-2.423 5.015-1.244 7.439l1.552-1.552c-0.459-1.534-0.107-3.261 1.096-4.463l4.039-3.914c0.851-0.849 1.98-1.318 3.183-1.318 1.201 0 2.332 0.469 3.181 1.318 1.754 1.755 1.754 4.611 0.010 6.354l-4.039 4.039c-0.849 0.85-1.98 1.317-3.181 1.317-0.306 0-0.576 0.031-0.87-0.029l-1.593 1.594c0.796 0.331 1.613 0.436 2.463 0.436 1.663 0 3.326-0.634 4.596-1.904l4.029-4.029c2.538-2.538 2.538-6.653-0-9.192z"></path>
</svg>

                                            Link to file
                                        </small>
                                    </a>
                                </div>
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-link">
                                    <span>
                                        Close
                                    </span>
                                </button>
                                <button type="button" data-action="click->fields--upload#save" class="btn btn-default">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="media modal fade disable-scroll" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog modal-xl slide-up">
                    <div class="modal-content-wrapper">
                        <div class="modal-content">
                            <div class="modal-header clearfix">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h5>Media Library</h5>
                                <p class="mb-3">Previously uploaded files</p>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Search file</label>
                                            <input type="search" data-target="fields--upload.search" data-action="keydown->fields--upload#loadMedia" class="form-control form-control-sm" placeholder="Search...">
                                        </div>

                                        <div class="media-loader spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>


                                        <div class="row media-results"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <template id="dropzone-field-invoiceadditionalcostattchment-975aa3edc38c05428d3cb54f6bc9e3b4585b72d6-remove-button">
                <a href="javascript:;" class="btn-remove">×</a>
            </template>

            <template id="dropzone-field-invoiceadditionalcostattchment-975aa3edc38c05428d3cb54f6bc9e3b4585b72d6-edit-button">
                <a href="javascript:;" class="btn-edit">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="mb-1" role="img" fill="currentColor" componentname="orchid-icon">
    <path d="M24.98 30.009h-23v-25h14.050l2.022-1.948-0.052-0.052h-16.020c-1.105 0-2 0.896-2 2v25c0 1.105 0.895 2 2 2h23c1.105 0 2-0.895 2-2v-14.646l-2 1.909v12.736zM30.445 1.295c-0.902-0.865-1.898-1.304-2.961-1.304-1.663 0-2.876 1.074-3.206 1.403-0.468 0.462-13.724 13.699-13.724 13.699-0.104 0.106-0.18 0.235-0.219 0.38-0.359 1.326-2.159 7.218-2.176 7.277-0.093 0.302-0.010 0.631 0.213 0.851 0.159 0.16 0.373 0.245 0.591 0.245 0.086 0 0.172-0.012 0.257-0.039 0.061-0.020 6.141-1.986 7.141-2.285 0.132-0.039 0.252-0.11 0.351-0.207 0.631-0.623 12.816-12.618 13.802-13.637 1.020-1.052 1.526-2.146 1.507-3.253-0.019-1.094-0.55-2.147-1.575-3.129zM29.076 6.285c-0.556 0.574-4.914 4.88-12.952 12.798l-0.615 0.607c-0.921 0.285-3.128 0.994-4.796 1.532 0.537-1.773 1.181-3.916 1.469-4.929 1.717-1.715 13.075-13.055 13.506-13.48 0.084-0.084 0.851-0.821 1.795-0.821 0.536 0 1.053 0.244 1.577 0.748 0.627 0.602 0.95 1.179 0.959 1.72 0.010 0.556-0.308 1.171-0.943 1.827z"></path>
</svg>
                </a>
            </template>


        </div>
    </div>

    </div>


        </div>
    </div>

    </div>
    <div data-controller="invoice">
    <button  form="post-form" data-action="click->invoice#removeCharge"   class="add-more" type="button">

    Remove                
    </button>
</div>
</fieldset>
