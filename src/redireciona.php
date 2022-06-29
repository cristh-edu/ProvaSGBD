<?php

    function redireciona(string $pagina): void
    {
        header("Location: $pagina");
        die();
    }

?>