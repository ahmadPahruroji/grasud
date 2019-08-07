<table class="table table-bordered table-striped mb-none" id="datatable-default">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="15%">Nama</th>
            <th width="15%">Jumlah Iuran</th>
            <th width="15%">Bulan</th>
            <th width="15%">Tahun</th>
            <th width="15%">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($countributions as $m => $countribution)
        @php
        setlocale (LC_TIME, 'ID');
        $date = strftime( "%d %B %Y", strtotime($countribution->date));

               // Rupiah //
        $rupiah = "Rp " . number_format($countribution->money,2,',','.');
        @endphp
        <tr>
            <td>{{ $m+1 }}</td>
            <td>{{ $countribution->user->name }}</td>
            <td style="text-align: right;">{{ $rupiah }}</td>
            <td>{{ $countribution->month }}</td>
            <td>{{ $countribution->year }}</td>
            <td>
                @if ($countribution->status == 0)
                <button type="link" value="0" class="btn btn-danger btn-sm">belum lunas</button>
                @else
                <button onclick="return confirm('apakah belum lunas?');" value="1" class="btn btn-success btn-sm">Lunas</button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- <script type="text/javascript">
    setTimeout(function(){   window.location.reload('adminmember/countribution/isi'); }, 5000);
</script> --}}