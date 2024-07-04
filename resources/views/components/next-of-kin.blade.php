@props(['nextOfKin'])


<div class="form-body mt-4">
						
    <div class="border border-3 p-4 rounded">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Names</label>
                    <input type="text" disabled value="{{ $nextOfKin->fullname }}" class="form-control" name="fullname" id="fullname" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="relationship" class="form-label">Relationship</label>
                    <input type="text" disabled value="{{ $nextOfKin->relationship }}" class="form-control" name="relationship" id="relationship" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" disabled  value="{{ $nextOfKin->phoneNumber }}" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Enter phone number">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="homeAddress" class="form-label">Home Address</label>
                    <textarea class="form-control" disabled name="homeAddress" id="homeAddress" rows="2" placeholder="Enter address">
                        {{ $nextOfKin->homeAddress }}"
                    </textarea>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="nameOfEmployer" class="form-label">Name Of Employer</label>
                    <input type="text" disabled value="{{ $nextOfKin->nameOfEmployer }}" class="form-control" name="nameOfEmployer" id="nameOfEmployer" >
                </div>
            </div>

           

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="telNo" class="form-label">Tel No</label>
                    <input type="text" disabled value="{{ $nextOfKin->telNo }}" class="form-control" name="telNo" id="telNo" placeholder="Enter Tell Number">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="employerAddress" class="form-label">Employers Physical Address</label>
                    <textarea class="form-control" disabled name="employerAddress" id="employerAddress" rows="2" placeholder="Enter address">
                        {{ $nextOfKin->employerAddress }}
                    </textarea>
                </div>
            </div>

             <div hidden class="col-2">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" id="editProfileBtn">Save</button>
                    </div>
             </div>
        </div>
    </div>
</div>