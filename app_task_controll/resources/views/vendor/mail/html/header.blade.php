<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'TaskControll')
<img src="http://localhost:8000/img/logo.png" class="logo" alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
