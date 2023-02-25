<form action="{{ $formaction }}" method="post">
    <table class="table-sm table">
        <thead>
            <th>название</th>
            <th>значение</th>
        </thead>
        <tbody>
            <tr>
                <td>pagetitle</td>
                <td><input name="pagetitle" value="{{ $doc['pagetitle'] }}" class="form-control" /></td>
            </tr>
            <tr>
                <td>longtitle</td>
                <td><input name="longtitle" value="{{ $doc['longtitle'] }}" class="form-control" /></td>
            </tr>
            <tr>
                <td>alias</td>
                <td><input name="alias" value="{{ $doc['alias'] }}" class="form-control" /></td>
            </tr>
        </tbody>
    </table>
    <p>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </p>
</form>
