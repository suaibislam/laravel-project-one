<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .img-box {
            width: 80px;
            height: 50px;
            margin-bottom: 10px;
        }

        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .card {
            margin-bottom: 20px;
            padding: 15px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form__label {
            font-size: 14px;
            color: #6c757d;
        }

        .form-control {
            font-size: 14px;
            border-radius: 0.375rem;
        }

        .payment-summary {
            font-size: 14px;
            line-height: 1.5;
            color: #333;
        }

        .payment-summary .fw-bold {
            font-weight: 600;
        }

        .payment-summary .c-green {
            color: #28a745;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="img-box">
                <img src="https://www.freepnglogos.com/uploads/visa-logo-download-png-21.png" alt="Visa">
            </div>
        </div>

        <div class="card">
            <p class="payment-summary">
                <strong>Product:</strong> <span class="c-green">{{ $order->name }}</span><br>
                <strong>Price:</strong> <span class="c-green">${{ $order->total_amount }}</span><br>
            </p>
        </div>

        <form class="form" action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="cardType" class="form__label">Choose Card</label>
                <select name="cardType" class="form-control" id="cardType" required>
                    <option value="" disabled selected>Select card</option>
                    <option value="stripone">Debit card</option>
                    <option value="striptwo">Credit card</option>
                    <option value="stripthree">Bank card</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cardNumber" class="form__label">Card Number</label>
                <input name="cardNumber" type="text" class="form-control" id="cardNumber" placeholder=" " required>
            </div>

            <div class="form-group">
                <label for="expiryDate" class="form__label">MM / YY</label>
                <input name="expiryDate" type="date" class="form-control" id="expiryDate" placeholder=" " required>
            </div>


            <div class="card">

                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="form-label">Select Delivery Method</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery_method" value="road" id="road"
                                required>
                            <label class="form-check-label" for="road">Road</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery_method" value="air" id="air"
                                required>
                            <label class="form-check-label" for="air">Air</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery_method" value="ship" id="ship"
                                required>
                            <label class="form-check-label" for="ship">Ship</label>
                        </div>
                    </div>
                    <div id="dynamic-field-container" class="mt-3"></div>
                </div>
            </div>
            <div id="dynamic-field-container"></div>

            <button type="submit" class="btn btn-primary btn-block">Payment Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (optional for dropdowns, tooltips, etc.) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script>
        const deliveryMethodRadios = document.querySelectorAll('input[name="delivery_method"]');
        const dynamicFieldContainer = document.getElementById('dynamic-field-container');

        // Clear dynamic fields
        function clearDynamicFields() {
            dynamicFieldContainer.innerHTML = '';
        }

        // Create a text field
        function createTextField(labelText, fieldName, placeholder) {
            const fieldGroup = document.createElement('div');
            fieldGroup.classList.add('mb-3');

            const label = document.createElement('label');
            label.textContent = labelText;
            label.classList.add('form-label');

            const input = document.createElement('input');
            input.type = 'text';
            input.name = fieldName;
            input.placeholder = placeholder;
            input.classList.add('form-control');

            fieldGroup.appendChild(label);
            fieldGroup.appendChild(input);

            return fieldGroup;
        }

        // Create Yes/No radio buttons
        function createYesNoField(labelText, fieldName, yesCallback = null) {
            const fieldGroup = document.createElement('div');
            fieldGroup.classList.add('mb-3');

            const label = document.createElement('label');
            label.textContent = labelText;
            label.classList.add('form-label');
            fieldGroup.appendChild(label);

            const radioContainer = document.createElement('div');
            radioContainer.classList.add('d-flex', 'gap-3');

            // Yes option
            const yesRadioDiv = document.createElement('div');
            yesRadioDiv.classList.add('form-check');

            const yesInput = document.createElement('input');
            yesInput.type = 'radio';
            yesInput.name = fieldName;
            yesInput.value = 'yes';
            yesInput.id = `${fieldName}_yes`;
            yesInput.classList.add('form-check-input');
            const yesLabel = document.createElement('label');
            yesLabel.textContent = 'Yes';
            yesLabel.classList.add('form-check-label');
            yesLabel.setAttribute('for', `${fieldName}_yes`);
            yesRadioDiv.appendChild(yesInput);
            yesRadioDiv.appendChild(yesLabel);

            // No option
            const noRadioDiv = document.createElement('div');
            noRadioDiv.classList.add('form-check');

            const noInput = document.createElement('input');
            noInput.type = 'radio';
            noInput.name = fieldName;
            noInput.value = 'no';
            noInput.id = `${fieldName}_no`;
            noInput.classList.add('form-check-input');
            const noLabel = document.createElement('label');
            noLabel.textContent = 'No';
            noLabel.classList.add('form-check-label');
            noLabel.setAttribute('for', `${fieldName}_no`);
            noRadioDiv.appendChild(noInput);
            noRadioDiv.appendChild(noLabel);

            // Append Yes/No options
            radioContainer.appendChild(yesRadioDiv);
            radioContainer.appendChild(noRadioDiv);
            fieldGroup.appendChild(radioContainer);

            // Add Yes callback
            if (yesCallback) {
                yesInput.addEventListener('change', yesCallback);
                noInput.addEventListener('change', () => clearDynamicFields());
            }

            return fieldGroup;
        }

        // Handle dynamic fields creation
        function handleDynamicFields(deliveryMethod) {
            clearDynamicFields();

            if (deliveryMethod === 'road') {
                dynamicFieldContainer.appendChild(createTextField('Vehicle Number', 'vehicle_number', 'Enter vehicle number'));
                dynamicFieldContainer.appendChild(createTextField('Driver Name', 'driver_name', 'Enter driver name'));
                dynamicFieldContainer.appendChild(createTextField('Estimated Arrival Time', 'arrival_time', 'Enter arrival time'));
                dynamicFieldContainer.appendChild(
                    createYesNoField('Home Delivery?', 'home_delivery', () => {
                        dynamicFieldContainer.appendChild(createTextField('Home Address', 'home_address', 'Enter home address'));
                    })
                );
            } else if (deliveryMethod === 'air') {
                dynamicFieldContainer.appendChild(createTextField('Flight Number', 'flight_number', 'Enter flight number'));
                dynamicFieldContainer.appendChild(createTextField('Departure Date', 'departure_date', 'Enter departure date'));
            } else if (deliveryMethod === 'ship') {
                dynamicFieldContainer.appendChild(createTextField('Ship Name', 'ship_name', 'Enter ship name'));
                dynamicFieldContainer.appendChild(createTextField('Port of Origin', 'port_origin', 'Enter port of origin'));
                dynamicFieldContainer.appendChild(createTextField('Port of Destination', 'port_destination', 'Enter port of destination'));
                dynamicFieldContainer.appendChild(
                    createYesNoField('By Agency?', 'by_agency', () => {
                        dynamicFieldContainer.appendChild(createTextField('Agency Name', 'agency_name', 'Enter agency name'));
                        dynamicFieldContainer.appendChild(createTextField('Agency Contact', 'agency_contact', 'Enter agency contact'));
                    })
                );
            }
        }

        // Add event listeners to delivery method radio buttons
        deliveryMethodRadios.forEach((radio) => {
            radio.addEventListener('change', (event) => {
                handleDynamicFields(event.target.value);
            });
        });
    </script> -->
    <script>
        const deliveryMethodRadios = document.querySelectorAll('input[name="delivery_method"]');
        const dynamicFieldContainer = document.getElementById('dynamic-field-container');

        // Store DOM elements for each delivery method
        const methodFields = {};

        // Create fields for "Road" delivery
        function createRoadFields() {
            if (!methodFields.road) {
                const container = document.createElement('div');
                container.id = 'road-fields';

                container.appendChild(createTextField('Vehicle Number', 'vehicle_number', 'Enter vehicle number'));
                container.appendChild(createTextField('Driver Name', 'driver_name', 'Enter driver name'));
                container.appendChild(createDateField('Estimated Arrival Time', 'arrival_time', 'Enter arrival time'));
                container.appendChild(
                    createYesNoField('Home Delivery?', 'home_delivery', () => {
                        const addressField = createTextField('Home Address', 'home_address', 'Enter home address');
                        container.appendChild(addressField);
                    })
                );

                methodFields.road = container;
            }
            return methodFields.road;
        }

        // Create fields for "Air" delivery
        function createAirFields() {
            if (!methodFields.air) {
                const container = document.createElement('div');
                container.id = 'air-fields';

                container.appendChild(createTextField('Flight Number', 'flight_number', 'Enter flight number'));
                container.appendChild(createTextField('Departure Date', 'departure_date', 'Enter departure date'));

                methodFields.air = container;
            }
            return methodFields.air;
        }

        // Create fields for "Ship" delivery
        function createShipFields() {
            if (!methodFields.ship) {
                const container = document.createElement('div');
                container.id = 'ship-fields';

                container.appendChild(createTextField('Ship Name', 'ship_name', 'Enter ship name'));
                container.appendChild(createTextField('Port of Origin', 'port_origin', 'Enter port of origin'));
                container.appendChild(createTextField('Port of Destination', 'port_destination', 'Enter port of destination'));
                container.appendChild(
                    createYesNoField('By Agency?', 'by_agency', () => {
                        container.appendChild(createTextField('Agency Name', 'agency_name', 'Enter agency name'));
                        container.appendChild(createTextField('Agency Contact', 'agency_contact', 'Enter agency contact'));
                    })
                );

                methodFields.ship = container;
            }
            return methodFields.ship;
        }

        // Clear the current dynamic fields
        function clearDynamicFields() {
            dynamicFieldContainer.innerHTML = '';
        }

        // Handle dynamic fields creation based on the selected method
        function handleDynamicFields(deliveryMethod) {
            clearDynamicFields();

            let fieldsToDisplay = null;
            if (deliveryMethod === 'road') {
                fieldsToDisplay = createRoadFields();
            } else if (deliveryMethod === 'air') {
                fieldsToDisplay = createAirFields();
            } else if (deliveryMethod === 'ship') {
                fieldsToDisplay = createShipFields();
            }

            if (fieldsToDisplay) {
                dynamicFieldContainer.appendChild(fieldsToDisplay);
            }
        }

        // Create a text field
        function createTextField(labelText, fieldName, placeholder) {
            const fieldGroup = document.createElement('div');
            fieldGroup.classList.add('mb-3');

            const label = document.createElement('label');
            label.textContent = labelText;
            label.classList.add('form-label');

            const input = document.createElement('input');
            input.type = 'text';
            input.name = fieldName;
            input.placeholder = placeholder;
            input.classList.add('form-control');

            fieldGroup.appendChild(label);
            fieldGroup.appendChild(input);

            return fieldGroup;
        }

        // // Function to create a date input field
        // function createDateField(labelText, fieldName, placeholder) {
        //     const wrapper = document.createElement('div'); // Wrapper for label and input
        //     wrapper.classList.add('input-wrapper');

        //     const label = document.createElement('label');
        //     label.textContent = labelText;
        //     label.setAttribute('for', fieldName);

        //     const input = document.createElement('input');
        //     input.setAttribute('type', 'date'); // Set input type to date
        //     input.setAttribute('name', fieldName);
        //     input.setAttribute('id', fieldName);
        //     input.setAttribute('placeholder', placeholder); // Optional placeholder (not usually shown for date inputs)

        //     wrapper.appendChild(label);
        //     wrapper.appendChild(input);

        //     return wrapper;
        // }
        // Create a date field
        function createDateField(labelText, fieldName, placeholder = '') {
            const fieldGroup = document.createElement('div');
            fieldGroup.classList.add('mb-3');

            const label = document.createElement('label');
            label.textContent = labelText;
            label.classList.add('form-label');

            const input = document.createElement('input');
            input.type = 'date'; // Set the input type to "date"
            input.name = fieldName;
            input.placeholder = placeholder; // This won't be visible for "date" fields in most browsers
            input.classList.add('form-control');

            fieldGroup.appendChild(label);
            fieldGroup.appendChild(input);

            return fieldGroup;
        }

        // Create Yes/No radio buttons
        function createYesNoField(labelText, fieldName, yesCallback = null) {
            const fieldGroup = document.createElement('div');
            fieldGroup.classList.add('mb-3');

            const label = document.createElement('label');
            label.textContent = labelText;
            label.classList.add('form-label');
            fieldGroup.appendChild(label);

            const radioContainer = document.createElement('div');
            radioContainer.classList.add('d-flex', 'gap-3');

            // Yes option
            const yesRadioDiv = document.createElement('div');
            yesRadioDiv.classList.add('form-check');

            const yesInput = document.createElement('input');
            yesInput.type = 'radio';
            yesInput.name = fieldName;
            yesInput.value = 'yes';
            yesInput.id = `${fieldName}_yes`;
            yesInput.classList.add('form-check-input');
            const yesLabel = document.createElement('label');
            yesLabel.textContent = 'Yes';
            yesLabel.classList.add('form-check-label');
            yesLabel.setAttribute('for', `${fieldName}_yes`);
            yesRadioDiv.appendChild(yesInput);
            yesRadioDiv.appendChild(yesLabel);

            // No option
            const noRadioDiv = document.createElement('div');
            noRadioDiv.classList.add('form-check');

            const noInput = document.createElement('input');
            noInput.type = 'radio';
            noInput.name = fieldName;
            noInput.value = 'no';
            noInput.id = `${fieldName}_no`;
            noInput.classList.add('form-check-input');
            const noLabel = document.createElement('label');
            noLabel.textContent = 'No';
            noLabel.classList.add('form-check-label');
            noLabel.setAttribute('for', `${fieldName}_no`);
            noRadioDiv.appendChild(noInput);
            noRadioDiv.appendChild(noLabel);

            // Append Yes/No options
            radioContainer.appendChild(yesRadioDiv);
            radioContainer.appendChild(noRadioDiv);
            fieldGroup.appendChild(radioContainer);

            // Add Yes callback
            if (yesCallback) {
                yesInput.addEventListener('change', yesCallback);
                noInput.addEventListener('change', () => {
                    // Clear additional fields when "No" is selected
                    const additionalFields = fieldGroup.querySelectorAll('.mb-3');
                    additionalFields.forEach(field => field.remove());
                });
            }

            return fieldGroup;
        }

        // Add event listeners to delivery method radio buttons
        deliveryMethodRadios.forEach((radio) => {
            radio.addEventListener('change', (event) => {
                handleDynamicFields(event.target.value);
            });
        });
    </script>
</body>

</html>