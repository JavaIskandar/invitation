anda mendapatkan undangan dari {{ $data['nama_pengirim'] }}
silahkan kunjungi link berikut untuk detail undangan anda
<a href="{{ route('tamu.undangan.detail', [
'id' => encrypt($data['tamu_id']),
'undangan' => encrypt($data['undangan_id'])
]) }}">link</a>