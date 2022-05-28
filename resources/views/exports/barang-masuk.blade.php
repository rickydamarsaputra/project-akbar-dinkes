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