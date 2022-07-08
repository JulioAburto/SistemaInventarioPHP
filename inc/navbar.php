<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=home">
        <img src="./img/shoe-shop.png" width="30" height="50">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">

            <div class="navbar-item has-dropdown is-hoverable">
           
                <a class="navbar-link"> <ion-icon name="person-outline"></ion-icon>Usuarios</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=user_new" class="navbar-item"><ion-icon name="add-outline"></ion-icon>Nuevo</a>
                    <a href="index.php?vista=user_list" class="navbar-item"><ion-icon name="list-circle-outline"></ion-icon>Lista</a>
                    <a href="index.php?vista=user_search" class="navbar-item"><ion-icon name="search-circle-outline"></ion-icon>Buscar</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link"><ion-icon name="list-outline"></ion-icon>Categorías</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=category_new" class="navbar-item"><ion-icon name="add-outline"></ion-icon>Nueva</a>
                    <a href="index.php?vista=category_list" class="navbar-item"><ion-icon name="list-circle-outline"></ion-icon>Lista</a>
                    <a href="index.php?vista=category_search" class="navbar-item"><ion-icon name="search-circle-outline"></ion-icon>Buscar</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link"><ion-icon name="clipboard-outline"></ion-icon>Productos</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=product_new" class="navbar-item"><ion-icon name="add-outline"></ion-icon>Nuevo</a>
                    <a href="index.php?vista=product_list" class="navbar-item"><ion-icon name="list-circle-outline"></ion-icon>Lista</a>
                    <a href="index.php?vista=product_category" class="navbar-item"><ion-icon name="copy-outline"></ion-icon>Por categoría</a>
                    <a href="index.php?vista=product_search" class="navbar-item"><ion-icon name="search-circle-outline"></ion-icon>Buscar</a>
                </div>
            </div>

        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="button is-primary is-rounded is-focused is-light">
                    <ion-icon name="person-circle-outline"></ion-icon>   Mi cuenta
                    </a>

                    <a href="index.php?vista=logout" class="button is-link is-rounded is-focused is-light">
                    <ion-icon name="exit-outline"></ion-icon>Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>