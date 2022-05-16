<table>
  <thead>
  <tr>
    <th colspan="7" style="text-align: center; font-weight: bold">
      DAFTAR DATA BARANG MASUK
    </th>
  </tr>
  <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Sumber Dana</th>
      <th>Unit Kerja</th>
      <th>Nama Penyedia</th>
      <th>Total Harga</th>
      <th>Tanggal</th>
  </tr>
  </thead>
  <tbody>
  @foreach($barang_masuk as $loopItem)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $loopItem->nama_barang }}</td>
          <td>{{ $loopItem->sumber_dana }}</td>
          <td>{{ $loopItem->unit_kerja }}</td>
          <td>{{ $loopItem->nama_penyedia }}</td>
          <td>{{ $loopItem->total_harga_barang_masuk }}</td>
          <td>{{ date_format($loopItem->created_at, 'd F Y') }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
<table>
  <thead>
  <tr>
    <th colspan="6" style="text-align: center; font-weight: bold">
      DAFTAR DATA BARANG KELUAR
    </th>
  </tr>
  <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Sumber Dana</th>
      <th>Unit Kerja</th>
      <th>Tujuan</th>
      <th>Tanggal</th>
  </tr>
  </thead>
  <tbody>
  @foreach($barang_keluar as $loopItem)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $loopItem->nama_barang }}</td>
          <td>{{ $loopItem->sumber_dana }}</td>
          <td>{{ $loopItem->unit_kerja }}</td>
          <td>{{ $loopItem->tujuan }}</td>
          <td>{{ date_format($loopItem->created_at, 'd F Y') }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
<table>
  <thead>
  <tr>
    <th colspan="3" style="text-align: center; font-weight: bold">
      DAFTAR DATA REKENING
    </th>
  </tr>
  <tr>
      <th>No</th>
      <th>Nomor Rekening</th>
      <th>Saldo Rekening</th>
  </tr>
  </thead>
  <tbody>
  @foreach($rekening as $loopItem)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $loopItem->no_rekening }}</td>
          <td>{{ $loopItem->saldo_rekening }}</td>
      </tr>
  @endforeach
  </tbody>
</table>