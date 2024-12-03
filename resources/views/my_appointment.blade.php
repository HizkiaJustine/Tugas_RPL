<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .appointments-section {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        .card h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #333;
        }
        .card p {
            margin-bottom: 10px;
            color: #666;
        }
        .card .status {
            font-weight: bold;
            color: #007bff;
        }
        .action-buttons {
            margin-top: 1rem;
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        .cancel-btn {
            background: #ff4747;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .cancel-btn:hover {
            background: #ff3333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 71, 71, 0.2);
        }
        .cancel-btn i {
            font-size: 1.1rem;
        }
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.875rem;
        }
        .status-ongoing {
            background: #e3f2fd;
            color: #1976d2;
        }
        .status-cancelled {
            background: #ffebee;
            color: #d32f2f;
        }
        .status-completed {
            background: #e8f5e9;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>My Appointments</x-header>

    @if($appointments->isEmpty())
        <p>Data anda belum terdaftar</p>
    @else
        <section id="appointments" class="appointments-section">
            <h2>Daftar Janji Temu</h2>
            @foreach($appointments as $appointment)
                <div class="card">
                    <h3>{{ $appointment->Tujuan }}</h3>
                    <p>{{ $appointment->TanggalJanjiTemu }} at {{ $appointment->JamJanjiTemu }}</p>
                    @if(Auth::user()->Role == 'pasien')
                        <p>Dokter: {{ $appointment->dokter->NamaDokter }}</p>
                    @elseif(Auth::user()->Role == 'dokter')
                        <p>Pasien: {{ $appointment->pasien->NamaPasien }}</p>
                    @endif
                    
                    <p>
                        <span class="status-badge status-{{ strtolower($appointment->Status) }}">
                            Status: {{ $appointment->Status }}
                        </span>
                    </p>
                    
                    @if($appointment->Status == 'Ongoing')
                        <div class="action-buttons">
                            <form action="{{ route('appointment.cancel', $appointment->AppointmentID) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="cancel-btn" 
                                        onclick="return confirm('Apakah Anda yakin ingin membatalkan janji temu ini?')">
                                    <i class="bi bi-x-circle"></i>
                                    Batalkan Janji Temu
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </section>
    @endif

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>