@extends('layouts.app')

@section('title', 'Monitoring')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('style/management.css') }}">
@endpush

@section('main')
    <div class="container">
        <h1>Sensor Data Monitoring</h1>
        <table class="user-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Sensor ID</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody id="sensor-data">
                @foreach ($readings as $index => $reading)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $reading->id }}</td>
                        <td>{{ $reading->sensor->kd_sensor }}</td>
                        <td>{{ $reading->type }}</td>
                        <td>{{ $reading->value }}</td>
                        <td>{{ $reading->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script>
        // Initialize the MQTT client
        const client = mqtt.connect('ws://test.mosquitto.org:8081/mqtt');

        client.on('connect', function() {
            console.log('Connected to MQTT broker');
            // Subscribe to the topics
            client.subscribe('shifa/sensor/temperature');
            client.subscribe('shifa/sensor/humidity');
        });

        client.on('message', function(topic, message) {
            console.log(`Topic: ${topic}, Message: ${message.toString()}`);

            let type;
            if (topic === 'shifa/sensor/temperature') {
                type = 'temperature';
            } else if (topic === 'shifa/sensor/humidity') {
                type = 'humidity';
            }

            // Send data to Laravel backend
            fetch('/api/readings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        kd_sensor: 'SN-001', // Sesuaikan dengan sensor ID Anda
                        value: parseFloat(message.toString()),
                        type: type
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Data saved:', data);
                    // Update the table with new data
                    const tableBody = document.getElementById('sensor-data');
                    const rowCount = tableBody.rows.length;
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${rowCount + 1}</td>
                    <td>${data.id}</td>
                    <td>${data.kd_sensor}</td>
                    <td>${data.type}</td>
                    <td>${data.value}</td>
                    <td>${data.created_at}</td>
                `;
                    tableBody.appendChild(row);
                })
                .catch(error => console.error('Error saving data:', error));
        });
    </script>
@endpush
