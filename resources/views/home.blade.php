<h4>--------------------------------------------------------------</h4>
<form action="reg" method="POST">
    <h1>Register.</h1>
    @csrf
    <h2>email.</h2>
    <input type="text" id="name" name="email" required><br>
    <h3>password.</h3>
    <input type="text" id="age" name="password"  required><br><br>
    <input type="submit" value="submit">
</form>
<h4>--------------------------------------------------------------</h4>
<form action="log" method="POST">
    <h1>Login.</h1>
    @csrf
    <h2>email.</h2>
    <input type="text"  name="email" id=email" required><br>
    <h3>password.</h3>
    <input type="text" name="password" id="password" required><br><br>
    <input type="submit" value="submit">
</form>
<h4>--------------------------------------------------------------</h4>
