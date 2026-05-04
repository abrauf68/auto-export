<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BA Transport | Dynamic Service Details Sections</title>
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
        .service-details-section { background: #fefce8; border-left: 4px solid #eab308; transition: all 0.2s; }
        .service-details-section h3 { font-size: 1rem; font-weight: 700; color: #854d0e; }
        .required-dot:after { content: "*"; color: #e11d48; margin-left: 3px; }
    </style>
</head>
<body class="p-4 md:p-6">

    <!-- ======================= SCREEN 1: DASHBOARD WITH CITIES + FILTERABLE PENDING SECTION ======================= -->
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
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-700 mb-4 flex items-center"><i class="fas fa-map-marker-alt text-amber-600 mr-2"></i> Select a City to Start</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-5">
                <div data-city="Karachi" class="city-card bg-gradient-to-br from-emerald-50 to-green-50 p-5 rounded-xl shadow text-center border border-emerald-200"><i class="fas fa-city text-3xl text-emerald-700 mb-2"></i><h3 class="font-bold text-gray-800">Karachi</h3></div>
                <div data-city="Lasbella" class="city-card bg-gradient-to-br from-sky-50 to-blue-50 p-5 rounded-xl shadow text-center border border-sky-200"><i class="fas fa-map-pin text-3xl text-sky-700 mb-2"></i><h3 class="font-bold text-gray-800">Lasbella</h3></div>
                <div data-city="Quetta" class="city-card bg-gradient-to-br from-amber-50 to-orange-50 p-5 rounded-xl shadow text-center border border-amber-200"><i class="fas fa-mountain text-3xl text-amber-700 mb-2"></i><h3 class="font-bold text-gray-800">Quetta</h3></div>
                <div data-city="Peshawar" class="city-card bg-gradient-to-br from-indigo-50 to-purple-50 p-5 rounded-xl shadow text-center border border-indigo-200"><i class="fas fa-landmark text-3xl text-indigo-700 mb-2"></i><h3 class="font-bold text-gray-800">Peshawar</h3></div>
                <div data-city="Gilgit" class="city-card bg-gradient-to-br from-cyan-50 to-teal-50 p-5 rounded-xl shadow text-center border border-cyan-200"><i class="fas fa-mountain text-3xl text-cyan-700 mb-2"></i><h3 class="font-bold text-gray-800">Gilgit</h3></div>
                <div data-city="Punjab" class="city-card bg-gradient-to-br from-lime-50 to-green-50 p-5 rounded-xl shadow text-center border border-lime-200"><i class="fas fa-seedling text-3xl text-lime-700 mb-2"></i><h3 class="font-bold text-gray-800">Punjab</h3></div>
                <div data-city="Other" class="city-card bg-gradient-to-br from-gray-50 to-stone-50 p-5 rounded-xl shadow text-center border border-gray-300"><i class="fas fa-globe text-3xl text-gray-600 mb-2"></i><h3 class="font-bold text-gray-800">Other</h3></div>
            </div>
        </div>

        <!-- Filterable Pending Payments & Cases Section -->
        <div class="bg-white rounded-2xl shadow-md p-5 mb-6">
            <div class="flex flex-wrap justify-between items-center mb-4 gap-3">
                <h2 class="text-xl font-bold text-gray-800"><i class="fas fa-filter text-indigo-500 mr-2"></i> Pending Items (Filter)</h2>
                <div class="flex flex-wrap gap-3">
                    <select id="filterCity" class="border rounded-xl px-4 py-2 text-sm bg-gray-50">
                        <option value="all">All Cities</option>
                        <option value="Karachi">Karachi</option><option value="Lasbella">Lasbella</option><option value="Quetta">Quetta</option>
                        <option value="Peshawar">Peshawar</option><option value="Gilgit">Gilgit</option><option value="Punjab">Punjab</option><option value="Other">Other</option>
                    </select>
                    <select id="filterService" class="border rounded-xl px-4 py-2 text-sm bg-gray-50">
                        <option value="all">All Services</option>
                        <option value="Transfer">Transfer</option><option value="Alteration">Alteration</option><option value="Route Permit">Route Permit</option>
                        <option value="FC">FC</option><option value="Insurance">Insurance</option><option value="Tax">Tax</option>
                        <option value="File Return">File Return</option><option value="Others">Others</option>
                    </select>
                    <button id="applyFilterBtn" class="bg-blue-600 text-white px-5 py-2 rounded-xl text-sm"><i class="fas fa-search mr-1"></i> Apply</button>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div><h3 class="font-semibold text-rose-600 mb-2"><i class="fas fa-rupee-sign"></i> Pending Payments</h3><div id="filteredPaymentsList" class="space-y-2 max-h-64 overflow-y-auto"></div></div>
                <div><h3 class="font-semibold text-amber-600 mb-2"><i class="fas fa-folder-open"></i> Pending Cases</h3><div id="filteredCasesList" class="space-y-2 max-h-64 overflow-y-auto"></div></div>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 mt-4">👉 Click any city card to proceed</div>
    </div>

    <!-- ======================= SCREEN 2: SERVICE SELECTION + PENDING CASES (PER CITY) ======================= -->
    <div id="screen2Service" class="max-w-6xl mx-auto hidden">
        <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
            <button id="backToCitiesBtn" class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full font-medium flex items-center gap-2"><i class="fas fa-arrow-left"></i> Back to Cities</button>
            <div class="bg-white shadow-md px-5 py-2 rounded-full font-bold"><i class="fas fa-city text-emerald-600 mr-2"></i><span id="selectedCityName">Karachi</span></div>
            <span class="step-indicator step-active">Step 1: City</span><span class="step-indicator">Step 2: Service</span>
        </div>
        <div class="form-card p-6">
            <h2 class="text-xl font-bold mb-5"><i class="fas fa-concierge-bell text-blue-600 mr-2"></i> Which service do you need?</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4" id="servicesGrid"></div>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-5 mb-8 border-l-8 border-l-amber-400 mt-5">
            <h2 class="text-lg font-bold flex items-center"><i class="fas fa-clock text-amber-500 mr-2"></i> Pending Cases — <span id="pendingCityName">Karachi</span></h2>
            <div id="cityPendingCasesList" class="mt-3 space-y-2 text-sm">Loading...</div>
        </div>
    </div>

    <!-- ======================= SCREEN 3: ENTRY FORM WITH INLINE DETAILS SECTIONS ======================= -->
    <div id="screen3Form" class="max-w-7xl mx-auto hidden">
        <div class="flex flex-wrap justify-between items-center mb-5 gap-3">
            <button id="backToServiceScreenBtn" class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full font-medium flex items-center gap-2"><i class="fas fa-chevron-left"></i> Back to Services</button>
            <div class="bg-white shadow-md px-4 py-2 rounded-full text-sm"><i class="fas fa-map-marker-alt text-emerald-600"></i> City: <strong id="formCityLabel">--</strong></div>
            <div class="flex gap-2"><span class="step-indicator bg-green-100 text-green-800">✓ City</span><span class="step-indicator bg-green-100 text-green-800">✓ Service</span><span class="step-indicator step-active">Form</span></div>
        </div>

        <!-- Vehicle & Party Details Section -->
        <div class="form-card p-5 md:p-7 mb-6">
            <h2 class="text-xl font-bold text-gray-800 border-b pb-3 mb-5"><i class="fas fa-truck text-blue-600 mr-2"></i> Vehicle & Party Details</h2>
            <div id="dynamicCommonFieldsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4"></div>
        </div>

        <!-- DYNAMIC INLINE DETAILS SECTIONS (one per selected service) -->
        <div id="dynamicDetailsContainer" class="space-y-4 mb-6"></div>

        <!-- Services & Charges Table -->
        <div class="form-card p-5 md:p-7 mb-5">
            <div class="flex justify-between items-center border-b pb-3 mb-4 flex-wrap gap-2">
                <h2 class="text-xl font-bold text-gray-800"><i class="fas fa-list-ul text-indigo-600 mr-2"></i> Services & Charges</h2>
                <button id="addMoreServiceBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm flex items-center gap-1 shadow"><i class="fas fa-plus"></i> Add Another Service</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm" id="finalServicesTable">
                    <thead class="bg-gray-100"><tr><th class="p-3 rounded-l-lg">Service Type</th><th class="p-3">Amount (₨)</th><th class="p-3 rounded-r-lg">Action</th></tr></thead>
                    <tbody id="finalServicesTableBody"></tbody>
                </table>
            </div>
            <p class="text-xs text-gray-400 mt-3"><i class="fas fa-info-circle"></i> When you select a service, its details section will appear below automatically.</p>
        </div>

        <!-- Totals Section -->
        <div class="form-card p-5 md:p-7 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div><label class="block font-semibold">Total Amount (₨)</label><input type="number" id="finalTotalAmount" readonly class="w-full bg-gray-100 border rounded-xl p-3 font-bold"></div>
                <div><label class="block font-semibold">Received Amount (₨)</label><input type="number" id="finalReceivedAmount" value="0" class="w-full border rounded-xl p-3"></div>
                <div><label class="block font-semibold">Remaining Amount (₨)</label><input type="number" id="finalRemainingAmount" readonly class="w-full bg-gray-100 border rounded-xl p-3 font-bold text-rose-700"></div>
            </div>
            <div class="mt-5 flex justify-end"><button id="finalSaveRecordBtn" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold shadow"><i class="fas fa-save mr-2"></i> Save Record</button></div>
        </div>
    </div>

    <script>
        // ---------- MOCK DATABASE FOR FILTERS ----------
        const pendingPaymentsDB = [
            { city: "Karachi", service: "Transfer", party: "Al-Rehman", vehicle: "ABC-789", amount: 12500 },
            { city: "Quetta", service: "Route Permit", party: "Northern Cargo", vehicle: "LE-123", amount: 8200 },
            { city: "Peshawar", service: "FC", party: "Jan Traders", vehicle: "TB-4567", amount: 5750 },
            { city: "Punjab", service: "Tax", party: "Zahid Ent.", vehicle: "LEB-909", amount: 3500 },
            { city: "Gilgit", service: "Insurance", party: "Northern Travels", vehicle: "GIL-111", amount: 6200 },
            { city: "Karachi", service: "Alteration", party: "Fazal Cargo", vehicle: "KHI-222", amount: 4300 }
        ];
        const pendingCasesDB = [
            { city: "Karachi", service: "File Return", title: "NIC mismatch", desc: "Documents pending" },
            { city: "Punjab", service: "File Return", title: "Tax period overdue", desc: "Submit within 3 days" },
            { city: "Gilgit", service: "Insurance", title: "Policy expired", desc: "Renewal required" },
            { city: "Lasbella", service: "Route Permit", title: "Permit renewal", desc: "RTA approval" },
            { city: "Quetta", service: "FC", title: "Fitness expired", desc: "Reinspection needed" }
        ];
        function normalizeCity(c) { return (c === "Lahore") ? "Punjab" : c; }
        function renderFilteredItems() {
            let city = document.getElementById('filterCity').value;
            let serv = document.getElementById('filterService').value;
            let payments = pendingPaymentsDB.filter(p => (city === 'all' || normalizeCity(p.city) === city) && (serv === 'all' || p.service === serv));
            let cases = pendingCasesDB.filter(c => (city === 'all' || normalizeCity(c.city) === city) && (serv === 'all' || c.service === serv));
            document.getElementById('filteredPaymentsList').innerHTML = payments.length ? payments.map(p => `<div class="bg-rose-50 p-3 rounded-lg flex justify-between"><div><span class="font-medium">${p.city} - ${p.service}</span><br><span class="text-xs">${p.party} (${p.vehicle})</span></div><span class="font-bold text-rose-600">₨ ${p.amount}</span></div>`).join('') : '<div class="text-center text-gray-400 p-3">No payments</div>';
            document.getElementById('filteredCasesList').innerHTML = cases.length ? cases.map(c => `<div class="bg-amber-50 p-3 rounded-lg"><div class="flex gap-2"><i class="fas fa-folder-open text-amber-500"></i><div><span class="font-medium">${c.city} - ${c.service}</span><br><span class="text-xs">${c.title} - ${c.desc}</span></div></div></div>`).join('') : '<div class="text-center text-gray-400 p-3">No cases</div>';
        }

        // ---------- GLOBAL STATE (Screen3) ----------
        let currentCity = '';
        let currentServicesRows = [];  // each { id, serviceType, amount, detailsData }
        let nextId = 1;

        // Helper: generate details HTML based on service type (inline, no modal)
        function generateDetailsHTML(serviceType, existingData = {}) {
            if (serviceType === 'Transfer' || serviceType === 'Alteration' || serviceType === 'File Return') {
                return `
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div><label class="block text-sm font-semibold">From Name</label><input type="text" class="detail-fromName w-full border rounded-lg p-2" value="${existingData.fromName || ''}"></div>
                        <div><label class="block text-sm font-semibold">From S/O</label><input type="text" class="detail-fromSo w-full border rounded-lg p-2" value="${existingData.fromSo || ''}"></div>
                        <div><label class="block text-sm font-semibold">From NIC No</label><input type="text" class="detail-fromNic w-full border rounded-lg p-2" value="${existingData.fromNic || ''}"></div>
                        <div><label class="block text-sm font-semibold">To Name</label><input type="text" class="detail-toName w-full border rounded-lg p-2" value="${existingData.toName || ''}"></div>
                        <div><label class="block text-sm font-semibold">To S/O</label><input type="text" class="detail-toSo w-full border rounded-lg p-2" value="${existingData.toSo || ''}"></div>
                        <div><label class="block text-sm font-semibold">To NIC No</label><input type="text" class="detail-toNic w-full border rounded-lg p-2" value="${existingData.toNic || ''}"></div>
                    </div>
                `;
            } else if (serviceType === 'Route Permit') {
                return `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2"><label class="block text-sm font-semibold">Details (Route / Stops)</label><textarea class="detail-details w-full border rounded-lg p-2" rows="2">${existingData.details || ''}</textarea></div>
                        <div><label class="block text-sm font-semibold">RTA/PTA</label><input type="text" class="detail-rtaPta w-full border rounded-lg p-2" value="${existingData.rtaPta || ''}"></div>
                    </div>
                `;
            } else if (serviceType === 'FC') {
                return `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-semibold">Truck Trailer/Truck</label><select class="detail-truckType w-full border rounded-lg p-2"><option ${existingData.truckType === 'Truck' ? 'selected' : ''}>Truck</option><option ${existingData.truckType === 'Trailer' ? 'selected' : ''}>Trailer</option></select></div>
                        <div class="col-span-2"><label class="block text-sm font-semibold">Details (FC remarks)</label><textarea class="detail-fcDetails w-full border rounded-lg p-2" rows="2">${existingData.fcDetails || ''}</textarea></div>
                    </div>
                `;
            } else if (serviceType === 'Insurance') {
                return `<div><label class="block text-sm font-semibold">Remarks</label><textarea class="detail-remarks w-full border rounded-lg p-2" rows="3">${existingData.remarks || ''}</textarea></div>`;
            } else if (serviceType === 'Tax') {
                return `<div><label class="block text-sm font-semibold">From (Date/Period)</label><input type="text" class="detail-from w-full border rounded-lg p-2" placeholder="e.g., 01-Jan-2024" value="${existingData.from || ''}"></div>
                        <div><label class="block text-sm font-semibold">Upto (Date/Period)</label><input type="text" class="detail-upto w-full border rounded-lg p-2" placeholder="e.g., 31-Dec-2025" value="${existingData.upto || ''}"></div>`;
            } else if (serviceType === 'Others') {
                return `<div><label class="block text-sm font-semibold">Details (Other Information)</label><textarea class="detail-otherDetails w-full border rounded-lg p-2" rows="3" placeholder="Enter extra details">${existingData.otherDetails || ''}</textarea></div>`;
            }
            return `<div class="text-gray-500 text-sm">No additional fields required.</div>`;
        }

        // Render all inline details sections (one per service row)
        function renderAllDetailsSections() {
            const container = document.getElementById('dynamicDetailsContainer');
            if (!container) return;
            container.innerHTML = '';
            currentServicesRows.forEach((row, idx) => {
                const sectionDiv = document.createElement('div');
                sectionDiv.className = 'service-details-section bg-yellow-50 p-5 rounded-xl shadow-sm border border-yellow-200';
                sectionDiv.id = `details-section-${row.id}`;
                sectionDiv.innerHTML = `
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-base font-bold text-amber-800"><i class="fas fa-file-alt mr-2"></i> ${row.serviceType} — Details</h3>
                        <button class="remove-details-btn text-gray-400 hover:text-red-500 text-sm" data-id="${row.id}"><i class="fas fa-trash-alt"></i> Remove</button>
                    </div>
                    <div class="details-fields-wrapper" data-service-type="${row.serviceType}" data-row-idx="${idx}">
                        ${generateDetailsHTML(row.serviceType, row.detailsData || {})}
                    </div>
                `;
                container.appendChild(sectionDiv);
            });
            // attach remove button events
            document.querySelectorAll('.remove-details-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(btn.getAttribute('data-id'));
                    removeServiceRowById(id);
                });
            });
            // attach real-time saving of details to rows (on input)
            attachDetailsInputEvents();
        }

        function attachDetailsInputEvents() {
            // For each service row, capture inputs and update row.detailsData
            currentServicesRows.forEach((row, idx) => {
                const section = document.getElementById(`details-section-${row.id}`);
                if (!section) return;
                const fieldsDiv = section.querySelector('.details-fields-wrapper');
                if (!fieldsDiv) return;
                const service = row.serviceType;
                const inputs = fieldsDiv.querySelectorAll('input, textarea, select');
                inputs.forEach(input => {
                    input.removeEventListener('input', (e) => saveDetailsFromSection(row.id));
                    input.addEventListener('input', () => saveDetailsFromSection(row.id));
                });
                // also handle select changes
                const selects = fieldsDiv.querySelectorAll('select');
                selects.forEach(sel => {
                    sel.removeEventListener('change', () => saveDetailsFromSection(row.id));
                    sel.addEventListener('change', () => saveDetailsFromSection(row.id));
                });
            });
        }

        function saveDetailsFromSection(rowId) {
            const row = currentServicesRows.find(r => r.id === rowId);
            if (!row) return;
            const section = document.getElementById(`details-section-${rowId}`);
            if (!section) return;
            const fieldsDiv = section.querySelector('.details-fields-wrapper');
            const service = row.serviceType;
            let newDetails = {};
            if (service === 'Transfer' || service === 'Alteration' || service === 'File Return') {
                newDetails = {
                    fromName: fieldsDiv.querySelector('.detail-fromName')?.value || '',
                    fromSo: fieldsDiv.querySelector('.detail-fromSo')?.value || '',
                    fromNic: fieldsDiv.querySelector('.detail-fromNic')?.value || '',
                    toName: fieldsDiv.querySelector('.detail-toName')?.value || '',
                    toSo: fieldsDiv.querySelector('.detail-toSo')?.value || '',
                    toNic: fieldsDiv.querySelector('.detail-toNic')?.value || ''
                };
            } else if (service === 'Route Permit') {
                newDetails = {
                    details: fieldsDiv.querySelector('.detail-details')?.value || '',
                    rtaPta: fieldsDiv.querySelector('.detail-rtaPta')?.value || ''
                };
            } else if (service === 'FC') {
                newDetails = {
                    truckType: fieldsDiv.querySelector('.detail-truckType')?.value || 'Truck',
                    fcDetails: fieldsDiv.querySelector('.detail-fcDetails')?.value || ''
                };
            } else if (service === 'Insurance') {
                newDetails = { remarks: fieldsDiv.querySelector('.detail-remarks')?.value || '' };
            } else if (service === 'Tax') {
                newDetails = { upto: fieldsDiv.querySelector('.detail-upto')?.value || '' };
            } else if (service === 'Others') {
                newDetails = { otherDetails: fieldsDiv.querySelector('.detail-otherDetails')?.value || '' };
            }
            row.detailsData = newDetails;
        }

        function removeServiceRowById(id) {
            if (currentServicesRows.length === 1) { alert("At least one service is required."); return; }
            const index = currentServicesRows.findIndex(r => r.id === id);
            if (index !== -1) currentServicesRows.splice(index, 1);
            renderFinalServicesTable();
            renderAllDetailsSections();
            updateFinalTotals();
        }

        // Render table (without details button)
        function renderFinalServicesTable() {
            const tbody = document.getElementById('finalServicesTableBody');
            if (!tbody) return;
            tbody.innerHTML = '';
            currentServicesRows.forEach((row, idx) => {
                const tr = document.createElement('tr');
                tr.className = 'border-b hover:bg-gray-50';
                // Service dropdown
                const tdType = document.createElement('td'); tdType.className = 'p-2';
                const select = document.createElement('select');
                select.className = 'border rounded-lg p-2 text-sm w-full';
                const allSvcs = ['Transfer','Alteration','Route Permit','FC','Insurance','Tax','File Return','Others'];
                allSvcs.forEach(opt => { const option = document.createElement('option'); option.value = opt; option.innerText = opt; if(row.serviceType === opt) option.selected = true; select.appendChild(option); });
                select.addEventListener('change', (e) => {
                    const oldService = row.serviceType;
                    const newService = e.target.value;
                    row.serviceType = newService;
                    // reset details data if service changes
                    row.detailsData = {};
                    renderFinalServicesTable();
                    renderAllDetailsSections();  // details section will refresh with new fields
                    updateFinalTotals();
                });
                tdType.appendChild(select);
                // Amount input
                const tdAmount = document.createElement('td'); tdAmount.className = 'p-2';
                const amountInput = document.createElement('input'); amountInput.type = 'number'; amountInput.value = row.amount || 0; amountInput.className = 'w-28 border rounded-lg p-2 text-right';
                amountInput.addEventListener('input', (e) => { row.amount = parseFloat(e.target.value) || 0; updateFinalTotals(); });
                tdAmount.appendChild(amountInput);
                // Delete row button
                const tdAction = document.createElement('td'); tdAction.className = 'p-2';
                const delBtn = document.createElement('button'); delBtn.innerHTML = '<i class="fas fa-trash-alt text-red-500"></i> Remove'; delBtn.className = 'text-xs bg-red-50 px-3 py-1 rounded-full hover:bg-red-100';
                delBtn.addEventListener('click', () => {
                    if (currentServicesRows.length === 1) { alert("At least one service required"); return; }
                    const rowIndex = currentServicesRows.findIndex(r => r.id === row.id);
                    if (rowIndex !== -1) currentServicesRows.splice(rowIndex, 1);
                    renderFinalServicesTable();
                    renderAllDetailsSections();
                    updateFinalTotals();
                });
                tdAction.appendChild(delBtn);
                tr.appendChild(tdType); tr.appendChild(tdAmount); tr.appendChild(tdAction);
                tbody.appendChild(tr);
            });
            updateFinalTotals();
        }

        function updateFinalTotals() {
            let total = currentServicesRows.reduce((sum, r) => sum + (parseFloat(r.amount) || 0), 0);
            document.getElementById('finalTotalAmount').value = total.toFixed(2);
            let received = parseFloat(document.getElementById('finalReceivedAmount').value) || 0;
            document.getElementById('finalRemainingAmount').value = (total - received).toFixed(2);
        }

        function updateCommonFieldsBasedOnPrimaryService() {
            // For simplicity: if any of the services in rows is Transfer/Alteration/File Return -> full fields OR minimal.
            // As per requirement: we show common fields based on main selection (first service in list)
            let primary = currentServicesRows.length ? currentServicesRows[0].serviceType : 'Transfer';
            const isFull = ['Transfer', 'Alteration', 'File Return'].includes(primary);
            const container = document.getElementById('dynamicCommonFieldsContainer');
            if (isFull) {
                container.innerHTML = `<div><label class="required-dot">Vehicle No</label><input id="comm_vehicleNo" class="w-full border rounded-xl p-2"></div>
                <div><label>Party Name</label><input id="comm_partyName" class="w-full border rounded-xl p-2"></div>
                <div><label>Party Mobile No</label><input id="comm_partyMobile" class="w-full border rounded-xl p-2"></div>
                <div><label>Vehicle Make</label><input id="comm_vehicleMake" class="w-full border rounded-xl p-2"></div>
                <div><label>Vehicle Model</label><input id="comm_vehicleModel" class="w-full border rounded-xl p-2"></div>
                <div><label>Engine No</label><input id="comm_engineNo" class="w-full border rounded-xl p-2"></div>
                <div><label>Chassis No</label><input id="comm_chassisNo" class="w-full border rounded-xl p-2"></div>
                <div><label>Date</label><input type="date" id="comm_date" class="w-full border rounded-xl p-2"></div>
                <div><label>Wheel Type</label><input type="text" id="comm_wheelType" class="w-full border rounded-xl p-2"></div>
                <div><label>Comments</label><textarea id="comm_comments" class="w-full border rounded-xl p-2"></textarea></div>`;
            } else {
                container.innerHTML = `<div><label class="required-dot">Vehicle No</label><input id="comm_vehicleNo" class="w-full border rounded-xl p-2"></div>
                <div><label>Party Name</label><input id="comm_partyName" class="w-full border rounded-xl p-2"></div>
                <div><label>Party Mobile No</label><input id="comm_partyMobile" class="w-full border rounded-xl p-2"></div>
                <div><label>Date</label><input type="date" id="comm_date" class="w-full border rounded-xl p-2"></div>
                <div><label>Comments</label><textarea id="comm_comments" class="w-full border rounded-xl p-2"></textarea></div>`;
            }
            const today = new Date().toISOString().split('T')[0];
            const dateField = document.getElementById('comm_date');
            if (dateField && !dateField.value) dateField.value = today;
        }

        function addServiceRow(serviceType = 'Transfer') {
            const newId = nextId++;
            currentServicesRows.push({ id: newId, serviceType: serviceType, amount: 0, detailsData: {} });
            renderFinalServicesTable();
            renderAllDetailsSections();
            updateCommonFieldsBasedOnPrimaryService();
        }

        // Load screen 2 city pending
        function loadCityPendingCases(city) {
            const filtered = pendingCasesDB.filter(c => normalizeCity(c.city) === city);
            const container = document.getElementById('cityPendingCasesList');
            if (!filtered.length) container.innerHTML = '<div class="text-gray-400">No pending cases</div>';
            else container.innerHTML = filtered.map(c => `<div class="flex gap-2 border-b pb-2"><i class="fas fa-exclamation-circle text-amber-500"></i><div><span class="font-medium">${c.service} - ${c.title}</span><br><span class="text-xs">${c.desc}</span></div></div>`).join('');
            document.getElementById('pendingCityName').innerText = city;
        }

        function showScreen2(city) {
            currentCity = city;
            document.getElementById('selectedCityName').innerText = city;
            loadCityPendingCases(city);
            const grid = document.getElementById('servicesGrid');
            const services = ['Transfer','Alteration','Route Permit','FC','Insurance','Tax','File Return','Others'];
            grid.innerHTML = '';
            services.forEach(serv => {
                const card = document.createElement('div');
                card.className = 'service-card bg-white border p-4 rounded-xl shadow-sm text-center hover:shadow-md';
                card.innerHTML = `<i class="fas ${serv === 'Transfer' ? 'fa-exchange-alt' : serv === 'Route Permit' ? 'fa-road' : serv === 'FC' ? 'fa-truck' : serv === 'Insurance' ? 'fa-shield-alt' : serv === 'Tax' ? 'fa-money-bill-wave' : serv === 'File Return' ? 'fa-folder-open' : 'fa-ellipsis-h'} text-3xl text-blue-600 mb-2"></i><h3 class="font-bold">${serv}</h3>`;
                card.addEventListener('click', () => {
                    currentServicesRows = [];
                    const newId = nextId++;
                    currentServicesRows.push({ id: newId, serviceType: serv, amount: 0, detailsData: {} });
                    renderFinalServicesTable();
                    renderAllDetailsSections();
                    updateCommonFieldsBasedOnPrimaryService();
                    document.getElementById('formCityLabel').innerText = currentCity;
                    document.getElementById('finalReceivedAmount').value = '0';
                    updateFinalTotals();
                    document.getElementById('screen2Service').classList.add('hidden');
                    document.getElementById('screen3Form').classList.remove('hidden');
                });
                grid.appendChild(card);
            });
            document.getElementById('screen1Dashboard').classList.add('hidden');
            document.getElementById('screen2Service').classList.remove('hidden');
        }

        // Event Listeners
        document.querySelectorAll('.city-card').forEach(card => card.addEventListener('click', () => showScreen2(card.getAttribute('data-city'))));
        document.getElementById('backToCitiesBtn').addEventListener('click', () => { document.getElementById('screen2Service').classList.add('hidden'); document.getElementById('screen1Dashboard').classList.remove('hidden'); renderFilteredItems(); });
        document.getElementById('backToServiceScreenBtn').addEventListener('click', () => { document.getElementById('screen3Form').classList.add('hidden'); showScreen2(currentCity); });
        document.getElementById('addMoreServiceBtn').addEventListener('click', () => { addServiceRow(currentServicesRows[0]?.serviceType || 'Transfer'); });
        document.getElementById('finalReceivedAmount').addEventListener('input', updateFinalTotals);
        document.getElementById('applyFilterBtn').addEventListener('click', renderFilteredItems);
        document.getElementById('finalSaveRecordBtn').addEventListener('click', () => {
            const vehicle = document.getElementById('comm_vehicleNo')?.value;
            if (!vehicle) { alert("Please fill Vehicle Number"); return; }
            // Save all details from current sections (ensure latest)
            currentServicesRows.forEach(row => saveDetailsFromSection(row.id));
            alert(`✅ Record Saved!\nCity: ${currentCity}\nVehicle: ${vehicle}\nServices: ${currentServicesRows.map(s => `${s.serviceType} (₨${s.amount})`).join(', ')}\nTotal: ₨${document.getElementById('finalTotalAmount').value}\nReceived: ₨${document.getElementById('finalReceivedAmount').value}`);
        });
        renderFilteredItems();
    </script>
</body>
</html>
