<div class="row">
    <div class="col-md-6 register-wrapper">
        <form action="process/register_process.php" method="post">
            <input type="hidden" name="register" value="1">
            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" minlength="6" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="tel">TEL</label>
                <input class="form-control" type="text" name="tel" id="tel" placeholder="TEL" minlength="10" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address" placeholder="Address" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>