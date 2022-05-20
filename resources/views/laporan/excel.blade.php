{{-- <div class="card" id="printableArea">
    <div class="card-header">
        <div class="page-title">
            <p class="text-center">RIWAYAT TRANSAKSI</p>
            <p class="text-center text-small">{{ $start_date}} - {{ $end_date }}</p>
        </div>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Deskripsi</th>
                    <th>Dompet</th>
                    <th>Kategori</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @if (count($transaksi) <= 0)
                    <tr>
                        <td colspan="7" style="text-align: center;">Data tidak ditemukan</td>
                    </tr>
                @else
                    @php
                        $no = 0;
                    @endphp
                    @foreach ($transaksi as $valTransaksi)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $valTransaksi->tanggal }}</td>
                            <td>{{ $valTransaksi->kode }}</td>
                            <td>{{ $valTransaksi->deskripsi }}</td>
                            <td>{{ $valTransaksi->dompet->nama }}</td>
                            <td>{{ $valTransaksi->kategori->nama }}</td>
                            @if ($valTransaksi->status_id == 1)
                                <td>(+) {{ $valTransaksi->nilai }}</td>
                            @else
                                <td>(-) {{ $valTransaksi->nilai }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div> --}}