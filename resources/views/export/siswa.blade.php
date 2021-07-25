<h2 style="font-family: sans-serif; text-align: center">Tabel Data Siswa</h2>
<table cellspacing='0' style="font-family: Arial, Helvetica, sans-serif; color: #666; text-shadow: 1px 1px 0px #fff; background: #eaebec; border: #ccc 1px solid;" align="center">
  <thead>
    <tr style="text-align: center; padding-left: 20px;">
      <th style="padding: 15px 35px; border-left:1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; background: #ededed;">Nama Siswa</th>
      <th style="padding: 15px 35px; border-left:1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; background: #ededed;">Jenis Kelamin</th>
      <th style="padding: 15px 35px; border-left:1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; background: #ededed;">Agama</th>
      <th style="padding: 15px 35px; border-left:1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; background: #ededed;">Rata - Rata Nilai</th>
    </tr>
  </thead>
  @foreach ($siswa as $data)
  <tbody>
    <tr style="text-align: center; padding-left: 20px;">
      <td style="padding: 15px 35px; border-top: 1px solid #ffffff; border-bottom: 1px solid #e0e0e0; border-left: 1px solid #e0e0e0; background: #fafafa; background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa)); background: -moz-linear-gradient(top, #fbfbfb, #fafafa);">{{ $data->nama_siswa }}</td>
      <td style="padding: 15px 35px; border-top: 1px solid #ffffff; border-bottom: 1px solid #e0e0e0; border-left: 1px solid #e0e0e0; background: #fafafa; background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa)); background: -moz-linear-gradient(top, #fbfbfb, #fafafa);">{{ $data->jenis_kelamin }}</td>
      <td style="padding: 15px 35px; border-top: 1px solid #ffffff; border-bottom: 1px solid #e0e0e0; border-left: 1px solid #e0e0e0; background: #fafafa; background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa)); background: -moz-linear-gradient(top, #fbfbfb, #fafafa);">{{ $data->agama }}</td>
      <td style="padding: 15px 35px; border-top: 1px solid #ffffff; border-bottom: 1px solid #e0e0e0; border-left: 1px solid #e0e0e0; background: #fafafa; background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa)); background: -moz-linear-gradient(top, #fbfbfb, #fafafa);">{{ $data->rataRataNilai() }}</td>
    </tr>
  </tbody>
  @endforeach
</table>