<table border = "3">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Verified At</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at }}</td>
        </tr>
        @endforeach

    </table>