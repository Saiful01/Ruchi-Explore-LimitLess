<style>
    .dropdown-item {

        font-size: 13px;

    }
</style>


{{-- <div class="col-6"><i class="icon-mail"></i><strong>{{__('localize.mail')}}</strong></div> --}}
<div class="col-6"><i class="icon-mail"></i><strong><a href="mailto:info@ruchiexplorelimitless.com">info@ruchiexplorelimitless.com</a></strong></div>
<div class="col-6">

    <ul id="top_links" ng-controller="languageController">
        <li>
            <div class="form-group">
                <select class="" ng-change="languageSetup(language)" ng-model="language">
                    <option value="bn">Bangla</option>
                    <option value="en">English</option>
                </select>
            </div>
        </li>

        <li class="">
            <a href="/about">{{__('localize.about')}}</a>
        </li>

      {{--  <li class="">
            <a href="/contact">{{__('localize.contact')}}</a>
        </li>
        <li class="">
            <a href="/user/forums">{{ __('localize.forum') }}</a>
        </li>
        <li class="">

            <a href="/game">{{ __('localize.game') }}</a>
        </li>
--}}



        @if(Auth::check())

            <li>
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 13px; font-weight: bold; color: #F09723">
                        @if(Auth::user()->full_name!=null){{Auth::user()->full_name}} @else
                                {{__('localize.profile')}} @endif
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a style="color: #F09723" class="dropdown-item " href="/user/profile">Profile</a>
                        <a style="color: #F09723" class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </div>
            </li>

        @else
            <li><a href="/user/login">{{__('localize.sign_in')}}</a></li>
            <li><a href="/user/registration"><i class="icon-phone"></i> {{__('localize.registration')}}</a></li>

        @endif


    </ul>
</div>

<script>
    app.controller('languageController', function ($scope, $http, $window) {


        $scope.language = "<?php use Illuminate\Support\Facades\Session;
            if (Session::get('locale') != null) {
                echo Session::get('locale');
            } else {
                echo "en";
            }

            ?>";
        $scope.languageSetup = function (language) {
            console.log("language" + language);

            $http.get("/locale/" + language)
                .then(function (response) {

                    console.log("Changed to " + response.data);
                    $window.location.reload();

                });
        }


    });

</script>
