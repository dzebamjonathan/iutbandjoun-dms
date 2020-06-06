{% extends "layouts/app.layout.php" %} 

{% block content %}

<div class="row">
    <div class="col-md-6 mx-auto">
        <form method="POST" action="login.php">
            {% if access_error %}
                <div class="alert alert-danger">You need to login first.</div>
            {% endif %}
            <h3 class="font-weight-bold text-center">Account login for Admin</h3>
            <div class="form-group">
                <label for="username">Enter your username</label>
                <p class="small text-danger mb-0">{{ }}</p>
                <input id="email" class="form-control" type="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">Enter your password</label>
                <p class="small text-danger mb-0">{{ password_error }}</p>
                <input id="password" class="form-control" type="password" name="password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="form-group">
                <label for="password">Enter your password</label>
                <p class="small text-danger mb-0">{{ password_error }}</p>
                <input id="password" class="form-control" type="password" name="password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            
            <div class="form-group text-center">
                <input type="submit" class="btn btn-warning" value="Login">
            </div>
        </form>

    </div>
</div>

{% endblock %}