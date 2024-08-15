<x-admin-layout>
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Amount Disbursed</p>
                                <h4 class="my-1 text-info">K{{ $totalCredit }}</h4>
                                {{-- <p class="mb-0 font-13">view</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto">
                                <i class="bi bi-currency-dollar"></i>
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
                                {{-- <p class="mb-0 font-13">view</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class="bi bi-toggle-on"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-recommend">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary recommend-text">Pending Requests</p>
                                <h4 class="my-1 text-recommend">{{ $pendingRequests }}</h4>
                                {{-- <p class="mb-0 font-13">view</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-moonlit text-white ms-auto">
                                <i class="bi bi-arrow-clockwise"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-approved">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Approved Loans</p>
                                <h4 class="my-1 text-approved">{{ $activeLoans }}</h4>
                                {{-- <p class="mb-0 font-13">view</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-cosmic text-white ms-auto">
                                <i class="bi bi-check-all"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          

            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-verified">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Verified Loans</p>
                                <h4 class="my-1 text-verified">{{ $verifiedLoans }}</h4>
                                {{-- <p class="mb-0 font-13">view</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle split-bg-secondary text-white ms-auto">
                                <i class="bi bi-list-check"></i>
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
                                {{-- <p class="mb-0 font-13">View</p> --}}
                            </div>

                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                                <i class="bi bi-arrow-repeat"></i>
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
                                <p class="mb-0 text-secondary">Reject Loans </p>
                                <h4 class="my-1 text-danger">{{ $rejectedLoans }}</h4>
                                {{-- <p class="mb-0 font-13">view</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                                <i class="bi bi-x-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-clients">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary"> Active Clients </p>
                                <h4 class="my-1 text-clients">{{ $totalClients }}</h4>
                                {{-- <p class="mb-0 font-13">view</p> --}}
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-lush text-white ms-auto">
                                <i class="bi bi-person-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-8 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Users Overview</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown"><i
                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="chart-container-1">
                            <canvas id="admin-chart1"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Trending Loans</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown"><i
                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container-2">
                            <canvas id="admin-chart2"></canvas>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                            Collateral Loans<span class="badge bg-success rounded-pill">{{ $collateral_loans }}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Salary Loans <span class="badge bg-danger rounded-pill">{{ $payslips_loans }}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Business Loans <span class="badge bg-primary rounded-pill">{{ $business_loans }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--end row-->

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Recent Loans</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                            data-bs-toggle="dropdown"><i
                                class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Client</th>
                                <th>Amount</th>
                                <th>Category</th>
                                <th>Period</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentLoans as $loan)
                                <tr>
                                    <td>{{ $loan->user->name }}</td>
                                    <td>K{{ $loan->amount }}</td>
                                    <td>{{ $loan->loan_type }}</td>
                                    <td>{{ $loan->period }}</td>


                                    @if (in_array($loan->status, ['ACTIVE', 'APPROVED']))
                                        <td>
                                            <div
                                                class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>{{ $loan->status }}</div>
                                        </td>
                                    @elseif (in_array($loan->status, ['PENDING', 'VERIFIED', 'RECOMMENDED']))
                                        <td>
                                            <div
                                                class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle align-middle me-1'></i>{{ $loan->status }}
                                            </div>
                                        </td>
                                    @elseif (in_array($loan->status, ['DISABLED', 'DELETED']))
                                        <td>
                                            <div
                                                class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle align-middle me-1'></i>{{ $loan->status }}
                                            </div>
                                        </td>
                                    @endif

                                    <td>{{ $loan->created_at }}</td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-12 col-lg-7 col-xl-7 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <p class="font-weight-bold mb-1 text-secondary">Monthly Revenue</p>
                        <div class="d-flex align-items-center mb-4">

                        </div>
                        <div class="chart-container-0 mt-5">
                            <canvas id="admin-chart3"></canvas>
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
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown"><i
                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container-1 mt-3">
                            <canvas id="admin-chart4"></canvas>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                            Paid <span class="badge bg-gradient-quepal rounded-pill">{{ $paidLoans }}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Pending <span class="badge bg-gradient-ibiza rounded-pill">{{ $allPendingLoans }}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Rejected <span class="badge bg-gradient-deepblue rounded-pill">{{ $rejectedLoans }}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Active <span class="badge gradient rounded-pill">{{ $activeLoans }}</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div><!--end row-->

    </div>

    <script>
        $(function() {
            "use strict";

            // chart 1
            var ctx = document.getElementById("admin-chart1").getContext('2d');
            var monthlyUsersData = @json($monthlyUsersData);
            var myChart1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'Users',
                        data: monthlyUsersData,
                        backgroundColor: '#6078ea',
                        borderColor: '#17c5ea',
                        borderWidth: 1
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

            // chart 2
            var ctx2 = document.getElementById("admin-chart2").getContext('2d');
            var trendingLoans = @json($trendingLoans);
            var myChart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(trendingLoans),
                    datasets: [{
                        data: Object.values(trendingLoans),
                        backgroundColor: ['#fc4a1a', '#4776e6', '#ee0979', '#42e695']
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: 82
                }
            });

            // chart 3 - Monthly Revenue
            var monthlyRevenueData = @json(array_values($monthlyRevenueData));
            var ctx = document.getElementById('admin-chart3').getContext('2d');

            var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke1.addColorStop(0, '#00b09b');
            gradientStroke1.addColorStop(1, '#96c93d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'Monthly Revenue',
                        data: monthlyRevenueData,
                        backgroundColor: gradientStroke1,
                        fill: {
                            target: 'origin',
                            above: 'rgba(21, 202, 32, 0.15)',
                        },
                        tension: 0.4,
                        borderColor: gradientStroke1,
                        borderWidth: 3
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // chart 4
            var ctx4 = document.getElementById("admin-chart4").getContext('2d');
            var loanSummaryData = @json($loanSummaryData);
            var myChart4 = new Chart(ctx4, {
                type: 'pie',
                data: {
                    labels: Object.keys(loanSummaryData),
                    datasets: [{
                        data: Object.values(loanSummaryData),
                        backgroundColor: ['#ee0979', '#283c86', '#7f00ff', '#42e695']
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: 95
                }
            });
        });
    </script>


</x-admin-layout>
