
<x-client-layout>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- Breadcrumb content -->
        </div>
        <!--end breadcrumb-->
        
        

    <div class="col-lg-3 col-xl-2">
                <a id="editAssetButton" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Edit</a>
            </div>
            <hr />

            <form id="editAssetForm" method="POST" action="{{ route('client.updateAsset') }}">
                @csrf
                @method('PUT')
                
                <div class="form-body mt-4">
                    
                    <div class="border border-3 p-4 rounded">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th hidden>Asset #</th>
                                        <th>Asset Description</th>
                                        <th>Serial or Registration Number</th>
                                        <th>Asset Image</th>
                                        <th>Estimated Value</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="assetTableBody">
                                    @foreach ($assets as $asset)
                                        <tr>
                                            <td hidden><input readonly  type="text" class="form-control" name="assets[0][id]" value="{{ $asset->id }}" required></td>
                                            <td><input disabled type="text" class="form-control" name="assets[0][description]" value="{{ $asset->description }}" required></td>
                                            <td><input disabled type="text" class="form-control" name="assets[0][serial]" value="{{ $asset->serial }}" required></td>
                                            <td><input type="file" class="form-control" name="assets[0]assetPicture" id="assetPicture" required> </td>
                                            <td><input disabled type="number" class="form-control estimated-value" name="assets[0][value]" value="{{ $asset->value }}" required></td>
                                        
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td  colspan="2" class="text-end"><strong>Total Value</strong></td>
                                        <td><input disabled type="number" class="form-control" id="totalValue" readonly></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <button type="button" class="btn btn-success" id="addRow">Add Asset</button>
                    </div>

                    <div hidden class="col-2">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" id="editAssetsBtn">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    


    
	

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/assets.js') }}" ></script>

    <script>
         $(document).ready(function() {
                $('#editAssetButton').on('click', function() {
                    // Enable all input, select, and textarea elements
                    $('#editAssetForm input, #editAssetForm select, #editAssetForm textarea').prop('disabled', false);
        
                    // Show the hidden save button
                    $('#editAssetForm button[type="submit"]').closest('.col-2').removeAttr('hidden');
                });
        });

        $(document).ready(function() {
            let rowIndex = 1;

            // Function to calculate total value
            function calculateTotalValue() {
                let totalValue = 0;
                $('.estimated-value').each(function() {
                    totalValue += parseFloat($(this).val()) || 0;
                });
                $('#totalValue').val(totalValue);
            }

            // Add new row
            $('#addRow').click(function() {
                const newRow = `
                    <tr>
                        <td><input type="text" class="form-control" name="assets[${rowIndex}][description]" required></td>
                        <td><input type="text" class="form-control" name="assets[${rowIndex}][serial]" required></td>
                        <td><input type="file" class="form-control" name="assets[${rowIndex}][assetPicture]" required></td>
                        <td><input type="number" class="form-control estimated-value" name="assets[${rowIndex}][value]" required></td>
                        <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                    </tr>`;
                $('#assetTableBody').append(newRow);
                rowIndex++;
            });

            // Remove row
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                calculateTotalValue();
            });

            // Calculate total value on input change
            $(document).on('input', '.estimated-value', function() {
                calculateTotalValue();
            });

            // Initial calculation
            calculateTotalValue();
        });
    </script>
@endpush

</x-client-layout>
