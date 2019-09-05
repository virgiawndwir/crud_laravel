@if(count($datas) <= 0)
    <tr>
        <td colspan="{{ $colspan }}"><center>Data {{ $title }} kosong</center><td>
    </tr>
@endif