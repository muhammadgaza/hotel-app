<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Name Hotel</th>
            <th>Name Customer</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Jumlah Tamu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $reservation)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $reservation->hotel->name }}</td>
            <td>{{ $reservation->customer->name }}</td>
            <td>{{ $reservation->check_in }}</td>
            <td>{{ $reservation->check_out }}</td>
            <td>{{ $reservation->guests }}</td>
        </tr>
        @endforeach
    </tbody>
</table>