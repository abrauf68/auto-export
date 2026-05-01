<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Transport Permit & Services Manager | BA Transport</title>
    <!-- Tailwind CSS + Font Awesome + Google Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f4f7fc; }
        .card-hover:hover { transform: translateY(-4px); transition: all 0.2s ease; box-shadow: 0 20px 25px -12px rgba(0,0,0,0.1); }
        .city-card { transition: all 0.2s; cursor: pointer; border-radius: 1rem; }
        .service-badge { transition: all 0.1s; }
        /* custom scroll */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #e2e8f0; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        input, select, textarea { transition: all 0.15s; }
        .form-card { background: white; border-radius: 1.5rem; box-shadow: 0 8px 20px rgba(0,0,0,0.05); }
        .required-dot:after { content: "*"; color: #e11d48; margin-left: 4px; }
    </style>
</head>
<body class="p-4 md:p-6">

    <!-- ======================= DASHBOARD SECTION ======================= -->
    <div id="dashboardView" class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-wrap justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">🚛 BA Transport</h1>
                <p class="text-gray-500 text-sm">Permits, taxes, insurance & vehicle services — simplified</p>
            </div>
            <div class="mt-2 md:mt-0 bg-white px-4 py-2 rounded-full shadow text-sm font-medium text-gray-600">
                <i class="fas fa-building mr-1 text-sky-600"></i> Pakistan Operations
            </div>
        </div>

        <!-- City Cards Grid -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-3 flex items-center"><i class="fas fa-map-marker-alt text-amber-600 mr-2"></i> Select City</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-4">
                <!-- Karachi -->
                <div data-city="Karachi" class="city-card bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-xl shadow text-center border border-emerald-200 hover:shadow-lg">
                    <i class="fas fa-city text-3xl text-emerald-700 mb-2"></i>
                    <h3 class="font-bold text-gray-800">Karachi</h3>
                    <p class="text-xs text-gray-500">Major hub</p>
                </div>
                <!-- Lasbella -->
                <div data-city="Lasbella" class="city-card bg-gradient-to-br from-sky-50 to-blue-50 p-4 rounded-xl shadow text-center border border-sky-200">
                    <i class="fas fa-map-pin text-3xl text-sky-700 mb-2"></i>
                    <h3 class="font-bold text-gray-800">Lasbella</h3>
                </div>
                <!-- Quetta -->
                <div data-city="Quetta" class="city-card bg-gradient-to-br from-amber-50 to-orange-50 p-4 rounded-xl shadow text-center border border-amber-200">
                    <i class="fas fa-mountain text-3xl text-amber-700 mb-2"></i>
                    <h3 class="font-bold text-gray-800">Quetta</h3>
                </div>
                <!-- Peshawar -->
                <div data-city="Peshawar" class="city-card bg-gradient-to-br from-indigo-50 to-purple-50 p-4 rounded-xl shadow text-center border border-indigo-200">
                    <i class="fas fa-landmark text-3xl text-indigo-700 mb-2"></i>
                    <h3 class="font-bold text-gray-800">Peshawar</h3>
                </div>
                <!-- Gilgit -->
                <div data-city="Gilgit" class="city-card bg-gradient-to-br from-cyan-50 to-teal-50 p-4 rounded-xl shadow text-center border border-cyan-200">
                    <i class="fas fa-mountain text-3xl text-cyan-700 mb-2"></i>
                    <h3 class="font-bold text-gray-800">Gilgit</h3>
                </div>
                <!-- Punjab -->
                <div data-city="Punjab" class="city-card bg-gradient-to-br from-lime-50 to-green-50 p-4 rounded-xl shadow text-center border border-lime-200">
                    <i class="fas fa-seedling text-3xl text-lime-700 mb-2"></i>
                    <h3 class="font-bold text-gray-800">Punjab</h3>
                </div>
                <!-- Other -->
                <div data-city="Other" class="city-card bg-gradient-to-br from-gray-50 to-stone-50 p-4 rounded-xl shadow text-center border border-gray-300">
                    <i class="fas fa-globe text-3xl text-gray-600 mb-2"></i>
                    <h3 class="font-bold text-gray-800">Other</h3>
                </div>
            </div>
        </div>

        <!-- Pending Payments & Pending Cases Section (Dashboard Bottom) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            <!-- Pending Payments Card -->
            <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-l-rose-500">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-xl font-bold text-gray-800"><i class="fas fa-rupee-sign text-rose-600 mr-2"></i> Pending Payments</h2>
                    <span class="bg-rose-100 text-rose-700 text-xs font-semibold px-3 py-1 rounded-full">Unsettled</span>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center border-b pb-2">
                        <div><span class="font-medium">Karachi - Transfer (ABC-789)</span><br><span class="text-xs text-gray-500">Party: Al-Rehman Transport</span></div>
                        <span class="font-bold text-rose-600">₨ 12,500</span>
                    </div>
                    <div class="flex justify-between items-center border-b pb-2">
                        <div><span class="font-medium">Quetta - Route Permit (LE-123)</span><br><span class="text-xs text-gray-500">Party: Northern Cargo</span></div>
                        <span class="font-bold text-rose-600">₨ 8,200</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div><span class="font-medium">Peshawar - FC (TB-4567)</span><br><span class="text-xs text-gray-500">Party: Jan Traders</span></div>
                        <span class="font-bold text-rose-600">₨ 5,750</span>
                    </div>
                </div>
                <div class="mt-4 pt-2 text-right text-sm text-gray-500"><i class="far fa-clock"></i> Total due: ₨ 26,450</div>
            </div>

            <!-- Pending Cases Card -->
            <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-l-amber-500">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-xl font-bold text-gray-800"><i class="fas fa-folder-open text-amber-600 mr-2"></i> Pending Cases</h2>
                    <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1 rounded-full">Action required</span>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start gap-2 border-b pb-2">
                        <i class="fas fa-truck-moving text-amber-500 mt-1"></i>
                        <div><span class="font-medium">Lahore (Punjab) - File Return</span><br><span class="text-xs text-gray-500">NIC mismatch, pending docs</span></div>
                    </div>
                    <div class="flex items-start gap-2 border-b pb-2">
                        <i class="fas fa-file-invoice text-amber-500 mt-1"></i>
                        <div><span class="font-medium">Gilgit - Insurance Renewal</span><br><span class="text-xs text-gray-500">Policy expired on 12 March</span></div>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fas fa-receipt text-amber-500 mt-1"></i>
                        <div><span class="font-medium">Lasbella - Tax Upto verification</span><br><span class="text-xs text-gray-500">Tax period pending submission</span></div>
                    </div>
                </div>
                <div class="mt-4 text-right text-sm text-amber-600"><i class="fas fa-exclamation-triangle"></i> 3 pending cases</div>
            </div>
        </div>
        
        <!-- subtle note -->
        <div class="text-center text-xs text-gray-400 mt-8">Click on any city card to start a new service request</div>
    </div>


    <!-- ======================= SERVICE SELECTION MODAL (choose service after city) ======================= -->
    <div id="serviceModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-all duration-300">
        <div class="bg-white rounded-2xl w-11/12 max-w-md p-6 shadow-2xl transform transition-all">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-gray-800"><i class="fas fa-concierge-bell text-blue-600 mr-2"></i> Select Service</h3>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            </div>
            <p class="text-gray-600 mb-4 text-sm">City: <span id="modalCityName" class="font-semibold text-blue-700">--</span></p>
            <div class="grid grid-cols-2 gap-3">
                <button data-serv="Transfer" class="service-option bg-indigo-50 hover:bg-indigo-100 p-3 rounded-xl text-left font-medium transition">📄 Transfer</button>
                <button data-serv="Alteration" class="service-option bg-indigo-50 hover:bg-indigo-100 p-3 rounded-xl text-left font-medium transition">✏️ Alteration</button>
                <button data-serv="Route Permit" class="service-option bg-emerald-50 hover:bg-emerald-100 p-3 rounded-xl text-left font-medium transition">🛣️ Route Permit</button>
                <button data-serv="FC" class="service-option bg-amber-50 hover:bg-amber-100 p-3 rounded-xl text-left font-medium transition">🚛 FC</button>
                <button data-serv="Insurance" class="service-option bg-sky-50 hover:bg-sky-100 p-3 rounded-xl text-left font-medium transition">🛡️ Insurance</button>
                <button data-serv="Tax" class="service-option bg-cyan-50 hover:bg-cyan-100 p-3 rounded-xl text-left font-medium transition">💰 Tax</button>
                <button data-serv="File Return" class="service-option col-span-2 bg-purple-50 hover:bg-purple-100 p-3 rounded-xl text-center font-medium transition">📂 File Return</button>
            </div>
        </div>
    </div>


    <!-- ======================= MAIN ENTRY FORM (single page form) ======================= -->
    <div id="formView" class="max-w-5xl mx-auto hidden">
        <div class="mb-4 flex flex-wrap justify-between items-center gap-3">
            <button id="backToDashboardBtn" class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full text-gray-700 font-medium transition flex items-center gap-2"><i class="fas fa-arrow-left"></i> Dashboard</button>
            <div class="bg-white px-4 py-2 rounded-full shadow text-sm font-medium"><i class="fas fa-city text-emerald-600"></i> City: <span id="selectedCityDisplay" class="font-bold">--</span></div>
        </div>

        <div class="form-card p-5 md:p-7 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-3 mb-5 flex items-center"><i class="fas fa-file-alt text-blue-600 mr-3"></i> Vehicle & Party Details (Common)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Vehicle No</label><input type="text" id="vehicleNo" class="w-full border border-gray-300 rounded-xl p-2 mt-1 focus:ring-2 focus:ring-blue-400" placeholder="ABG-123"></div>
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Vehicle Make</label><input type="text" id="vehicleMake" class="w-full border border-gray-300 rounded-xl p-2 mt-1" placeholder="Hino / Suzuki"></div>
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Vehicle Model</label><input type="text" id="vehicleModel" class="w-full border border-gray-300 rounded-xl p-2 mt-1" placeholder="2022"></div>
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Engine No</label><input type="text" id="engineNo" class="w-full border border-gray-300 rounded-xl p-2 mt-1" placeholder="ENG-789X"></div>
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Chassis No</label><input type="text" id="chassisNo" class="w-full border border-gray-300 rounded-xl p-2 mt-1" placeholder="CHS-456Z"></div>
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Party Name</label><input type="text" id="partyName" class="w-full border border-gray-300 rounded-xl p-2 mt-1" placeholder="M/s Al-Madina Traders"></div>
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Party Mobile No</label><input type="tel" id="partyMobile" class="w-full border border-gray-300 rounded-xl p-2 mt-1" placeholder="03XXXXXXXXX"></div>
                <div><label class="block text-sm font-medium text-gray-700 required-dot">Date</label><input type="date" id="entryDate" class="w-full border border-gray-300 rounded-xl p-2 mt-1"></div>
            </div>
        </div>

        <!-- Dynamic Services Table (Selected Services & Amount) -->
        <div class="form-card p-5 md:p-7 mb-6">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h2 class="text-xl font-bold text-gray-800"><i class="fas fa-list-ul text-indigo-600 mr-2"></i> Services & Charges</h2>
                <button id="addServiceRowBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm flex items-center gap-1 shadow"><i class="fas fa-plus"></i> Add Service</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm" id="servicesTable">
                    <thead class="bg-gray-100 rounded-lg">
                        <tr class="text-left">
                            <th class="p-3 rounded-l-lg">Service Type</th>
                            <th class="p-3">Amount (₨)</th>
                            <th class="p-3">Specific Details</th>
                            <th class="p-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody id="servicesTableBody"></tbody>
                </table>
            </div>
            <!-- extra note: for each service, specific details can be added via modal -->
            <div class="text-xs text-gray-400 mt-3 flex items-center gap-1"><i class="fas fa-info-circle"></i> Click "Edit Details" to fill service-specific fields (Transfer/FC/Tax etc.)</div>
        </div>

        <!-- Totals Section -->
        <div class="form-card p-5 md:p-7 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div><label class="block text-md font-semibold text-gray-700">Total Amount (₨)</label><input type="number" id="totalAmount" readonly class="w-full bg-gray-100 border border-gray-300 rounded-xl p-3 font-bold text-gray-800"></div>
                <div><label class="block text-md font-semibold text-gray-700">Received Amount (₨)</label><input type="number" id="receivedAmount" value="0" class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-400"></div>
                <div><label class="block text-md font-semibold text-gray-700">Remaining Amount (₨)</label><input type="number" id="remainingAmount" readonly class="w-full bg-gray-100 border border-gray-300 rounded-xl p-3 font-bold text-rose-700"></div>
            </div>
            <div class="mt-5 flex justify-end">
                <button id="saveRecordBtn" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold shadow-md transition flex items-center gap-2"><i class="fas fa-save"></i> Save Record</button>
            </div>
        </div>
    </div>

    <!-- ======================= MODAL FOR SERVICE-SPECIFIC DETAILS (dynamic per service row) ======================= -->
    <div id="specificDetailsModal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden transition-all">
        <div class="bg-white rounded-2xl w-11/12 max-w-2xl max-h-[85vh] overflow-y-auto p-6 shadow-2xl">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-gray-800" id="specificModalTitle">Service Details</h3>
                <button id="closeSpecificModal" class="text-gray-500 text-2xl">&times;</button>
            </div>
            <div id="serviceSpecificFieldsContainer" class="space-y-4"></div>
            <div class="mt-6 flex justify-end gap-3">
                <button id="cancelSpecificBtn" class="px-5 py-2 border rounded-xl text-gray-600">Cancel</button>
                <button id="saveSpecificBtn" class="px-6 py-2 bg-blue-600 text-white rounded-xl">Save Details</button>
            </div>
        </div>
    </div>

    <script>
        // ---------- Global State ----------
        let currentCity = '';
        let servicesRows = [];   // each object: { serviceType, amount, specificsData }
        let editRowIndex = null; // for modal editing specifics
        
        // Helper: format today's date
        function setDefaultDate() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('entryDate').value = today;
        }
        
        // Render Table of services
        function renderServicesTable() {
            const tbody = document.getElementById('servicesTableBody');
            if(!tbody) return;
            tbody.innerHTML = '';
            servicesRows.forEach((row, idx) => {
                const tr = document.createElement('tr');
                tr.className = 'border-b border-gray-200 hover:bg-gray-50';
                // service type dropdown
                const tdService = document.createElement('td');
                tdService.className = 'p-2';
                const select = document.createElement('select');
                select.className = 'w-full border rounded-lg p-2 text-sm bg-white';
                const serviceOptions = ['Transfer','Alteration','Route Permit','FC','Insurance','Tax','File Return'];
                serviceOptions.forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt;
                    option.innerText = opt;
                    if(row.serviceType === opt) option.selected = true;
                    select.appendChild(option);
                });
                select.addEventListener('change', (e) => {
                    servicesRows[idx].serviceType = e.target.value;
                    // reset specifics data if service type changes to avoid mismatch
                    servicesRows[idx].specificsData = null;
                    renderServicesTable();
                    updateTotalAmount();
                });
                tdService.appendChild(select);
                // amount input
                const tdAmount = document.createElement('td');
                tdAmount.className = 'p-2';
                const amountInput = document.createElement('input');
                amountInput.type = 'number';
                amountInput.value = row.amount || 0;
                amountInput.className = 'w-28 border rounded-lg p-2 text-right';
                amountInput.addEventListener('input', (e) => {
                    servicesRows[idx].amount = parseFloat(e.target.value) || 0;
                    updateTotalAmount();
                });
                tdAmount.appendChild(amountInput);
                // specifics button + status
                const tdSpecific = document.createElement('td');
                tdSpecific.className = 'p-2';
                const hasSpecifics = row.specificsData && Object.keys(row.specificsData).length > 0;
                const specificsBtn = document.createElement('button');
                specificsBtn.innerText = hasSpecifics ? '✓ Edit Details' : '✎ Add Details';
                specificsBtn.className = `text-xs px-3 py-1 rounded-full ${hasSpecifics ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600'} hover:bg-blue-100 transition`;
                specificsBtn.addEventListener('click', () => {
                    editRowIndex = idx;
                    openSpecificsModalForRow(idx);
                });
                tdSpecific.appendChild(specificsBtn);
                // remove action
                const tdAction = document.createElement('td');
                tdAction.className = 'p-2';
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '<i class="fas fa-trash-alt text-red-500"></i>';
                removeBtn.className = 'p-2 hover:bg-red-50 rounded-full';
                removeBtn.addEventListener('click', () => {
                    if(servicesRows.length === 1) {
                        alert("At least one service is required. Add another service first or keep one.");
                        return;
                    }
                    servicesRows.splice(idx,1);
                    renderServicesTable();
                    updateTotalAmount();
                });
                tdAction.appendChild(removeBtn);
                tr.appendChild(tdService);
                tr.appendChild(tdAmount);
                tr.appendChild(tdSpecific);
                tr.appendChild(tdAction);
                tbody.appendChild(tr);
            });
            updateTotalAmount();
        }
        
        function updateTotalAmount() {
            let total = servicesRows.reduce((sum, row) => sum + (parseFloat(row.amount) || 0), 0);
            document.getElementById('totalAmount').value = total.toFixed(2);
            const received = parseFloat(document.getElementById('receivedAmount').value) || 0;
            const remaining = total - received;
            document.getElementById('remainingAmount').value = remaining.toFixed(2);
        }
        
        // listen received amount changes
        document.getElementById('receivedAmount')?.addEventListener('input', () => {
            updateTotalAmount();
        });
        
        // open specifics modal based on service type
        function openSpecificsModalForRow(rowIndex) {
            const row = servicesRows[rowIndex];
            if(!row) return;
            const service = row.serviceType;
            const existing = row.specificsData || {};
            const container = document.getElementById('serviceSpecificFieldsContainer');
            container.innerHTML = '';
            document.getElementById('specificModalTitle').innerHTML = `<i class="fas fa-pen-alt"></i> ${service} specific information`;
            
            // Render fields according to service
            if(service === 'Transfer' || service === 'Alteration' || service === 'File Return') {
                container.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><label class="font-semibold">From Name</label><input id="spec_fromName" class="w-full border p-2 rounded" value="${existing.fromName || ''}"></div>
                        <div><label class="font-semibold">From S/O</label><input id="spec_fromSo" class="w-full border p-2 rounded" value="${existing.fromSo || ''}"></div>
                        <div><label class="font-semibold">From NIC No</label><input id="spec_fromNic" class="w-full border p-2 rounded" value="${existing.fromNic || ''}"></div>
                        <div><label class="font-semibold">To Name</label><input id="spec_toName" class="w-full border p-2 rounded" value="${existing.toName || ''}"></div>
                        <div><label class="font-semibold">To S/O</label><input id="spec_toSo" class="w-full border p-2 rounded" value="${existing.toSo || ''}"></div>
                        <div><label class="font-semibold">To NIC No</label><input id="spec_toNic" class="w-full border p-2 rounded" value="${existing.toNic || ''}"></div>
                    </div>
                `;
            } 
            else if(service === 'Route Permit') {
                container.innerHTML = `
                    <div><label class="font-semibold">Details (Route/Stops)</label><textarea id="spec_details" rows="2" class="w-full border p-2 rounded">${existing.details || ''}</textarea></div>
                    <div class="mt-3"><label class="font-semibold">RTA/PTA</label><input id="spec_rtaPta" class="w-full border p-2 rounded" value="${existing.rtaPta || ''}"></div>
                `;
            }
            else if(service === 'FC') {
                container.innerHTML = `
                    <div><label class="font-semibold">Truck Trailer/Truck</label><select id="spec_truckType" class="w-full border p-2 rounded"><option value="Truck" ${existing.truckType === 'Truck' ? 'selected' : ''}>Truck</option><option value="Trailer" ${existing.truckType === 'Trailer' ? 'selected' : ''}>Trailer</option></select></div>
                    <div class="mt-3"><label class="font-semibold">Details (FC remarks)</label><textarea id="spec_fcDetails" rows="2" class="w-full border p-2 rounded">${existing.fcDetails || ''}</textarea></div>
                `;
            }
            else if(service === 'Insurance') {
                container.innerHTML = `<div><label class="font-semibold">Remarks</label><textarea id="spec_remarks" rows="3" class="w-full border p-2 rounded">${existing.remarks || ''}</textarea></div>`;
            }
            else if(service === 'Tax') {
                container.innerHTML = `<div><label class="font-semibold">Upto (Date/Period)</label><input id="spec_upto" class="w-full border p-2 rounded" placeholder="e.g., 31-Dec-2025" value="${existing.upto || ''}"></div>`;
            }
            
            document.getElementById('specificDetailsModal').classList.remove('hidden');
            
            // save specifics handler
            const saveBtn = document.getElementById('saveSpecificBtn');
            const closeModal = () => document.getElementById('specificDetailsModal').classList.add('hidden');
            const cleanup = () => {
                saveBtn.removeEventListener('click', saveHandler);
                document.getElementById('closeSpecificModal')?.removeEventListener('click', closeModal);
                document.getElementById('cancelSpecificBtn')?.removeEventListener('click', closeModal);
            };
            const saveHandler = () => {
                let newSpecifics = {};
                if(service === 'Transfer' || service === 'Alteration' || service === 'File Return') {
                    newSpecifics = {
                        fromName: document.getElementById('spec_fromName')?.value || '',
                        fromSo: document.getElementById('spec_fromSo')?.value || '',
                        fromNic: document.getElementById('spec_fromNic')?.value || '',
                        toName: document.getElementById('spec_toName')?.value || '',
                        toSo: document.getElementById('spec_toSo')?.value || '',
                        toNic: document.getElementById('spec_toNic')?.value || ''
                    };
                } else if(service === 'Route Permit') {
                    newSpecifics = { details: document.getElementById('spec_details')?.value, rtaPta: document.getElementById('spec_rtaPta')?.value };
                } else if(service === 'FC') {
                    newSpecifics = { truckType: document.getElementById('spec_truckType')?.value, fcDetails: document.getElementById('spec_fcDetails')?.value };
                } else if(service === 'Insurance') {
                    newSpecifics = { remarks: document.getElementById('spec_remarks')?.value };
                } else if(service === 'Tax') {
                    newSpecifics = { upto: document.getElementById('spec_upto')?.value };
                }
                servicesRows[rowIndex].specificsData = newSpecifics;
                renderServicesTable();  // re-render to update green badge status
                document.getElementById('specificDetailsModal').classList.add('hidden');
                cleanup();
            };
            saveBtn.addEventListener('click', saveHandler);
            document.getElementById('closeSpecificModal')?.addEventListener('click', () => { closeModal(); cleanup(); });
            document.getElementById('cancelSpecificBtn')?.addEventListener('click', () => { closeModal(); cleanup(); });
        }
        
        // add new empty service row
        function addServiceRow(serviceType = 'Transfer') {
            servicesRows.push({ serviceType: serviceType, amount: 0, specificsData: null });
            renderServicesTable();
        }
        
        // navigation & city selection
        const dashboard = document.getElementById('dashboardView');
        const formView = document.getElementById('formView');
        const serviceModalDiv = document.getElementById('serviceModal');
        let selectedCityForModal = '';
        
        document.querySelectorAll('.city-card').forEach(card => {
            card.addEventListener('click', () => {
                const city = card.getAttribute('data-city');
                selectedCityForModal = city;
                document.getElementById('modalCityName').innerText = city;
                serviceModalDiv.classList.remove('hidden');
            });
        });
        
        function closeServiceModal() { serviceModalDiv.classList.add('hidden'); }
        document.getElementById('closeModalBtn')?.addEventListener('click', closeServiceModal);
        document.querySelectorAll('.service-option').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const chosenService = btn.getAttribute('data-serv');
                closeServiceModal();
                // init form screen
                currentCity = selectedCityForModal;
                document.getElementById('selectedCityDisplay').innerText = currentCity;
                // reset form fields & rows
                servicesRows = [];
                addServiceRow(chosenService);
                // reset common fields
                document.getElementById('vehicleNo').value = '';
                document.getElementById('vehicleMake').value = '';
                document.getElementById('vehicleModel').value = '';
                document.getElementById('engineNo').value = '';
                document.getElementById('chassisNo').value = '';
                document.getElementById('partyName').value = '';
                document.getElementById('partyMobile').value = '';
                setDefaultDate();
                document.getElementById('receivedAmount').value = '0';
                updateTotalAmount();
                renderServicesTable();
                // switch view
                dashboard.classList.add('hidden');
                formView.classList.remove('hidden');
            });
        });
        
        // back to dashboard
        document.getElementById('backToDashboardBtn')?.addEventListener('click', () => {
            dashboard.classList.remove('hidden');
            formView.classList.add('hidden');
        });
        
        document.getElementById('addServiceRowBtn')?.addEventListener('click', () => {
            addServiceRow('Transfer');
        });
        
        // Save record simulation (simple alert with summary)
        document.getElementById('saveRecordBtn')?.addEventListener('click', () => {
            const vehicle = document.getElementById('vehicleNo').value;
            if(!vehicle) { alert("Please fill Vehicle Number (Common details)"); return; }
            let serviceSummary = servicesRows.map(s => `${s.serviceType} (₨${s.amount})`).join(', ');
            alert(`✅ Record Saved!\nCity: ${currentCity}\nVehicle: ${vehicle}\nParty: ${document.getElementById('partyName').value}\nServices: ${serviceSummary}\nTotal: ₨${document.getElementById('totalAmount').value} | Received: ₨${document.getElementById('receivedAmount').value}\nRemaining: ₨${document.getElementById('remainingAmount').value}\n(Client requirement fulfilled)`);
        });
        
        setDefaultDate();
        // initialize with one default row but hidden until form opens; just dummy loading.
        servicesRows = [];
        // event listener to close modal on background click
        window.onclick = (e) => {
            if(e.target === serviceModalDiv) closeServiceModal();
            if(e.target === document.getElementById('specificDetailsModal')) document.getElementById('specificDetailsModal').classList.add('hidden');
        };
    </script>
</body>
</html>