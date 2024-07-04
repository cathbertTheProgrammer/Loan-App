@props(['bankdetail'])


<div class="form-body mt-4">
    <div class="border border-3 p-4 rounded">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="bank_name" class="form-label">Name of Bank</label>
                    <input type="text" disabled value="{{ $bankdetail->bank_name }}" class="form-control" name="bank_name" id="bank_name">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="branch" class="form-label">Branch</label>
                    <input type="text" disabled value="{{ $bankdetail->branch }}" class="form-control" name="branch" id="branch" placeholder="Enter phone number">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="account_name" class="form-label">Account Name</label>
                    <input type="text" disabled class="form-control" name="account_name" value="{{ $bankdetail->account_name }}" id="account_name" placeholder="111111/11/1" maxlength="11" oninput="formatNRC(this)">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="account_duration" class="form-label">Duration of Account with Bank</label>
                    <input type="text" disabled value="{{ $bankdetail->account_duration }}" class="form-control" name="account_duration" id="account_duration">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="active_loan" class="form-label">Do you have a Loan with any organization?</label>
                    <div>
                        <input disabled type="radio" id="loan_yes" name="active_loan" value="1" {{ $bankdetail->active_loan == '1' ? 'checked' : '' }}>
                        <label for="loan_yes">Yes</label>
                    </div>
                    <div>
                        <input disabled type="radio" id="loan_no" name="active_loan" value="0" {{ $bankdetail->active_loan == '0' ? 'checked' : '' }}>
                        <label for="loan_no">No</label>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="loanDetails" style="display: none;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="organisation_name" class="form-label">State name of organization/institution</label>
                            <input type="text" disabled value="{{ $bankdetail->organisation_name }}" class="form-control" name="organisation_name" id="organisation_name">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="organisation_address" class="form-label">State the address of organization/institution</label>
                            <textarea class="form-control" disabled name="organisation_address" id="organisation_address" rows="2" placeholder="Enter address">{{ $bankdetail->organisation_address }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="total_debt" class="form-label">Please state your total indebtedness (how much you owe?)</label>
                            <input type="text" disabled value="{{ $bankdetail->total_debt }}" class="form-control" name="total_debt" id="total_debt">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="remaining_years" class="form-label">How many months/Years are remaining</label>
                            <input type="text" disabled value="{{ $bankdetail->remaining_years }}" class="form-control" name="remaining_years" id="remaining_years">
                        </div>
                    </div>
                </div>
            </div>

            <div hidden class="col-2">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" id="editBankeDetailsBtn">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>