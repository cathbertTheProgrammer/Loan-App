<x-client-layout>
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Loans</p>
                                <h4 class="my-1 text-info">{{ $totalLoans }}</h4>

                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto">
                                <i class='bx bx-dollar'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Credit </p>
                                <h4 class="my-1 text-danger">K{{ $totalCredit }}</h4>
                                {{-- <p class="mb-0 font-13">+5.4% from last week</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Active Loans</p>
                                <h4 class="my-1 text-success">{{ $activeLoans }}</h4>

                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class="bi bi-check2-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Pending Loans</p>
                                <h4 class="my-1 text-warning">{{ $pendingLoans }}</h4>

                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                                <i class="bi bi-arrow-clockwise"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

      


        <div class="row">
            <div class="col-12 col-lg-7 col-xl-7 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <p class="font-weight-bold mb-1 text-secondary">Loans</p>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h4 class="mb-0">K{{ $totalRequested }}</h4>
                            </div>
                            <div class="">
                                {{-- <p class="mb-0 align-self-center font-weight-bold text-success ms-2">4.4% <i
                                        class="bx bxs-up-arrow-alt mr-2"></i>
                                </p> --}}
                            </div>
                        </div>
                        <div class="chart-container-0 mt-5">
                            <canvas id="client-chart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 col-xl-5 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Loan Summary</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container-1 mt-3">
                            <canvas id="client-chart4"></canvas>
                        </div>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                            Paid <span class="badge bg-gradient-quepal rounded-pill">{{ $activeLoans }}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Rejected <span class="badge bg-gradient-ibiza rounded-pill">{{ $rejectedLoans }}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Pending <span class="badge bg-gradient-deepblue rounded-pill">{{ $pendingLoans }}</span>
                        </li>
                    </ul>
                </div>
            </div>
          
        </div><!--end row-->

    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Chart 3: Monthly Loans
            var ctx3 = document.getElementById('client-chart3').getContext('2d');
            var monthlyLoanData = @json($monthlyLoanData);

            var chart3 = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Loans',
                        data: monthlyLoanData,
                        backgroundColor: 'rgba(0, 176, 155, 0.2)',
                        borderColor: 'rgba(0, 176, 155, 1)',
                        borderWidth: 3,
                        fill: true,
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart 4: Loan Summary
            var ctx4 = document.getElementById('client-chart4').getContext('2d');
            var loanSummaryData = @json([$activeLoans, $pendingLoans, $rejectedLoans]);

            var chart4 = new Chart(ctx4, {
                type: 'pie',
                data: {
                    labels: ["Paid", "Pending", "Rejected"],
                    datasets: [{
                        backgroundColor: [
                            'rgba(0, 176, 155, 1)',
                            'rgba(255, 165, 0, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        data: loanSummaryData,
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                        }
                    }
                }
            });
        </script>
    @endpush

</x-client-layout>
