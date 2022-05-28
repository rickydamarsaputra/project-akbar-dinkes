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