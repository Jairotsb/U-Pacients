<footer class="page-footer indigo darken-4">
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['Login'])) : ?>
                <div class="col l6 s12">
                    <h5 class="white-text">Contato</h5>
                    <p class="grey-text text-lighten-4">
                        Email: <?= $_SESSION['Login']['email'] ?>
                    </p>
                    <p class="grey-text text-lighten-4">
                        Usuário: <?= $_SESSION['Login']['name'] ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            © 2019 <a href="https://github.com/Jairotsb" target="_blank">Jairo Tunisse</a> & <a href="https://github.com/lucasgdb">Lucas Bittencourt</a>
        </div>
    </div>
</footer>