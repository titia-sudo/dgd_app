<!DOCTYPE html>
<html>

<head>
    <title>pdf</title>
    <style>
        table {
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th {
            cursor: pointer;
        }

        th,
        td {
            text-align: left;
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
</head>

<body>

    <div >
    <h1>Liste des utilisateurs</h1>
    </div>


    <table id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Service</th>
                <th>Direction</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->service->nomService }}</td>
                <td>{{ $user->service->direction->nomDirection }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
