
<nav class="side-menu">
    <ul class="side-menu-list">

    <li class="blue-dirty">
            <a href="../Calculadora/calculadoraPro.php">
                <span class="glyphicon glyphicon-list-alt"></span>
                <span class="lbl">Calculadora PRO</span>
            </a>
        </li>

        <li class="blue-dirty">
            <a href="../Videos/videosTutoriales.php">
                <span class="glyphicon glyphicon-play-circle"></span>
                <span class="lbl">Videos Tutoriales</span>
            </a>
        </li>

        <li class="blue-dirty">
            <a href="../Configuracion/configuracion.php">
                <span class="glyphicon glyphicon-cog"></span>
                <span class="lbl">Configuracion</span>
            </a>
        </li>

        <?php 
            if($_SESSION['control']=="2a2e9a58102784ca18e2605a4e727b5f")
            {?>
                <li class="blue-dirty">
                    <a href="../Usuario/usuario.php">
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="lbl">Usuarios</span>
                    </a>
                </li>
            <?php }
        ?>
        
    </ul>
</nav>

