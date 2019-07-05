
<div class="default_color section scrollspy" >
    <div class="container">
        <!--Form validation with icons-->
        <div class="col s12 m12 l12" style="width: 60%; margin: auto">
            <div class="card-panel">
                <h4 class="header2 center">Nouvel agent</h4>
               
                <!--add .right-alert to show messages right side-->
                <div class="row">
                    <form class="col s12 right-alert formValidate" id="formValidate" action='index.php?action=addAgent' method="post" >
                        <div class="row">
                            <div class="input-field col s12  m12 l4">
                                <i class="mdi-action-account-circle prefix"></i>
                                <input id="nom" name = "nom" type="text" class="validate" required>
                                <label for="nom" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Nom</label>

                            </div>
                            <div class="input-field col s12  m12 l4">

                                <input id="postnom" name = "postnom" type="text" class="validate">
                                <label for="postnom" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Postnom</label>

                            </div>
                            <div class="input-field col s12  m12 l4">

                                <input id="prenom" name = "prenom" type="text" class="validate"  required>
                                <label for="prenom" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Prenom</label>
                            </div>
                        </div>

                        <div class="col s12">

                            <label for="genter_select">Gender *</label>
                            <div class="row">
                                <div class="col s12">
                                    <input name="Homme" type="radio" id="gender_male" data-error=".errorTxt8"/>
                                    <label for="gender_male">Homme</label>
                                </div>
                                <div class="col s12">
                                    <input name="Femme" type="radio" id="gender_female" value="f"/>
                                    <label for="gender_female">Femme</label>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="errorTxt8"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Titre</option>
                                    <option value="controleur">Controleur</option>
                                    <option value="vendeur">Vendeur</option>

                                </select>
                                <label>Choisir le Titre</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-event prefix"></i>
                                <input id = "dob" name="dateNaiss" type="date" class="datepicker">
                                <label for="dob">Date de naissance</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12  m12 l8">
                                <i class="mdi-communication-email prefix"></i>
                                <input name="mail" id="email_input2" type="email" class="validate"  required>
                                <label for="email_input2" class="" data-error="Please enter valid email." data-success="I Like it!">Email</label>
                            </div>
                            <div class="input-field col s12  m12 l4">
                                <i class="mdi-hardware-smartphone prefix"></i>
                                <input id="phone-code" type="tel" class="" name="tel"  required>
                                <label for="phone_code">Telephone</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col s12  m12 l6">
                                <i class="mdi-maps-map prefix"></i>
                                <input type="text" name="lieu" class="validate">
                                <label for="lieu" class=""  data-success="I Like it!">lieux de naissance</label>
                            </div>
                            <div class="input-field col s12  m12 l6">
                                <i class="mdi-action-language prefix"></i>
                                <input id="phone-code" type="text" class="" name="natio">
                                <label for="phone_code">Nationalité</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-lock-outline prefix"></i>
                                <input name="pass" id="password2" type="password" class="validate"  required>
                                <label for="password2">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 ">
                                <i class="mdi-maps-place prefix"></i>
                                <input name="adresse" id = "adresse" type="date" class="validate">
                                <label FOR="adresse" class="" data-error="Please enter valid adresse." data-success="I Like it!">Adresse</label>
                            </div>

                        </div>
                        <div class="file-field input-field col s12">
                            <i class="mdi-image-portrait prefix"></i>
                            <input class="file-path validate" type="text"/><input type="file" />
                            <label for="email_input2" class="" data-success="I Like it!">Image</label>


                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light right" type="submit" name="action">Enregistrer
                                    <i class="mdi-content-save right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Floating Action Button -->
<div class="fixed-action-btn " style="bottom: 50px; right: 19px;">
    <a class="btn-floating btn-large red">
        <i class="mdi-content-add"></i>
    </a>
    <ul>
        <li><a href="#intro" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
        <li><a href="index.php?action=addEvent" class="btn-floating yellow darken-1"><i class="large mdi-action-stars"></i></a></li>
        <li><a href="index.php?action=addAgent" class="btn-floating green"><i class="large mdi-action-perm-identity"></i></a></li>

    </ul>
</div>

<script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            uname: {
                required: true,
                minlength: 5
            },
            cemail: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength: 5
            },
            cpassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            curl: {
                required: true,
                url:true
            },
            crole:"required",
            ccomment: {
                required: true,
                minlength: 15
            },
            cgender:"required",
            cagree:"required",
        },
        //For custom messages
        messages: {
            uname:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },
            curl: "Enter your website",
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });



    $('#phone-code').formatter({
        'pattern': '+243 {{999}}-{{999}}-{{999}}-{{9999}}',
        'persistent': true
    });
</script>