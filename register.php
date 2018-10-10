<div class="row">
    <div class="col-md-6 register-wrapper">
        <form action="process/register_process.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="tel">TEL</label>
                <input class="form-control" type="text" name="tel" id="tel" placeholder="TEL" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address" placeholder="Address" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>