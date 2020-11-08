<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="text-white navbar-band">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Mini Boutique
            </h3>
        </a>

        <button class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expand="false"
        aria-label="Replier le menu"
        >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="mr-auto"></div>
        <div class="navbar-nav">
            <a href="panier.php" class="nav-item nav-link active">
                <h5 class="px-5 panier">
                    <i class="fas fa-shopping-cart"></i> Panier 
                    <?php
                        if(isset($_SESSION['panier']))
                        {
                            $count = count($_SESSION['panier']);
                            // echo "<span id=\"decompte_panier\" class=\"text-warning bg-light\">$count</span>"; 
                            echo "<span id=\"decompte_panier\" class=\"bg-warning\">$count</span>";
                        }
                        else
                        {
                            // echo "<span id=\"decompte_panier\" class=\"text-warning bg-light\">0</span>";
                            echo "<span id=\"decompte_panier\" class=\"bg-warning\">0</span>";
                        }
                    ?>
                </h5>
            </a>
        </div>
    </div>
    </nav>
</header>