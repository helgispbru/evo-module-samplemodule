<table class="table-sm table">
    <thead>
        <th> </th>
        <th>pagetitle</th>
        <th>alias</th>
        <th>actions</th>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            @include('modules.samplemodule.row', $row)
        @endforeach
    </tbody>
</table>
