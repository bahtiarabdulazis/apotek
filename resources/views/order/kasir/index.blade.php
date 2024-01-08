@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between my-3">
            <div class="row w-100 ml-2">
                <form action="" method="POST" class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="filter" class="col-form-label">Filter Date:</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="filter" id="filter" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info" id="cari_date">Cari Data</button>
                        <button class="btn btn-secondary" id="clear_data">Clear</button>
                    </div>
                </form>
            </div>
            <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Pembelian Baru</a>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Pembeli</th>
                    <th>Obat</th>
                    <th>Total Bayar</th>
                    <th>Kasir</th>
                    <th>Tanggal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_customer }}</td>
                        <td>
                            @foreach ($item->medicines as $medicine)
                                <ol>
                                    <li>
                                        {{ $medicine['name_medicine'] }} {{ number_format($medicine['price'], 0, ',', '.') }}:
                                        Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }} <small>qty {{ $medicine['qty'] }}</small>
                                    </li>
                                </ol>
                            @endforeach
                        </td>
                        <td>{{ number_format($item->total_price, 0, ',', '.') }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            @php \Carbon\Carbon::setLocale('id_ID') @endphp
                            {{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->translatedFormat('d F Y') }}
                        </td>
                        <td>
                            <a href="{{ route('kasir.order.download', $item->id )}}" class="btn btn-secondary">Download Struk</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            @if ($orders->count())
                {{ $orders->links() }}
            @endif
        </div>
    </div>
@endsection
