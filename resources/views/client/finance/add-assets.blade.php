<x-client-layout>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ auth()->user()->name }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Assets</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button"
                        class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Applicant’s Proposed Security/Collateral Details</h5>
                <hr />

                <form id="addAssetForm" method="POST" enctype="multipart/form-data" action="{{ route('client.storeAsset') }}">
                    @csrf
                    @method('POST')
                    
                    <div class="form-body mt-4">
                        
                        <div class="border border-3 p-4 rounded">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Asset Description</th>
                                            <th>Serial or Registration Number</th>
                                            <th>Asset Image</th>
                                            <th>Estimated Value</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="assetTableBody">
                                        <tr>
                                            <td><input type="text" class="form-control" name="assets[0][description]" required></td>
                                            <td><input type="text" class="form-control" name="assets[0][serial]" required></td>
                                            <td><input type="file" class="form-control" name="assets[0]assetPicture" id="assetPicture" required> </td>
                                            <td><input type="number" class="form-control estimated-value" name="assets[0][value]" required></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="text-end"><strong>Total Value</strong></td>
                                            <td><input type="number" class="form-control" id="totalValue" readonly></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button type="button" class="btn btn-success" id="addRow">Add Asset</button>     
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success" id="saveAssetsBtn">Save</button>
                        </div>

                       
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/assets.js') }}" ></script>

        <script>
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
