<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
     <!-- Flickity CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>{{ $title }}</x-header>

    @if (session('error'))
        <div style="background-color: rgb(247, 162, 162); color: rgb(163, 10, 10); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="background-color: rgb(162, 247, 195); color: rgb(10, 106, 16); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('success') }}
        </div>
    @endif

    <section id="reservation" class="reservation-section">
      <h2>Reservasi Janji Temu</h2>
      <p>Isi formulir di bawah ini untuk membuat janji temu dengan dokter kami.</p>
      <form action="{{ route('appointment.store') }}" method="POST" class="reservation-form">
        @csrf
          <!-- Appointment Details -->
          <div class="form-group">
              <label for="date">Tanggal Janji Temu:</label>
              <input type="date" id="date" name="TanggalJanjiTemu" required>
          </div>
          <div class="form-group">
              <label for="time">Waktu Janji Temu:</label>
              <input type="time" id="time" name="JamJanjiTemu" required>
          </div>
          <div class="form-group">
              <label for="doctor">Dokter/Spesialis:</label>
              <select id="doctor" name="NamaLayanan" required>
                  <option value="">Pilih Dokter/Spesialis</option>
                  @foreach($services as $service)
                      <option value="{{ $service->NamaLayanan }}">{{ $service->NamaLayanan }}</option>
                  @endforeach
              </select>
          </div>

          <!-- Additional Notes -->
          <div class="form-group">
              <label for="notes">Catatan Tambahan:</label>
              <textarea id="notes" name="CatatanTambahan" rows="4" placeholder="Tambahkan informasi atau permintaan khusus"></textarea>
          </div>

            <!-- Submit Button -->
            <button type="submit" class="button-86" role="button">Submit</button>
      </form>
  </section>

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>