@props(['monthlyIncome'])

<div class="form-body mt-4">
    <div class="border border-3 p-4 rounded">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="mb-2">Income</h5>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary/wage</label>
                    <input type="number" class="form-control" name="salary" id="salary" disabled value="{{ $monthlyIncome->salary }}">
                </div>

                <div class="mb-3">
                    <label for="business_income" class="form-label">Income from business</label>
                    <input type="number" class="form-control" name="business_income" id="business_income" disabled value="{{ $monthlyIncome->business_income }}">
                </div>

                <div class="mb-3">
                    <label for="other_income" class="form-label">Other income</label>
                    <input type="number" class="form-control" name="other_income" id="other_income" disabled value="{{ $monthlyIncome->other_income }}">
                </div>

                <div class="mb-3">
                    <label for="total_income" class="form-label">Total income - A</label>
                    <input type="number" class="form-control" name="total_income" id="total_income" disabled value="{{ $monthlyIncome->total_income }}" readonly>
                </div>
            </div>
           
            <div class="col-lg-6">
                <h5 class="mb-2">Expenditure</h5>
                <div class="mb-3">
                    <label for="rent" class="form-label">Rent</label>
                    <input type="number" class="form-control" name="rent" id="rent" disabled value="{{ $monthlyIncome->rent }}">
                </div>

                <div class="mb-3">
                    <label for="salaries_wages" class="form-label">Salaries/wages</label>
                    <input type="number" class="form-control" name="salaries_wages" id="salaries_wages" disabled value="{{ $monthlyIncome->salaries_wages }}">
                </div>

                <div class="mb-3">
                    <label for="other_expenses" class="form-label">Other expenses</label>
                    <input type="number" class="form-control" name="other_expenses" id="other_expenses" disabled value="{{ $monthlyIncome->other_expenses }}">
                </div>

                <div class="mb-3">
                    <label for="total_expenses" class="form-label">Total expenses - B</label>
                    <input type="number" class="form-control" name="total_expenses" id="total_expenses" disabled value="{{ $monthlyIncome->total_expenses }}" readonly>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="net_income">Net Income (A-B)</label>
                    <input type="number" class="form-control" id="net_income" name="net_income" disabled value="{{ $monthlyIncome->net_income }}" readonly>
                </div>
            </div>
           

        </div>
    </div>
</div>