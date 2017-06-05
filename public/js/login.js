/**
 * Created by Alexander on 6/5/2017.
 */

window.fbAsyncInit = function () {
    FB.init({
        appId: '396270547440876',
        cookie: true,
        xfbml: true,
        version: 'v2.8'
    });
    FB.AppEvents.logPageView();
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function myFacebookLogin() {
    FB.login(function () {
        FB.api('/me/?fields=email', 'get', {}, function (data) {
            $(function () {
                if (typeof data.email != "undefined")
                    $.post("/loginFB", {email: data.email, _token: token}, function () {
                        location.href = "/";
                    });
            });
        });
    }, {scope: 'email'});
}