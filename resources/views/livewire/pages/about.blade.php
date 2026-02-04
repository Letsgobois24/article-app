@section('meta_description', 'Kenali Artikula, visi kami, dan tujuan menghadirkan ruang baca digital yang informatif,
    kritis, dan mudah diakses oleh semua.')

    <div>
        <x-slot:pageTitle>{{ $pageTitle }}</x-slot:pageTitle>
        <h3 class="text-lg">Ini adalah halaman About Page</h3>
        <h3>Owner: {{ $name }}</h3>
    </div>
