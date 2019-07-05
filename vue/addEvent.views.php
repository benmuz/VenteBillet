
<div class="default_color section scrollspy" >
    <div class="container">
        <!--Form validation with icons-->
        <div class="col s12 m12 l12" style="width: 60%; margin: auto">
            <div class="card-panel">
                <h4 class="header2 center">Nouvel evenement</h4>

                <!--add .right-alert to show messages right side-->
                <div class="row">
                    <form class="col s12 right-alert section" id="file-upload" action="index.php?action=addEvent" method="post" enctype="multipart/form-data">
                        <div class="row section">

                            <div class="col s12 m8 l9">
                                <input type="file" id="input-file-now-custom-2" class="dropify" data-height="500" name="fileToUpload"/>
                            </div>
                        </div>

                        <div class="input-field col s12  m12 l12">

                            <input id="postnom" name = "nom" type="text" class="validate">
                            <label for="postnom" data-error="Veuillez saisir le nom svp !" data-success="Perfect!">Nom</label>

                        </div>

                        <div class="input-field col s12">

                            <input type="date" class="datepicker" name="date">
                            <label for="dob">Date</label>
                        </div>
                        <div class="input-field col s12">
                            <div class="row">
                                <div class="input-field col s6 m12 l6">
                                    <input placeholder="00:00" id="time-demo1" type="text" class="" name="debut">
                                    <label for="time_demo1">Debut</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="00:00" id="time-demo" type="text" class="" name="fin">
                                    <label for="time_demo">Fin</label>
                                </div>

                            </div>
                        </div>
                        <div class="input-field col s12">
                            <div class="row">
                                <div class="input-field col s12 m12 l8">
                                    <input id="adresse" type="text" class="" name="adresse">
                                    <label for="adresse">Adresse</label>
                                </div>
                                <div class="input-field col s12 m12 l4">
                                    <input id ="ville" type="text" class="" name="ville">
                                    <label for="ville">Ville</label>
                                </div>

                            </div>
                        </div>
                        <div class="input-field col s12">
                            <textarea name="description" id="message1" class="materialize-textarea validate" length="120" placeholder="Oh WoW! Let me check this one too."></textarea>
                            <label for="message1" class="">Description</label>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right" type="submit" name="submit">Enregistrer
                                <i class="mdi-content-save right"></i>
                            </button>
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
    $('#time-demo').formatter({
        'pattern': '{{99}}:{{99}}'
    });
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('.dropify-event').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.filename + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });
    });
</script>
