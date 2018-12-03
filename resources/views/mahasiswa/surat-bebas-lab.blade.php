<img width="100%" src="{{ asset('images/KOP_FT.PNG') }}">
<table width="100%"  border="0" cellspacing="5" cellpadding="0">
    <tr valign="top">
        {{--<td width="10%"><img width="50" src="https://siakadu.unesa.ac.id/assets/images/logobaru.jpg"></td>--}}
        {{--<td width="52%"><div style="font-size:13pt;margin-bottom:5px;font-family: 'Arial'" id="head-title">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</div>--}}
            {{--<div id="head-big">UNIVERSITAS NEGERI SURABAYA</div></td>--}}
        {{--<td width="38%"><table class="identitas" cellspacing="0" cellpadding="0">--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<td colspan="3">Kampus Ketintang, Surabaya - 60213</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>Telepon</td>--}}
                    {{--<td>:</td>--}}
                    {{--<td>+6231-99424932</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>Faksimile</td>--}}
                    {{--<td>:</td>--}}
                    {{--<td>+6231-99424932</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>e-mail</td>--}}
                    {{--<td>:</td>--}}
                    {{--<td>bakpk@unesa.ac.id</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
            {{--</table></td>--}}
        <td width="100%">

        </td>
    </tr>
</table>
<hr align="center" style="width: 100%">
<br>
<table style="width: 100%;">
    <tr>
        <td align=center><font size=3><b><u>SURAT KETERANGAN BEBAS LABORATORIUM</u></b></font></td>
    </tr>
    <tr>
        <td align=center><b>{{ strtoupper($jurusan->nama) }}</b></td>
    </tr>
</table>
<br>
<br>
<p style="margin-left: 20px">Persetujuan surat bebas laboratorium diberikan kepada :</p>
<table width="" style="margin-left: 50px">
    <tr>
        <td nowrap><font size="-1"><strong>Nama</strong></font></td>
        <td nowrap><font size="-1">: {{ Auth::guard('mhs')->user()->nama }} </font></td>
    </tr>
    <tr>
        <td nowrap><font size="-1"><strong>NIM</strong></font></td>
        <td width="150" nowrap><font size="-1">: {{ Auth::guard('mhs')->user()->id }} </font></td>
    </tr>
    <tr>
        <td nowrap><font size="-1"><strong>Program Studi</strong></font></td>
        <td><font size="-1">: {{ $prodi->nama }} </font></td>
    </tr>
</table>
<p style="margin-left: 20px">Untuk digunakan sebagai persyaratan yudisium.</p>
<br>
{{--<table style="width: 100%; " border=1 cellspacing=0 cellpadding="2">--}}
    {{--<tr>--}}
        {{--<td colspan="3">--}}
                {{--<tr align="center" height=20>--}}
                    {{--<td class="PrintBG" ><font size="-1">No.</font></td>--}}
                    {{--<td class="PrintBG"><font size="-1">Laboratorium</font></td>--}}
                    {{--<td class="PrintBG"><font size="-1">Ka.Sub.Lab/Teknisi</font></td>--}}
                {{--</tr>--}}
    {{--@foreach($semuaKasublab as $kasublab)--}}
                {{--<tr height=20>--}}
                    {{--<td align=right><font size="-1"> 1 .</font></td>--}}
                    {{--<td><font size="-1"> Labaratorium RPL </font></td>--}}
                    {{--<td><font size="-1"> {{ $kasublab->nama }} </font></td>--}}
                {{--</tr>--}}
    {{--@endforeach--}}
        {{--</td>--}}
    {{--</tr>--}}
{{--</table>--}}
<br>
<br>
<br>
<div style="float: left;">
    <br>
    <img style="height: 150px; margin-left: 20px" src="{{ asset('images/qrCode/'.Auth::guard('mhs')->user()->id.'.png') }}"/>
    <br>
    <p style="margin-left: 20px"> &nbsp;&nbsp;Scan untuk validasi</p>
</div>
<table style="float: right">
    <tr>
        <td width="50%" align="left">Surabaya, {{ now()->toDateString() }}
            <br>
            Ketua Laboratorium
            <br>
            <br>
            <br>
            <u>@foreach($kalab as $kalab1)
                    {{ $kalab1->nama }}</u><br>{{ $kalab1->id }}
                @endforeach</td>
    </tr>
</table>