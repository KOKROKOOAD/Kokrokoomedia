<form method="post" action="{{ route('upload-excel') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <input type="submit" name="submit" role="button" value="upload">
</form>

<a href="{{ route('download') }}" >download</a>