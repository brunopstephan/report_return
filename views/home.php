<form id="reportform" class="reportform" action="" method="post">
    <h3>Data do ocorrido:</h3>
    <input type="date" name="date">
    <h3>Tipo da denúncia</h3>
    <select name="reporttype" id="reporttype">
        <option value="00">Assédio</option>
        <option value="01">Roubo/Furto</option>
        <option value="02">Discriminação</option>
        <option value="04">Outro</option>
    </select>
    <h3>Descreva sua denúncia:</h3>
    <div class="reportarea"> 
        <textarea name="report" id="report" cols="40" rows="10"></textarea>
    </div>
    <div class="identify">
        <label for="identify"> Deseja se identificar?</label>
        <input type="checkbox" name="identify" id="identify">
    </div>

    <div id="identifyarea" class="identifyarea">
        <h3>Nome:</h3>
        <input class="input" type="text" name="name" id="name" placeholder="Nome">
        <h3>E-mail:</h3>
        <input class="input" type="email" name="email" id="email" placeholder="Email">
    </div>
    <div class="reportarea">
        <input class="btn-all" type="submit" value="Enviar" name="reportaction">
    </div>
</form>

<?php 
     if(isset($_POST['reportaction'])){

        do{
            $rand = rand(0000, 9999);
            $aux = 0;
            $splitRand = str_split($rand);
            if(sizeof($splitRand) == 3){
               $rand = $aux . $rand;
            }
            if(sizeof($splitRand) == 2){
                $rand = $aux . $aux . $rand;
            }
            if(sizeof($splitRand) == 1){
                $rand = $aux . $aux . $aux . $rand;
            }
            $reportType = $_POST['reporttype'];
            $code = $reportType . $rand;    
        }while(verifycode($code) != "");

        $report = $_POST['report'];
        $date = $_POST['date'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        if($report != "" && $date != ""){
            insert($code, $report, $date, $name, $email);
            echo '
                <script>
                    alert("ATENÇÃO! Seu código de denúncia é: '.$code.'. Use-o para o visualizar seu retorno.");
                    location.href = "./";
                </script>
            ';
        }else{
            echo "Digite em todos os campos";
        }  
    } 
    ?>

    <br><br>

    <form action="" method="post">
        <h3>Retorno de Denúncia</h3>
        <input class="input" type="text" name="code" id="code" placeholder="Digite o Código"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        <input class="btn-all" type="submit" value="Pesquisar" name="returnaction">
    </form>


    <div class="returnedresponse">
        <?php

            if(isset($_POST['returnaction'])){
                if($_POST['code'] !=  ""){

                    $return = reportreturn($_POST['code']);
            
                    if($return != ""){
                        if($return['state'] == 0){
                            echo ($return['response'] == "") ? "Sua denúncia foi recebida e está aguardando revisão" :  $return['response'];
                        }else{
                            echo "Esta denúncia foi concluída. Sua resposta foi: <br>";
                            echo '<p>'.$return['response'].'</p>';
                        }  
                    }else{
                        echo "Código Inválido";
                    }
                }else{
                    echo "Digite um código";
                }
            }
        ?>
    </div>

<a href="./" class="btn-all clearresponse">Limpar resposta</a>