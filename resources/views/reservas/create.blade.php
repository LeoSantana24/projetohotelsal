<form action="{{ route('reservas.store') }}" method="POST">
    @csrf
    <label>Quarto ID:</label>
    <input type="number" name="quarto_id" required>
    
    <label>Data Check-in:</label>
    <input type="date" name="data_checkin" required>
    
    <label>Data Check-out:</label>
    <input type="date" name="data_checkout" required>

    <label>Número de Pessoas:</label>
    <input type="number" name="numero_pessoas" required>

    <label>Número de Adultos:</label>
    <input type="number" name="numero_adultos" required>

    <label>Número de Crianças:</label>
    <input type="number" name="numero_criancas" value="0">

    <button type="submit">Reservar</button>
</form>
