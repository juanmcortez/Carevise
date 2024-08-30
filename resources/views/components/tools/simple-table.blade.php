@props([
    'colnu' => 1,
    'colbl' => [],
    'colwd' => [],
    'coldt' => [],
])
@php
    if ($colnu == 1 && count($colbl) > 1) {
        $colnu = count($colbl);
    }
@endphp
<table id="table" {{ $attributes->merge(['class' => '']) }}>
    <thead>
        <tr>
            @for ($idx = 0; $idx < $colnu; $idx++)
                <th class="{{ $colwd[$idx] }}">
                    @if (!empty($colbl[$idx]))
                        {{ __($colbl[$idx]) }}
                    @else
                        &nbsp;
                    @endif
                </th>
            @endfor
        </tr>
    </thead>

    <tbody>
        {{ $slot }}
    </tbody>

    @if (!empty($coldt))
        <tfoot>
            <tr>
                <td colspan="{{ $colnu }}">
                    {!! $coldt !!}
                </td>
            </tr>
        </tfoot>
    @endif
</table>
