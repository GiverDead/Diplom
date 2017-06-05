@extends("main.layout")

@section("content")
    <link rel="stylesheet" href="/css/login.css">

    <div class="modal show">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="/login">
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <input type="email" name="email" class="form-control" id="Email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" class="form-control" id="Password"
                                   placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="Login" class="btn btn-default">login</button>
                            </div>
                            <div class="col-md-6 login_social">
                                <a onclick="myFacebookLogin()" class="pull-right">
                                    <img src="/images/facebook.png" alt="" class="img-circle">
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/login.js"></script>
@endsection