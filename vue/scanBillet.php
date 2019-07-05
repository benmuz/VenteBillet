<div class="section scrollspy" id="work">
    <div class="container">

        <div class="row">



            <section class="plans-container " id="plans" style="width: 40%; margin: auto">
                <article class="col s12 " >

                            <form class="card hoverable" method="post" action='index.php?action=addBillet'>

                                <div class="card-image purple waves-effect " style="width: 100%">
                                    <div class="card-title">Scanner des billets</div>
                                    <div class="price" id="txtHint"><?php echo $qte ?></div>
                                    <div class="price-desc"><?php echo $msg ?></div>
                                </div>

                                <div class="card-content">

                                    <ul class="collection">
                                        <li class="collection-item">
                                            <div class="input-field col s12  m12 l12">
                                                
                                                <input id="idev" type='hidden' name='idEve' value="<?php echo $idEvent ?>" >
                                                <input id="code" type='text' name='code' required >
                                                <label for="nom1" data-error="Veuillez saisir le code svp !" data-success="Perfect!">Code</label>
                                            </div>

                                        </li>
                                        <li class="collection-item"><button type="submit" class="btn btn-success waves-effect waves-light" name="scan" >SCAN</button></li>
                                </ul>
        </div>


                            </form>
                </article>

            </section>



        </div>


    </div>
</div>
<script>
    function showHint() {
        var str=document.getElementById("code");
        var idEve=document.getElementById("idEve").innerHTML;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    alert(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", "addBillet.control.php?code="+str.value, true);
            xmlhttp.open("GET", "addBillet.control.php?idEvent="+idEve, true);
            xmlhttp.send();




        //document.getElementById("txtHint").innerHTML=;
    }
</script>

