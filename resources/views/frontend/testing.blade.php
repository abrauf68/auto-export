<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BA Transport | 3-Step System: City → Service → Form</title>
    <!-- Tailwind + FontAwesome + Google Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f1f5f9; }
        .city-card { transition: all 0.2s; cursor: pointer; border-radius: 1.2rem; }
        .city-card:hover { transform: translateY(-5px); box-shadow: 0 20px 30px -12px rgba(0,0,0,0.15); }
        .service-card { transition: all 0.15s; cursor: pointer; border-radius: 1rem; }
        .service-card:hover { transform: scale(1.02); background: #eef2ff; }
        .form-card { background: white; border-radius: 1.5rem; box-shadow: 0 8px 24px rgba(0,0,0,0.05); }
        .step-indicator { background: #e2e8f0; border-radius: 2rem; padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 600; }
        .step-active { background: #2563eb; color: white; }
        .pending-item { border-left: 3px solid #f59e0b; }
        .required-dot:after { content: "*"; color: #e11d48; margin-left: 3px; }
    </style>
</head>
<body class="p-4 md:p-6">

    <!-- ======================= SCREEN 1: DASHBOARD WITH CITIES ======================= -->
    <div id="screen1Dashboard" class="max-w-7xl mx-auto">
        <div class="flex flex-wrap justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-800">🚛 BA Transport</h1>
                <p class="text-gray-500 text-sm">Permits, Taxes, Insurance & Vehicle Services — Pakistan</p>
            </div>
            <div class="mt-2 md:mt-0 bg-white px-5 py-2 rounded-full shadow text-sm font-semibold text-gray-700">
                <i class="fas fa-truck text-sky-600 mr-1"></i> Transport Management
            </div>
        </div>

        <!-- City Cards Grid -->
        <div class="mb-10">
            <h2 class="text-xl font-bold text-gray-700 mb-4 flex items-center"><i class="fas fa-map-marker-alt text-amber-600 mr-2"></i> Select a City to Start</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5">
                <div data-city="Karachi" class="city-card bg-gradient-to-br from-emerald-50 to-green-50 p-5 rounded-xl shadow text-center border border-emerald-200"><i class="fas fa-city text-3xl text-emerald-700 mb-2"></i><h3 class="font-bold text-gray-800">Karachi</h3><p class="text-xs text-gray-500">Major hub</p></div>
                <div data-city="Lasbella" class="city-card bg-gradient-to-br from-sky-50 to-blue-50 p-5 rounded-xl shadow text-center border border-sky-200"><i class="fas fa-map-pin text-3xl text-sky-700 mb-2"></i><h3 class="font-bold text-gray-800">Lasbella</h3></div>
                <div data-city="Quetta" class="city-card bg-gradient-to-br from-amber-50 to-orange-50 p-5 rounded-xl shadow text-center border border-amber-200"><i class="fas fa-mountain text-3xl text-amber-700 mb-2"></i><h3 class="font-bold text-gray-800">Quetta</h3></div>
                <div data-city="Peshawar" class="city-card bg-gradient-to-br from-indigo-50 to-purple-50 p-5 rounded-xl shadow text-center border border-indigo-200"><i class="fas fa-landmark text-3xl text-indigo-700 mb-2"></i><h3 class="font-bold text-gray-800">Peshawar</h3></div>
                <div data-city="Gilgit" class="city-card bg-gradient-to-br from-cyan-50 to-teal-50 p-5 rounded-xl shadow text-center border border-cyan-200"><i class="fas fa-mountain text-3xl text-cyan-700 mb-2"></i><h3 class="font-bold text-gray-800">Gilgit</h3></div>
                <div data-city="Punjab" class="city-card bg-gradient-to-br from-lime-50 to-green-50 p-5 rounded-xl shadow text-center border border-lime-200"><i class="fas fa-seedling text-3xl text-lime-700 mb-2"></i><h3 class="font-bold text-gray-800">Punjab</h3></div>
                <div data-city="Other" class="city-card bg-gradient-to-br from-gray-50 to-stone-50 p-5 rounded-xl shadow text-center border border-gray-300"><i class="fas fa-globe text-3xl text-gray-600 mb-2"></i><h3 class="font-bold text-gray-800">Other</h3></div>
            </div>
        </div>

        <!-- Pending Payments & Pending Cases (Global overview) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-4">
            <div class="bg-white rounded-2xl shadow p-5 border-l-8 border-l-rose-500">
                <h2 class="text-xl font-bold text-gray-800 mb-3"><i class="fas fa-rupee-sign text-rose-600 mr-2"></i> Pending Payments (All Cities)</h2>
                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-2"><div><span class="font-medium">Karachi - Transfer (ABC-789)</span><br><span class="text-xs">Al-Rehman Transport</span></div><span class="font-bold text-rose-600">₨ 12,500</span></div>
                    <div class="flex justify-between border-b pb-2"><div><span class="font-medium">Quetta - Route Permit (LE-123)</span><br><span class="text-xs">Northern Cargo</span></div><span class="font-bold text-rose-600">₨ 8,200</span></div>
                    <div class="flex justify-between"><div><span class="font-medium">Peshawar - FC (TB-4567)</span><br><span class="text-xs">Jan Traders</span></div><span class="font-bold text-rose-600">₨ 5,750</span></div>
                </div>
                <div class="mt-4 text-right text-sm text-gray-500">Total outstanding: ₨ 26,450</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-5 border-l-8 border-l-amber-500">
                <h2 class="text-xl font-bold text-gray-800 mb-3"><i class="fas fa-folder-open text-amber-600 mr-2"></i> Pending Cases Overview</h2>
                <div class="space-y-2">
                    <div class="flex gap-2"><i class="fas fa-truck-moving text-amber-500 mt-1"></i><div><span class="font-medium">Lahore (Punjab) - File Return</span><br><span class="text-xs">NIC mismatch</span></div></div>
                    <div class="flex gap-2"><i class="fas fa-file-invoice text-amber-500"></i><div><span class="font-medium">Gilgit - Insurance Renewal</span><br><span class="text-xs">Policy expired</span></div></div>
                    <div class="flex gap-2"><i class="fas fa-receipt text-amber-500"></i><div><span class="font-medium">Lasbella - Tax Upto verification</span><br><span class="text-xs">Tax period pending</span></div></div>
                </div>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 mt-8">👉 Click any city card to proceed</div>
    </div>

    <!-- ======================= SCREEN 2: SERVICE SELECTION + PENDING CASES (PER CITY) ======================= -->
    <div id="screen2Service" class="max-w-6xl mx-auto hidden">
        <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
            <button id="backToCitiesBtn" class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full text-gray-700 font-medium flex items-center gap-2 transition"><i class="fas fa-arrow-left"></i> Back to Cities</button>
            <div class="bg-white shadow-md px-5 py-2 rounded-full text-md font-bold text-gray-800"><i class="fas fa-city text-emerald-600 mr-2"></i><span id="selectedCityName">Karachi</span></div>
            <span class="step-indicator step-active"><i class="fas fa-check-circle mr-1"></i> Step 1: City</span>
            <span class="step-indicator">Step 2: Select Service</span>
        </div>

        <!-- Service Selection Cards (Grid) -->
        <div class="form-card p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-5 flex items-center"><i class="fas fa-concierge-bell text-blue-600 mr-2"></i> Which service do you need?</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4" id="servicesGrid">
                <!-- Services: Transfer, Alteration, Route Permit, FC, Insurance, Tax, File Return, Others -->
            </div>
            <p class="text-xs text-gray-400 mt-5"><i class="fas fa-info-circle"></i> Choose a service, then you'll be redirected to the entry form where you can add multiple services.</p>
        </div>

        <!-- Pending cases specific to selected city -->
        <div class="bg-white rounded-2xl shadow-md p-5 mb-8 border-l-8 border-l-amber-400">
            <h2 class="text-lg font-bold text-gray-800 flex items-center"><i class="fas fa-clock text-amber-500 mr-2"></i> Pending Cases — <span id="pendingCityName">Karachi</span></h2>
            <div id="cityPendingCasesList" class="mt-3 space-y-2 text-sm">Loading...</div>
        </div>
    </div>

    <!-- ======================= SCREEN 3: ENTRY FORM (DYNAMIC FIELDS + SERVICES TABLE) ======================= -->
    <div id="screen3Form" class="max-w-7xl mx-auto hidden">
        <div class="flex flex-wrap justify-between items-center mb-5 gap-3">
            <button id="backToServiceScreenBtn" class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full text-gray-700 font-medium flex items-center gap-2"><i class="fas fa-chevron-left"></i> Back to Services</button>
            <div class="bg-white shadow-md px-4 py-2 rounded-full text-sm"><i class="fas fa-map-marker-alt text-emerald-600"></i> City: <strong id="formCityLabel">--</strong> | Service: <strong id="formInitialServiceLabel">Transfer</strong></div>
            <div class="flex gap-2"><span class="step-indicator bg-green-100 text-green-800">Step 1 ✓</span><span class="step-indicator bg-green-100 text-green-800">Step 2 ✓</span><span class="step-indicator step-active">Step 3: Form</span></div>
        </div>

        <!-- Common Fields Section (Dynamic based on primary service type) -->
        <div class="form-card p-5 md:p-7 mb-6">
            <h2 class="text-xl font-bold text-gray-800 border-b pb-3 mb-5 flex items-center"><i class="fas fa-truck text-blue-600 mr-2"></i> Vehicle & Party Details</h2>
            <div id="dynamicCommonFieldsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4"></div>
        </div>

        <!-- Services Table with Add Service and Amounts -->
        <div class="form-card p-5 md:p-7 mb-6">
            <div class="flex justify-between items-center border-b pb-3 mb-4 flex-wrap gap-2">
                <h2 class="text-xl font-bold text-gray-800"><i class="fas fa-list-ul text-indigo-600 mr-2"></i> Services & Charges</h2>
                <button id="addMoreServiceBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm flex items-center gap-1 shadow"><i class="fas fa-plus"></i> Add Another Service</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm" id="finalServicesTable">
                    <thead class="bg-gray-100"><tr><th class="p-3 rounded-l-lg">Service Type</th><th class="p-3">Amount (₨)</th><th class="p-3">Specific Details</th><th class="p-3 rounded-r-lg">Action</th></tr></thead>
                    <tbody id="finalServicesTableBody"></tbody>
                </table>
            </div>
            <div class="text-xs text-gray-400 mt-3"><i class="fas fa-pen-alt"></i> Click "Add/Edit Details" for service-specific fields (Transfer/Alteration/File Return require S/O, NIC etc. Others have details field).</div>
        </div>

        <!-- Totals Section -->
        <div class="form-card p-5 md:p-7 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div><label class="block text-md font-semibold">Total Amount (₨)</label><input type="number" id="finalTotalAmount" readonly class="w-full bg-gray-100 border rounded-xl p-3 font-bold"></div>
                <div><label class="block text-md font-semibold">Received Amount (₨)</label><input type="number" id="finalReceivedAmount" value="0" class="w-full border rounded-xl p-3"></div>
                <div><label class="block text-md font-semibold">Remaining Amount (₨)</label><input type="number" id="finalRemainingAmount" readonly class="w-full bg-gray-100 border rounded-xl p-3 font-bold text-rose-700"></div>
            </div>
            <div class="mt-5 flex justify-end"><button id="finalSaveRecordBtn" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold shadow transition"><i class="fas fa-save mr-2"></i> Save Record</button></div>
        </div>
    </div>

    <!-- MODAL for Service Specific Details (same for all rows) -->
    <div id="serviceDetailsModal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden transition-all">
        <div class="bg-white rounded-2xl w-11/12 max-w-2xl max-h-[85vh] overflow-y-auto p-6 shadow-2xl">
            <div class="flex justify-between items-center border-b pb-3 mb-4"><h3 class="text-xl font-bold" id="modalDetailTitle">Service Information</h3><button id="closeModalBtn" class="text-gray-500 text-2xl">&times;</button></div>
            <div id="modalSpecificFields" class="space-y-4"></div>
            <div class="mt-6 flex justify-end gap-3"><button id="cancelModalBtn" class="px-5 py-2 border rounded-xl">Cancel</button><button id="saveModalDetailsBtn" class="px-6 py-2 bg-blue-600 text-white rounded-xl">Save Details</button></div>
        </div>
    </div>

    <script>
        // ---------- Global App State ----------
        let currentCity = '';
        let primarySelectedService = 'Transfer';   // service chosen from screen2
        let currentServicesRows = [];               // { serviceType, amount, specificsData }
        let editRowIndex = null;

        // City-specific pending cases data
        const pendingCasesDb = {
            Karachi: [{ title: "Transfer pending documents", desc: "NIC verification needed" }, { title: "Tax upto 30-June", desc: "Payment due" }],
            Lasbella: [{ title: "Route Permit renewal", desc: "Expiring next week" }],
            Quetta: [{ title: "FC certificate expired", desc: "Re-inspection required" }],
            Peshawar: [{ title: "Insurance claim followup", desc: "Remarks pending" }],
            Gilgit: [{ title: "File Return missing", desc: "Submit within 3 days" }],
            Punjab: [{ title: "Alteration request", desc: "Approval awaited" }],
            Other: [{ title: "General pending", desc: "Contact support" }]
        };

        // Helper: update total amount
        function updateFinalTotals() {
            let total = currentServicesRows.reduce((sum, r) => sum + (parseFloat(r.amount) || 0), 0);
            document.getElementById('finalTotalAmount').value = total.toFixed(2);
            let received = parseFloat(document.getElementById('finalReceivedAmount').value) || 0;
            document.getElementById('finalRemainingAmount').value = (total - received).toFixed(2);
        }

        // Render services table on screen3
        function renderFinalServicesTable() {
            const tbody = document.getElementById('finalServicesTableBody');
            if (!tbody) return;
            tbody.innerHTML = '';
            currentServicesRows.forEach((row, idx) => {
                const tr = document.createElement('tr');
                tr.className = 'border-b hover:bg-gray-50';
                // Service Type (select dropdown)
                const tdType = document.createElement('td'); tdType.className = 'p-2';
                const select = document.createElement('select');
                select.className = 'border rounded-lg p-2 text-sm w-full bg-white';
                const allServices = ['Transfer','Alteration','Route Permit','FC','Insurance','Tax','File Return','Others'];
                allServices.forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt;
                    option.innerText = opt;
                    if (row.serviceType === opt) option.selected = true;
                    select.appendChild(option);
                });
                select.addEventListener('change', (e) => {
                    currentServicesRows[idx].serviceType = e.target.value;
                    currentServicesRows[idx].specificsData = null;
                    renderFinalServicesTable();
                    updateFinalTotals();
                });
                tdType.appendChild(select);
                // Amount
                const tdAmount = document.createElement('td'); tdAmount.className = 'p-2';
                const amountInput = document.createElement('input'); amountInput.type = 'number'; amountInput.value = row.amount || 0; amountInput.className = 'w-24 border rounded-lg p-2 text-right';
                amountInput.addEventListener('input', (e) => { currentServicesRows[idx].amount = parseFloat(e.target.value) || 0; updateFinalTotals(); });
                tdAmount.appendChild(amountInput);
                // Specific details button
                const tdSpec = document.createElement('td'); tdSpec.className = 'p-2';
                const hasSpec = row.specificsData && Object.keys(row.specificsData).length > 0;
                const specBtn = document.createElement('button');
                specBtn.innerText = hasSpec ? '✓ Edit Details' : '✎ Add Details';
                specBtn.className = `text-xs px-3 py-1 rounded-full ${hasSpec ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600'} hover:bg-blue-100`;
                specBtn.addEventListener('click', () => { editRowIndex = idx; openSpecificDetailsModal(idx); });
                tdSpec.appendChild(specBtn);
                // Delete action
                const tdAction = document.createElement('td'); tdAction.className = 'p-2';
                const delBtn = document.createElement('button'); delBtn.innerHTML = '<i class="fas fa-trash-alt text-red-500"></i>'; delBtn.className = 'p-2 hover:bg-red-50 rounded-full';
                delBtn.addEventListener('click', () => {
                    if (currentServicesRows.length === 1) { alert("At least one service is required."); return; }
                    currentServicesRows.splice(idx, 1);
                    renderFinalServicesTable();
                    updateFinalTotals();
                });
                tdAction.appendChild(delBtn);
                tr.appendChild(tdType); tr.appendChild(tdAmount); tr.appendChild(tdSpec); tr.appendChild(tdAction);
                tbody.appendChild(tr);
            });
            updateFinalTotals();
        }

        // Dynamic common fields based on primary selected service (for Route Permit, FC, Insurance, Tax, Others -> only 4 fields)
        function updateCommonFields(serviceType) {
            const container = document.getElementById('dynamicCommonFieldsContainer');
            if (!container) return;
            const isFull = ['Transfer', 'Alteration', 'File Return'].includes(serviceType);
            if (isFull) {
                container.innerHTML = `
                    <div><label class="block text-sm font-medium required-dot">Vehicle No</label><input type="text" id="comm_vehicleNo" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Vehicle Make</label><input type="text" id="comm_vehicleMake" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Vehicle Model</label><input type="text" id="comm_vehicleModel" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Engine No</label><input type="text" id="comm_engineNo" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Chassis No</label><input type="text" id="comm_chassisNo" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Party Name</label><input type="text" id="comm_partyName" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Party Mobile No</label><input type="tel" id="comm_partyMobile" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Date</label><input type="date" id="comm_date" class="w-full border rounded-xl p-2"></div>
                `;
            } else {
                container.innerHTML = `
                    <div><label class="block text-sm font-medium required-dot">Vehicle No</label><input type="text" id="comm_vehicleNo" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Party Name</label><input type="text" id="comm_partyName" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Party Mobile No</label><input type="tel" id="comm_partyMobile" class="w-full border rounded-xl p-2"></div>
                    <div><label class="block text-sm font-medium required-dot">Date</label><input type="date" id="comm_date" class="w-full border rounded-xl p-2"></div>
                `;
            }
            const todayDate = new Date().toISOString().split('T')[0];
            const dateField = document.getElementById('comm_date');
            if (dateField && !dateField.value) dateField.value = todayDate;
        }

        // Modal for service-specific details (Transfer/Alteration/File Return require from/to, NIC; Route permit details; FC; Tax; Insurance; Others)
        function openSpecificDetailsModal(rowIndex) {
            const row = currentServicesRows[rowIndex];
            const service = row.serviceType;
            const existing = row.specificsData || {};
            const container = document.getElementById('modalSpecificFields');
            container.innerHTML = '';
            document.getElementById('modalDetailTitle').innerHTML = `<i class="fas fa-edit"></i> ${service} Details`;
            if (service === 'Transfer' || service === 'Alteration' || service === 'File Return') {
                container.innerHTML = `<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label>From Name</label><input id="spec_fromName" class="w-full border p-2 rounded" value="${existing.fromName || ''}"></div>
                    <div><label>From S/O</label><input id="spec_fromSo" class="w-full border p-2 rounded" value="${existing.fromSo || ''}"></div>
                    <div><label>From NIC No</label><input id="spec_fromNic" class="w-full border p-2 rounded" value="${existing.fromNic || ''}"></div>
                    <div><label>To Name</label><input id="spec_toName" class="w-full border p-2 rounded" value="${existing.toName || ''}"></div>
                    <div><label>To S/O</label><input id="spec_toSo" class="w-full border p-2 rounded" value="${existing.toSo || ''}"></div>
                    <div><label>To NIC No</label><input id="spec_toNic" class="w-full border p-2 rounded" value="${existing.toNic || ''}"></div>
                </div>`;
            } else if (service === 'Route Permit') {
                container.innerHTML = `<div><label>Details (Route / Stops)</label><textarea rows="2" id="spec_details" class="w-full border rounded p-2">${existing.details || ''}</textarea></div>
                <div><label>RTA/PTA</label><input id="spec_rtaPta" class="w-full border p-2 rounded" value="${existing.rtaPta || ''}"></div>`;
            } else if (service === 'FC') {
                container.innerHTML = `<div><label>Truck Trailer/Truck</label><select id="spec_truckType" class="w-full border p-2 rounded"><option ${existing.truckType === 'Truck' ? 'selected' : ''}>Truck</option><option ${existing.truckType === 'Trailer' ? 'selected' : ''}>Trailer</option></select></div>
                <div><label>Details (FC remarks)</label><textarea id="spec_fcDetails" rows="2" class="w-full border p-2 rounded">${existing.fcDetails || ''}</textarea></div>`;
            } else if (service === 'Insurance') {
                container.innerHTML = `<div><label>Remarks</label><textarea rows="3" id="spec_remarks" class="w-full border p-2 rounded">${existing.remarks || ''}</textarea></div>`;
            } else if (service === 'Tax') {
                container.innerHTML = `<div><label>Upto (Date/Period)</label><input id="spec_upto" class="w-full border p-2 rounded" value="${existing.upto || ''}" placeholder="e.g., 31-Dec-2025"></div>`;
            } else if (service === 'Others') {
                container.innerHTML = `<div><label>Details (Other Information)</label><textarea rows="3" id="spec_otherDetails" class="w-full border p-2 rounded" placeholder="Enter any extra details">${existing.otherDetails || ''}</textarea></div>`;
            }
            document.getElementById('serviceDetailsModal').classList.remove('hidden');
            const saveHandler = () => {
                let newSpec = {};
                if (service === 'Transfer' || service === 'Alteration' || service === 'File Return') {
                    newSpec = { fromName: document.getElementById('spec_fromName')?.value, fromSo: document.getElementById('spec_fromSo')?.value, fromNic: document.getElementById('spec_fromNic')?.value, toName: document.getElementById('spec_toName')?.value, toSo: document.getElementById('spec_toSo')?.value, toNic: document.getElementById('spec_toNic')?.value };
                } else if (service === 'Route Permit') {
                    newSpec = { details: document.getElementById('spec_details')?.value, rtaPta: document.getElementById('spec_rtaPta')?.value };
                } else if (service === 'FC') {
                    newSpec = { truckType: document.getElementById('spec_truckType')?.value, fcDetails: document.getElementById('spec_fcDetails')?.value };
                } else if (service === 'Insurance') {
                    newSpec = { remarks: document.getElementById('spec_remarks')?.value };
                } else if (service === 'Tax') {
                    newSpec = { upto: document.getElementById('spec_upto')?.value };
                } else if (service === 'Others') {
                    newSpec = { otherDetails: document.getElementById('spec_otherDetails')?.value };
                }
                currentServicesRows[editRowIndex].specificsData = newSpec;
                renderFinalServicesTable();
                document.getElementById('serviceDetailsModal').classList.add('hidden');
                cleanup();
            };
            const cleanup = () => { document.getElementById('saveModalDetailsBtn').removeEventListener('click', saveHandler); };
            document.getElementById('saveModalDetailsBtn').addEventListener('click', saveHandler);
            document.getElementById('closeModalBtn').onclick = () => { document.getElementById('serviceDetailsModal').classList.add('hidden'); cleanup(); };
            document.getElementById('cancelModalBtn').onclick = () => { document.getElementById('serviceDetailsModal').classList.add('hidden'); cleanup(); };
        }

        // Add service row
        function addServiceRow(serviceType = 'Transfer') {
            currentServicesRows.push({ serviceType: serviceType, amount: 0, specificsData: null });
            renderFinalServicesTable();
        }

        // load pending cases for city (screen2)
        function loadPendingForCity(city) {
            const cases = pendingCasesDb[city] || [{ title: "No pending cases", desc: "All clear" }];
            const container = document.getElementById('cityPendingCasesList');
            container.innerHTML = cases.map(c => `<div class="flex items-start gap-2 border-b pb-2"><i class="fas fa-exclamation-circle text-amber-500 mt-1"></i><div><span class="font-medium">${c.title}</span><br><span class="text-xs text-gray-500">${c.desc}</span></div></div>`).join('');
            document.getElementById('pendingCityName').innerText = city;
        }

        // Screen 2 initialization -> show service cards
        function showScreen2(city) {
            currentCity = city;
            document.getElementById('selectedCityName').innerText = city;
            loadPendingForCity(city);
            const servicesGrid = document.getElementById('servicesGrid');
            const allServ = ['Transfer','Alteration','Route Permit','FC','Insurance','Tax','File Return','Others'];
            servicesGrid.innerHTML = '';
            allServ.forEach(serv => {
                const card = document.createElement('div');
                card.className = 'service-card bg-white border border-gray-200 p-4 rounded-xl shadow-sm text-center hover:shadow-md';
                let icon = 'fa-file-signature';
                if (serv === 'Transfer') icon = 'fa-exchange-alt';
                else if (serv === 'Route Permit') icon = 'fa-road';
                else if (serv === 'FC') icon = 'fa-truck';
                else if (serv === 'Insurance') icon = 'fa-shield-alt';
                else if (serv === 'Tax') icon = 'fa-money-bill-wave';
                else if (serv === 'File Return') icon = 'fa-folder-open';
                else if (serv === 'Others') icon = 'fa-ellipsis-h';
                card.innerHTML = `<i class="fas ${icon} text-3xl text-blue-600 mb-2"></i><h3 class="font-bold">${serv}</h3><p class="text-xs text-gray-500 mt-1">Click to proceed</p>`;
                card.addEventListener('click', () => {
                    primarySelectedService = serv;
                    // move to screen3, initializing rows with that service
                    currentServicesRows = [];
                    addServiceRow(primarySelectedService);
                    updateCommonFields(primarySelectedService);
                    document.getElementById('formCityLabel').innerText = currentCity;
                    document.getElementById('formInitialServiceLabel').innerText = primarySelectedService;
                    document.getElementById('finalReceivedAmount').value = '0';
                    updateFinalTotals();
                    document.getElementById('screen2Service').classList.add('hidden');
                    document.getElementById('screen3Form').classList.remove('hidden');
                });
                servicesGrid.appendChild(card);
            });
            document.getElementById('screen1Dashboard').classList.add('hidden');
            document.getElementById('screen2Service').classList.remove('hidden');
        }

        // Event listeners
        document.querySelectorAll('.city-card').forEach(card => {
            card.addEventListener('click', () => {
                const city = card.getAttribute('data-city');
                showScreen2(city);
            });
        });
        document.getElementById('backToCitiesBtn').addEventListener('click', () => {
            document.getElementById('screen2Service').classList.add('hidden');
            document.getElementById('screen1Dashboard').classList.remove('hidden');
        });
        document.getElementById('backToServiceScreenBtn').addEventListener('click', () => {
            document.getElementById('screen3Form').classList.add('hidden');
            showScreen2(currentCity); // reinit screen2 with current city
        });
        document.getElementById('addMoreServiceBtn').addEventListener('click', () => {
            addServiceRow(primarySelectedService);
        });
        document.getElementById('finalReceivedAmount').addEventListener('input', updateFinalTotals);
        document.getElementById('finalSaveRecordBtn').addEventListener('click', () => {
            const vehicleNo = document.getElementById('comm_vehicleNo')?.value;
            if (!vehicleNo) { alert("Please fill Vehicle Number (required)"); return; }
            const partyName = document.getElementById('comm_partyName')?.value || '';
            const servicesSummary = currentServicesRows.map(s => `${s.serviceType} (₨${s.amount})`).join(', ');
            alert(`✅ Record Saved for ${currentCity}\nVehicle: ${vehicleNo}\nParty: ${partyName}\nServices: ${servicesSummary}\nTotal: ₨${document.getElementById('finalTotalAmount').value}\nReceived: ₨${document.getElementById('finalReceivedAmount').value}\nRemaining: ₨${document.getElementById('finalRemainingAmount').value}`);
        });
        // close modal click outside
        window.onclick = (e) => { if (e.target === document.getElementById('serviceDetailsModal')) document.getElementById('serviceDetailsModal').classList.add('hidden'); };
    </script>
</body>
</html>
