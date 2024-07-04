@props(['guarantor'])


<div class="form-body mt-4">
						
    <div class="border border-3 p-4 rounded">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="guarantorFullname" class="form-label">Name of Guarantor</label>
                    <input type="text" disabled value="{{ $guarantor->guarantorFullname }}" class="form-control" name="guarantorFullname" id="guarantorFullname" >
                </div>
            </div>
           
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="guarantorPhoneNumber" class="form-label"> Guarantor Phone Number</label>
                    <input type="text" disabled  value="{{ $guarantor->guarantorPhoneNumber }}" class="form-control" name="guarantorPhoneNumber" id="guarantorPhoneNumber" placeholder="Enter phone number">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="guarantorNrc" class="form-label">Guarantor NRC</label>
                    <input type="text" disabled class="form-control" name="guarantorNrc" value="{{ $guarantor->guarantorNrc }}" id="guarantorNrc" placeholder="111111/11/1" maxlength="11" oninput="formatNRC(this)">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="refereeFullname" class="form-label">Name of Referee  (If applicable)</label>
                    <input type="text" disabled value="{{ $guarantor->refereeFullname }}" class="form-control" name="refereeFullname" id="fullname" >
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="refereePhoneNumber" class="form-label">Referee Phone Number</label>
                    <input type="text" disabled  value="{{ $guarantor->refereePhoneNumber }}" class="form-control" name="refereePhoneNumber" id="phoneNumber" placeholder="Enter phone number">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="refereePosition" class="form-label">Referee Position</label>
                    <input type="text" disabled value="{{ $guarantor->refereePosition }}" class="form-control" name="refereePosition" id="fullname" >
                </div>
            </div>

           
             <div hidden class="col-2">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" id="editGuarantorBtn">Save</button>
                    </div>
             </div>
        </div>
    </div>
</div>