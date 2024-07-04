@props(['loan'])

<form>
    @csrf
    @method('POST')
    
    <div class="form-body mt-4">
        <div class="row">
            <div class="">
                <div class="border border-3 p-4 rounded view-back">
                    <div class="row view-font">
                        <div class="col-lg-6 col-md-12 col-sm-12 form">
                            <p><span class="form-label">Loan Type: </span> <span class='form-control'>{{ $loan->loan_type }}</span></p>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <p><span class="form-label">Amount: </span> <span class='form-control'>K{{ $loan->amount }}</span></p>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <p><span class="form-label">Amount in Words: </span> <span class='form-control'>{{ $loan->amount_in_words }}</span></p>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <p><span class="form-label">Period: </span> <span class='form-control'>{{ $loan->period }} Months</span></p>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <p><span class="form-label">Purpose: </span> <span class='form-control'>{{ $loan->purpose }}</span></p>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <span class="form-label">Status: </span> 
                            <span class='form-control'>
                                @if ($loan->status == 'ACTIVE')
                                    <div class="text-success bg-light-success p-2 text-uppercase px-3"><i class="bi bi-check-circle"></i>{{ $loan->status }}</div>
                                @elseif ($loan->status == 'PENDING')
                                    <div class="text-info bg-light-info p-2 text-uppercase px-3"><i class="bi bi-arrow-clockwise"></i>{{ $loan->status }}</div>
                                @elseif (in_array($loan->status, ['DISABLED', 'DELETED']))
                                    <div class="text-danger bg-light-danger p-2 text-uppercase px-3"><i class="bi bi-x-circle"></i>{{ $loan->status }}</div>
                                @endif
                            </span>
                        </div>
                        @if($loan->loan_type === 'payslip_related')
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <span class="form-label">Pay Slips: </span> 
                                <span class='form-control'>
                                    <a href="{{ Storage::url($loan->pay_slips) }}" class="btn btn-primary" download>Download Pay Slips</a>
                                </span>
                            </div>
                        @endif
                        @if($loan->loan_type === 'business_related')
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <span class="form-label">Sales Records: </span> 
                                <span class='form-control'>
                                    <a href="{{ Storage::url($loan->sales_records) }}" class="btn btn-primary" download>Download Sales Records</a>
                                </span>
                            </div>
                        @endif
                        @if($loan->loan_type === 'collateral_related' && $loan->assets->count())
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <span class="form-label">Collateral Assets</span>
                                <span class='form-control'>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Asset#</th>
                                                    <th>Description</th>
                                                    <th>Value</th>			
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($loan->assets as $asset)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h6 class="mb-0 font-14">#{{ $asset->id }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $asset->description }}</td>
                                                        <td>K{{ $asset->value }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
