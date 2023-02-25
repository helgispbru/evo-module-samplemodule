<tr>
    <td>
        @if ($row['isfolder'])
        <i class="bi bi-folder"></i>@else<i class="bi bi-file-earmark"></i>
        @endif
    </td>
    <td>{{ $row['pagetitle'] }} <small class="text-muted">({{ $row['id'] }})</small></td>
    <td>{{ $row['alias'] }}</td>
    <td>
        <a href="{{ \Request::fullUrlWithQuery(['action' => 'docinfo', 'docid' => $row['id']]) }}"
            title="Посмотреть информацию"><i class="bi bi-eye"></i></a>
        <a href="{{ \Request::fullUrlWithQuery(['action' => 'docedit', 'docid' => $row['id']]) }}"
            title="Редактировать"><i class="bi bi-pencil-square"></i></a>
        @if ($row['isfolder'])
            <a href="{{ \Request::fullUrlWithQuery(['action' => 'list', 'docid' => $row['id']]) }}"
                title="Идти в папку"><i class="bi bi-arrow-right-square"></i></a>
        @endif
    </td>
</tr>
