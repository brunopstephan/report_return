
<select name="" id="stateselect">
    <option value="open">Em Aberto</option>
    <option value="concluded">Concluidos</option>
    <option value="all">Todos</option>
</select>

<div class="reports">
    <div id="open">
        <?php 
            $open = open();
            foreach ($open as $report) {
                require("./components/report.php");
            }
            
        ?>
    </div>
    
    <div id="concluded">
        <?php 
            $concluded = concluded();
            foreach ($concluded as $report) {
                require("./components/report.php");
            }
        ?>
    </div>
    
    <div id="all">
        <?php 
            $all = all();
            foreach ($all as $report) {
                require("./components/report.php");
            }
            
        ?>
    </div>
</div>

<?php 

    if(isset($_POST['conclude'])){
        conclude($_POST['id']);
    }
    if(isset($_POST['deconclude'])){
        deconclude($_POST['id']);
    }

    if(isset($_POST['delete'])){
        delete($_POST['id']);
    }

    if(isset($_POST['responseaction'])){
        response($_POST['response'], $_POST['id']);
    }
?>