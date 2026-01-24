<form action="{{ route('evento-store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nome" id="">
    <label for="imagens_capa"> imagens_capa</label>
    <input type="file" name="imagens_capa" id="">
    <button type="submit">Upload</button>
</form>