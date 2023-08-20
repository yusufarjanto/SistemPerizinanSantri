<h3><center>Laporan Data Perizinan Santri</center></h3>
<table border ="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>No</th>
    <th>Nama Orang Tua</th>
    <th>Tanggal Izin</th>
    <th>Tanggal Masuk Kembali</th>
    <th>Keterangan Izin</th>
  </tr>
  @foreach($perizinan as $i) 
  <tr>
    <td>{{ $i->id_izin }}</td>
    <td>{{ $i->id_orang_tua }}</td>
    <td>{{ $i->tanggal_izin }}</td>
    <td>{{ $i->tanggal_masuk }}</td>
    <td>{{ $i->keterangan }}</td>
  </tr>
  @endforeach
</table>