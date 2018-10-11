<div class="row">
    <div class="col-md-6 login-wrapper">
        <form action="process/login_process.php" method="post">
            <input type="hidden" name="login" value="1">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="checkbox register-link">
                <label>
                    <a href="index.php?page=register">Register</a>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>