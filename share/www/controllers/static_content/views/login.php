<h1>Login</h1>

<form action="authentication/check_login" role="form" onsubmit="return lucid.submit(this)">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember_me" /> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>