<script>
    window.onload=window.print();
</script>
<table style="border-collapse:collapse;width:744.2500pt;margin-left:-15.9000pt;border:none;">
    <tbody>
        <tr>
            <td rowspan="3" style="width:63.8500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:1.0000pt solid rgb(0,0,0);border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:center;">
                    <img src="{{asset('admin-lte-3/logo/Logo_Telkom_University_potrait.png')}}" width="100px">
                <br></p>
            </td>
            <td style="width:404.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:1.0000pt solid rgb(0,0,0);border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:center;">
                    <strong><span style="font-family:Tahoma;font-size:19px;">UNIVERSITAS&nbsp;</span></strong><strong><span style="font-family:Tahoma;font-size:19px;">TELKOM</span></strong></p>
            </td>
            <td style="width:106.3000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:1.0000pt solid rgb(0,0,0);border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:justify;"><span style="font-family:Tahoma;">No.&nbsp;</span><span style="font-family:Tahoma;">Dokumen</span></p>
            </td>
            <td style="width:170.1000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:1.0000pt solid rgb(0,0,0);border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:justify;"><span style="font-family:Tahoma;">&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:404.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:none;border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">Jl. Telekomunikasi No. 1 Ters. Buah Batu Bandung 40257</span></strong></p>
            </td>
            <td style="width:106.3000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:none;border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:justify;"><span style="font-family:Tahoma;">No. Revisi</span></p>
            </td>
            <td style="width:170.1000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:none;border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:justify;"><span style="font-family:Tahoma;">&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:404.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:none;border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:12px;">FORMULIR DAFTAR HADIR &amp; BERITA ACARA SIDANG TUGAS AKHIR</span></strong></p>
            </td>
            <td style="width:106.3000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:none;border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:justify;"><span style="font-family:Tahoma;">Berlaku efektif</span></p>
            </td>
            <td style="width:170.1000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid rgb(0,0,0);border-right:1.0000pt solid rgb(0,0,0);border-top:none;border-bottom:1.0000pt solid rgb(0,0,0);">
                <p style="text-align:justify;"><br></p>
            </td>
        </tr>
    </tbody>
</table>
<p id="isPasted"><strong><span style="font-family:Tahoma;font-size:16px;">FAKULTAS {{$data['fakultas']}} PROGRAM STUDI:&nbsp;</span></strong><strong><span style="font-family:Tahoma;font-size:16px;">{{$data['program_studi']}}</span></strong></p>
<p><strong><span style="font-family:Tahoma;font-size:16px;">DAFTAR HADIR &amp; BERITA ACARA SIDANG TUGAS AKHIR (ONLINE)</span></strong></p>
<p style="text-align:justify;line-height:150%;"><span style="font-family:Tahoma;">Pada Hari ini</span><span style="font-family:Tahoma;">: {{$data['hari']}}, Tanggal : {{$data['tanggal']." ".$data['bulan']." ".$data['tahun']}}, Jam : {{$data['jam']}} , Telah Dilaksanakan Sidang&nbsp;</span><span style="font-family:Tahoma;">Tugas</span><span style="font-family:Tahoma;">&nbsp;Akhir Program&nbsp;</span><span style="font-family:Tahoma;">Studi&nbsp;</span><span style="font-family:Tahoma;">{{$data['program_studi']}}</span><span style="font-family:Tahoma;">&nbsp;Fakutas {{$data['fakultas']}}</span><span style="font-family:Tahoma;">,&nbsp;</span><span style="font-family:Tahoma;">Universitas Telkom,&nbsp;</span><span style="font-family:Tahoma;">Untu</span><span style="font-family:Tahoma;">k</span><span style="font-family:Tahoma;">&nbsp;Mahasiswa :&nbsp;</span></p>
<p style="text-align:justify;line-height:150%;">
    <span style="font-family:Tahoma;">NAMA : {{$data['nama']}}&nbsp;</span>
    <span style="font-family:Tahoma; margin-left: 200px;">NIM : {{$data['nim']}}&nbsp;</span><br>
    <span style="font-family:Tahoma;">No.SK :</span> 
    <span style="font-family:Tahoma; margin-left: 200px;">Tanggal ditetapkan SK : &nbsp;</span><br>
    <span style="font-family:Tahoma;">Judul Tugas Akhir: {{$data_judul->judul}}&nbsp;</span>
</p>
<p style="text-align:justify;"><span style="font-family:'Times New Roman';font-size:5px;">&nbsp;</span></p>
<table style="border-collapse:collapse;width:738.0000pt;margin-left:5.4000pt;border:none;">
    <tbody>
        <tr>
            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:8px;">&nbsp;</span></strong></p>
                <p><strong><span style="font-family:Tahoma;">NO</span></strong></p>
            </td>
            <td colspan="2" style="width: 134.7pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:8px;">&nbsp;</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:16px;">JABATAN</span></strong></p>
            </td>
            <td colspan="4" style="width: 240.95pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:8px;">&nbsp;</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:16px;">NAMA</span></strong></p>
            </td>
            <td style="width: 56.7pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:8px;">&nbsp;</span></strong></p>
                <p><strong><span style="font-family:Tahoma;font-size:15px;">NILAI</span></strong></p>
            </td>
            <td colspan="2" style="width: 106.3pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:12px;">NILAI</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:12px;">RATA-RATA</span></strong></p>
            </td>
            <td style="width: 63pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="margin-right:-5.4000pt;margin-left:-5.4000pt;"><strong><span style="font-family:Tahoma;font-size:8px;">&nbsp;</span></strong></p>
                <p style="margin-right:-5.4000pt;margin-left:-5.4000pt;"><strong><span style="font-family:Tahoma;">BOBOT</span></strong></p>
            </td>
            <td colspan="3" style="width: 108pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">NILAI AKHIR</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;font-size:11px;">1.</span></p>
            </td>
            <td colspan="2" style="width: 134.7pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="line-height:150%;"><strong><span style="font-family:Tahoma;font-size:11px;">PEMBIMBING &ndash; I</span></strong></p>
            </td>
            <td colspan="4" style="width: 240.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;"><span style="font-family:Tahoma;">{{$data['pbb1']}} &nbsp;</span></p>
            </td>
            <td style="width: 56.7pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;"> {{$data['nilai_pbb1']}}&nbsp;</span></p>
            </td>
            <td colspan="2" rowspan="2" style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['nilai_rata_pbb']}} &nbsp;</span></p>
            </td>
            <td rowspan="2" style="width: 63pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:11px;">&nbsp;</span></strong></p>
                <p style="text-align:center;line-height:150%;"><strong><span style="font-family:Tahoma;font-size:16px;">5</span></strong><strong><span style="font-family:Tahoma;font-size:16px;">0 %</span></strong></p>
            </td>
            <td colspan="3" rowspan="2" style="width: 108pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;"> {{$data['nilai_akhir_pbb']}} &nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;font-size:11px;">2.</span></p>
            </td>
            <td colspan="2" style="width: 134.7pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="line-height:150%;"><strong><span style="font-family:Tahoma;font-size:11px;">PEMBIMBING &ndash; II</span></strong></p>
            </td>
            <td colspan="4" style="width: 240.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;"><span style="font-family:Tahoma;">{{$data['pbb2']}} &nbsp;</span></p>
            </td>
            <td style="width: 56.7pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['nilai_pbb2']}} &nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="14" style="width: 738pt;padding: 0pt 5.4pt;border-left: none;border-right: none;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="line-height:150%;"><span style="font-family:Tahoma;font-size:11px;">&nbsp;</span></p>
                <p style="text-align:center;line-height:150%;"><strong><span style="font-family:Tahoma;font-size:16px;">NILAI SIDANG TUGAS AKHIR</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                <p><strong><span style="font-family:Tahoma;">NO</span></strong></p>
            </td>
            <td style="width: 70.9pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">&nbsp;</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">JABATAN</span></strong></p>
            </td>
            <td colspan="2" style="width: 134.65pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">&nbsp;</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">NAMA</span></strong></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p><strong><span style="font-family:Tahoma;font-size:12px;">Pemaparan</span></strong></p>
            </td>
            <td style="width: 42.5pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p><strong><span style="font-family:Tahoma;font-size:12px;">Materi</span></strong></p>
                <p><strong><span style="font-family:Tahoma;font-size:12px;">Pokok</span></strong></p>
                <p><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:12px;">Masalah &amp; Topik yang diajukan</span></strong></p>
            </td>
            <td style="width: 56.7pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">JUMLAH</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">(100%)</span></strong></p>
            </td>
            <td colspan="2" style="width: 106.3pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:12px;">NILAI</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:12px;">RATA-RATA</span></strong></p>
            </td>
            <td style="width: 63pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="margin-right:-5.4000pt;margin-left:-5.4000pt;text-align:center;"><strong><span style="font-family:Tahoma;">&nbsp;</span></strong></p>
                <p style="margin-right:-5.4000pt;margin-left:-5.4000pt;text-align:center;"><strong><span style="font-family:Tahoma;">BOBOT</span></strong></p>
            </td>
            <td colspan="3" style="width: 108pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">NILAI AKHIR</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">1.</span></p>
            </td>
            <td style="width: 70.9pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p><strong><span style="font-family:Tahoma;font-size:11px;">PENGUJI &ndash; I</span></strong></p>
            </td>
            <td colspan="2" style="width: 134.65pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['penguji_1']}} &nbsp;</span></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['pemaparan_p1']}} &nbsp;</span></p>
            </td>
            <td style="width: 42.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['materi_pokok_p1']}} &nbsp;</span></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['masalah_p1']}} &nbsp;</span></p>
            </td>
            <td style="width: 56.7pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;"> {{$data['jumlah_p1']}}&nbsp;</span></p>
            </td>
            <td colspan="2" rowspan="3" style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['rata_rata_penguji']}}&nbsp;</span></p>
            </td>
            <td rowspan="3" style="width: 63pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:11px;">&nbsp;</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:11px;">&nbsp;</span></strong></p>
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;font-size:16px;">50 %</span></strong></p>
            </td>
            <td colspan="3" rowspan="3" style="width: 108pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['nilai_akhir_penguji']}} &nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">2.</span></p>
            </td>
            <td style="width: 70.9pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="line-height:150%;"><strong><span style="font-family:Tahoma;font-size:11px;">PENGUJI &ndash; II</span></strong></p>
            </td>
            <td colspan="2" style="width: 134.65pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['penguji_2']}} &nbsp;</span></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['pemaparan_p2']}} &nbsp;</span></p>
            </td>
            <td style="width: 42.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['materi_pokok_p2']}} &nbsp;</span></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['masalah_p2']}} &nbsp;</span></p>
            </td>
            <td style="width: 56.7pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['jumlah_p2']}} &nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">3.</span></p>
            </td>
            <td style="width: 70.9pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="line-height:150%;"><strong><span style="font-family:Tahoma;font-size:11px;">PENGUJI &ndash; III</span></strong></p>
            </td>
            <td colspan="2" style="width: 134.65pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['penguji_3']}} &nbsp;</span></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['pemaparan_p3']}} &nbsp;</span></p>
            </td>
            <td style="width: 42.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['materi_pokok_p3']}} &nbsp;</span></p>
            </td>
            <td style="width: 63.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['masalah_p3']}} &nbsp;</span></p>
            </td>
            <td style="width: 56.7pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;line-height:150%;"><span style="font-family:Tahoma;">{{$data['jumlah_p3']}} &nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="11" style="width: 630pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p><strong><span style="font-family:Tahoma;font-size:12px;">&nbsp;</span></strong></p>
                <p><strong><span style="font-family:Tahoma;font-size:12px;">Total Nilai Bimbingan dengan Sidang T</span></strong><strong><span style="font-family:Tahoma;font-size:12px;">A</span></strong></p>
            </td>
            <td colspan="3" style="width: 108pt;padding: 0pt 5.4pt;border-left: none;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;"><span style="font-family:Tahoma;">{{$data['total_nilai_bimbingan_sidang']}}</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="13" style="width: 737.15pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="margin-top:5.0000pt;margin-bottom:5.0000pt;"><strong><span style="font-family:Arial;font-size:11px;">Setelah Dilaksanakan Sidang Dengan Seksama Dewan Penguji&nbsp;</span></strong><strong><span style="font-family:Arial;font-size:11px;">Dengan Penuh Tanggung Jawab&nbsp;</span></strong><strong><span style="font-family:Arial;font-size:11px;">Memutuskan Bahwa Mahasiswa Tersebut di atas Dinyatakan :</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="9" rowspan="2" style="width: 559.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:left;"><strong><span style="font-family:Tahoma;font-size:5px;">&nbsp;</span></strong></p>
                <p style="text-align:left;"><span style="font-family:Tahoma;font-size:13px;">*</span><span style="font-family:Tahoma;font-size:13px;">Coret Yang Tidak Perlu &nbsp; &nbsp; &nbsp;&nbsp;</span><strong><span style="font-family:Tahoma;font-size:13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></strong><strong><span style="font-family:Tahoma;font-size:13px;">Lulus</span></strong><strong><span style="font-family:Tahoma;font-size:13px;">&nbsp;/ Lulus Bersyarat /&nbsp;</span></strong><strong><span style="font-family:Tahoma;font-size:13px;">Tidak Lulus</span></strong><strong><span style="font-family:Tahoma;font-size:13px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></strong><span style="font-family:Tahoma;font-size:13px;">Dengan Nilai :</span></p>
                <p style="margin-left:186.0000pt;"><span style="font-family:Tahoma;">Revisi Sampai Dengan Tanggal&nbsp;</span><span style="font-family:'Times New Roman';">: &nbsp;</span></p>
            </td>
            <td colspan="3" style="width: 92.15pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">ANGKA</span></strong></p>
            </td>
            <td style="width: 85.05pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                <p style="text-align:center;"><strong><span style="font-family:Tahoma;">HURUF</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 92.15pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p style="text-align:center;"><span style="font-family:Tahoma;">{{$data['total_nilai_bimbingan_sidang']}} &nbsp;</span></p>
            </td>
            <td style="width: 85.05pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                <p>
                    <span style="font-family:Tahoma;">
                        @if($data['total_nilai_bimbingan_sidang']>=80)
                            A
                        @elseif(($data['total_nilai_bimbingan_sidang']<80) && ($data['total_nilai_bimbingan_sidang']>=77))
                            A-
                        @elseif(($data['total_nilai_bimbingan_sidang']<77) && ($data['total_nilai_bimbingan_sidang']>=74))
                            B+
                        @elseif(($data['total_nilai_bimbingan_sidang']<74) && ($data['total_nilai_bimbingan_sidang']>=68))
                            B
                        @elseif(($data['total_nilai_bimbingan_sidang']<68) && ($data['total_nilai_bimbingan_sidang']>=65))
                            B-
                        @elseif(($data['total_nilai_bimbingan_sidang']<65) && ($data['total_nilai_bimbingan_sidang']>=62))
                            C+
                        @elseif(($data['total_nilai_bimbingan_sidang']<62) && ($data['total_nilai_bimbingan_sidang']>=56))
                            C
                        @elseif(($data['total_nilai_bimbingan_sidang']<56) && ($data['total_nilai_bimbingan_sidang']>=45))
                            D
                        @elseif(($data['total_nilai_bimbingan_sidang']<45))
                            E
                        @endif
                    </span>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p><span style="font-family:Tahoma;">&nbsp;</span></p>
<p><span style="font-family:Tahoma;">&nbsp;</span></p>
<p><span style="font-family:Tahoma;">&nbsp;</span></p>
<p><span style="font-family:Tahoma;">Bandung, {{$data['tanggal_hari_ini']}}</span></p>
<p><span style="font-family:Tahoma;">Menyetujui</span></p>
<p><span style="font-family:Tahoma;">Ketua Program&nbsp;</span><span style="font-family:Tahoma;">Studi</span><span style="font-family:Tahoma;">&nbsp;{{$data['program_studi']}}</span></p>
<p><span style="font-family:Tahoma;">&nbsp;</span></p>
<p><span style="font-family:Tahoma;">&nbsp;</span></p>
<p><span style="font-family:Tahoma;">&nbsp;</span></p>
<p><strong><span style="font-family:Tahoma;font-size:15px;">_________________________</span></strong></p>