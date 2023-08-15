
<form action="{{ route('khoj.search') }}" method="POST">
    @csrf
    <label for="input_values">Input Values (comma-separated):</label>
    <input type="text" name="input_values" required><br>
    <label for="search_value">Search Value:</label>
    <input type="text" name="search_value" required><br>
    <button type="submit">Khoj</button>
</form>
