<x-requests-layout>
    <div class="page-content">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="border-b border-gray-200 mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Service Request</h2>
            </div>

            <form id="serviceRequestForm" method="POST" enctype="multipart/form-data" action="{{ route('client.storeServiceRequest') }}">
                @csrf
                @method('POST')

                <div class="space-y-6">
                    <div class="space-y-4">
                        <div>
                            <label for="service_type" class="block text-sm font-medium text-gray-700">Service Type</label>
                            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="service_type" id="service_type" required>
                                <option value="">Select the service type</option>
                                @foreach ($service_types as $service_type)
                                    <option value="{{ $service_type->id }}">{{ $service_type->service_type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="service_dropdown_container" style="display: none;">
                            <label for="services" class="block text-sm font-medium text-gray-700">Select Services</label>
                            <select multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="services[]" id="services" required>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="block text-sm font-medium text-gray-700">Service Details</label>
                            <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="description" id="description" rows="3" placeholder="Kindly provide details of the required service."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="email" id="email" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-3">
                                <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="firstname" id="firstname" required>
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="lastname" id="lastname" required>
                            </div>

                            <div class="mb-3">
                                <label for="country_code" class="block text-sm font-medium text-gray-700">Country Code</label>
                                <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="country_code" id="country_code" required>
                                    <x-country-phone-code />
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                                <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="phone" id="phone" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="address" id="address" rows="2" placeholder="Enter address"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="urgent" class="block text-sm font-medium text-gray-700">Is it Urgent?</label>
                            <div class="flex items-center space-x-4">
                                <div>
                                    <input type="radio" id="yes" name="urgent" value="1" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                    <label for="yes" class="ml-2 block text-sm font-medium text-gray-700">Yes</label>
                                </div>
                                <div>
                                    <input type="radio" id="no" name="urgent" value="0" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                    <label for="no" class="ml-2 block text-sm font-medium text-gray-700">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="block text-sm font-medium text-gray-700">Preferred Deadline</label>
                            <input type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="deadline" id="deadline" required>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="addBankDetailsBtn">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const services = @json($services);

                document.getElementById('service_type').addEventListener('change', function() {
                    const serviceTypeId = this.value;
                    const serviceDropdown = document.getElementById('services');
                    const serviceContainer = document.getElementById('service_dropdown_container');
                    
                    // Clear previous options
                    serviceDropdown.innerHTML = '';

                    if (serviceTypeId) {
                        const filteredServices = services.filter(service => service.service_type_id == serviceTypeId);

                        filteredServices.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id;
                            option.textContent = service.service;
                            serviceDropdown.appendChild(option);
                        });

                        serviceContainer.style.display = 'block';
                    } else {
                        serviceContainer.style.display = 'none';
                    }
                });
            });
        </script>

        <script src="{{ asset('assets/js/serviceRequest.js') }}" ></script>
    @endpush
</x-requests-layout>
