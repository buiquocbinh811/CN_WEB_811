<table class="table">
    <thead>
        <tr>
            <th>#</th>
            @foreach($config['columns'] as $key => $column)
                <th>{{ $column['label'] }}</th>
            @endforeach
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->{$config['primary_key']} }}</td>
                @foreach($config['columns'] as $key => $column)
                    <td>{{ $item->$key }}</td>
                @endforeach
                <td>
                    <a href="{{ route($table.'.edit', $item->{$config['primary_key']}) }}" 
                       class="btn btn-primary">Edit</a>
                    <form action="{{ route($table.'.destroy', $item->{$config['primary_key']}) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>