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