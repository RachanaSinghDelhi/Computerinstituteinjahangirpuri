<html>

<p>Welcome Admin</p>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
</html>