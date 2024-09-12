<?php
session_start();

if ($_SESSION['id'] > 0) {
} else {
    header('Location: home-sem-login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SparTask</title>

    <!-- Bootstrap do Ryan -->
    <link rel="stylesheet" href="https://spartoi.vercel.app/assets/css/style.css">
    <script src="https://spartoi.vercel.app/assets/js/script.js" defer></script>

    <!-- Estilo do site -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/login_modal.js" defer></script>

    <!-- Bootstrap 4.1 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/12a0142524.js" crossorigin="anonymous"></script>

    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- V-Libras -->
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/spartask_logo_semfundo.png" type="image/x-icon">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>

    <!-- Bootstrap 4.1 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="assets/css/admin.css" rel="stylesheet">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap 4.1 JS, jQuery, and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/12a0142524.js" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sair_normal.js" defer></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <!-- V-Libras -->
    <div vw class="enabled bg-transparente" id="vlibras-container">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <!-- Header -->


    <div class="sidebar">
        <div class="logo-details">
            <img class="logo" src="assets/img/spartask_logo_semfundo.png" alt="Logo SparTask">
            <div class="logo_name">SparTask</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="home.php">
                    <i class='bx bx-grid-alt '></i>
                    <span class="links_name ">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='fa-solid fa-clipboard'></i>
                    <span class="links_name">Contratar</span>
                </a>
                <span class="tooltip">Contratar</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Mensagens</span>
                </a>
                <span class="tooltip">Mensagens</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Análise</span>
                </a>
                <span class="tooltip">Análise</span>
            </li>


            <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Favoritos</span>
                </a>
                <span class="tooltip">Favoritos</span>
            </li>
            <li class="active">
                <a href="#">
                    <i class='fa-solid fa-blog'></i>
                    <span class="links_name">Blog</span>
                </a>
                <span class="tooltip">Blog</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Configurações</span>
                </a>
                <span class="tooltip">Configurações</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <i class='bx bx-user'></i>
                    <div class="name_job">
                        <div class="name"><?= print_r($_SESSION['nome'], true); ?></div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <i class='bx bx-log-out ' id="log_out"></i>
            </li>
        </ul>
    </div>
    <!-- Home -->
    <section class="home-section">

        <div class="container">
            <!-- Banner principal -->
            <section>
                <img src="assets/img/back2.jpg" alt="banner" class="home__bg">
                <div class="home__container container grid">
                    <div class="home__data">
                        <br>
                        <h1 class="home__title text-center">
                            Aprimore suas habilidades e cresça na Carreira!
                        </h1>
                        <div class="div-do-hr">
                            <hr class="hr-limpeza">
                        </div>
                        <br>
                        <p class="home__description text-center">SPARTASK</p>
                        <br>

                        <br><br><br>
                    </div>
            </section>
            <div class="space-2"></div>


            <!-- Noticias blog -->
            <div class="container">
                <main role="main" class="container">
                    <div class="row">
                        <div class="col-md-8 blog-main">


                            <div class="blog-post">

                                <p class="blog-post-meta">Escrito por <a href="#">Ryan de Oliveira</a>, em 20 de Agosto
                                    de 2024.
                                </p>

                                <p>O setor de serviços domésticos é essencial para muitas famílias e empresas, e o
                                    sucesso nessa
                                    área vai além das habilidades técnicas. Para se destacar e conquistar mais clientes,
                                    é
                                    importante investir em aprimoramento contínuo, comunicação e profissionalismo. Neste
                                    artigo,
                                    vamos compartilhar dicas valiosas que ajudarão você a se tornar um profissional de
                                    destaque
                                    no mercado de serviços domésticos.</p>
                                <hr>
                                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>,
                                    nascetur
                                    ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis
                                    vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus
                                    sit amet
                                    fermentum.</p>
                                <blockquote>
                                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna
                                            mollis</strong>
                                        ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </blockquote>
                                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur
                                    purus sit
                                    amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                                <h2>Heading</h2>
                                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis,
                                    est non
                                    commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi
                                    leo risus,
                                    porta ac consectetur ac, vestibulum at eros.</p>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                </p>
                                <pre><code>Example code block</code></pre>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis
                                    euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                    fermentum massa.</p>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Aenean
                                    lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis
                                    euismod.
                                    Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                    fermentum massa
                                    justo sit amet risus.</p>
                                <ul>
                                    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                                    <li>Donec id elit non mi porta gravida at eget metus.</li>
                                    <li>Nulla vitae elit libero, a pharetra augue.</li>
                                </ul>
                                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a
                                    pharetra
                                    augue.</p>
                                <ol>
                                    <li>Vestibulum id ligula porta felis euismod semper.</li>
                                    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                        mus.
                                    </li>
                                    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                                </ol>
                                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at
                                    lobortis.
                                </p>
                            </div><!-- /.blog-post -->

                            <div class="blog-post">
                                <h2 class="blog-post-title">É os guri</h2>
                                <p class="blog-post-meta">Escrito por <a href="#">Ryan de Oliveira</a>, em 19 de Agosto
                                    de 2024.
                                </p>

                                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>,
                                    nascetur
                                    ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis
                                    vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus
                                    sit amet
                                    fermentum.</p>
                                <blockquote>
                                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna
                                            mollis</strong>
                                        ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </blockquote>
                                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur
                                    purus sit
                                    amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis,
                                    est non
                                    commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi
                                    leo risus,
                                    porta ac consectetur ac, vestibulum at eros.</p>
                            </div><!-- /.blog-post -->

                            <div class="blog-post">
                                <h2 class="blog-post-title">Aonde vai ir a conclusão</h2>
                                <p class="blog-post-meta">Escrito por <a href="#">Ryan de Oliveira</a>, em 18 de Agosto
                                    de 2024.
                                </p>

                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Aenean
                                    lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis
                                    euismod.
                                    Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                    fermentum massa
                                    justo sit amet risus.</p>
                                <ul>
                                    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                                    <li>Donec id elit non mi porta gravida at eget metus.</li>
                                    <li>Nulla vitae elit libero, a pharetra augue.</li>
                                </ul>
                                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur
                                    purus sit
                                    amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a
                                    pharetra
                                    augue.</p>
                            </div><!-- /.blog-post -->

                            <nav class="blog-pagination">
                                <a class="btn btn-outline-primary" href="#">Mais </a>

                            </nav>

                        </div><!-- /.blog-main -->

                        <aside class="col-md-4 blog-sidebar">
                            <div class="p-3 mb-3 bg-light rounded">
                                <h4 class="font-italic">Sobre</h4>
                                <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis
                                    consectetur
                                    purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                            </div>

                            <div class="p-3">
                                <div class="card">
                                    <div class="card-header">
                                        Destaque
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Título especial</h5>
                                        <p class="card-text">
                                        <ol class="list-unstyled mb-0">
                                            <li><a href="#">Exemplo 1</a></li>
                                            <li><a href="#">Exemplo 2</a></li>
                                            <li><a href="#">Exemplo 3</a></li>
                                            <li><a href="#">Exemplo 1</a></li>
                                            <li><a href="#">Exemplo 2</a></li>
                                            <li><a href="#">Exemplo 3</a></li>
                                            <li><a href="#">Exemplo 1</a></li>
                                            <li><a href="#">Exemplo 2</a></li>
                                            <li><a href="#">Exemplo 3</a></li>

                                        </ol>
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <div class="p-3">
                                <h4 class="font-italic">Onde nos encontrar, por aí:</h4>
                                <div class="card" style="width: 18rem;">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <i class="fa fa-github"></i> Github</li>
                                        <li class="list-group-item"><i class="fa fa-instagram"></i> Instagram</li>
                                        <li class="list-group-item"><i class="fa fa-facebook"></i> Facebook</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Citação
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat
                                            a ante.</p>
                                        <footer class="blockquote-footer">Alguém famoso em <cite
                                                title="Título da fonte">Título da fonte</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        </aside><!-- /.blog-sidebar -->

                    </div><!-- /.row -->

                </main>
            </div>


            <br>

            <!-- Footer -->
            <footer class="footer-distributed">
                <div class="footer-left">
                    <h3 style="font-family: 'poppins';">SparTask</h3>
                    <p class="footer-company-name">Copyright © 2024 Ryan Bomfim All rights reserved</p>
                </div>
                <div class="footer-center">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span>Praia Grande</span> São Paulo</p>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+55 13 99606-1925</p>
                    </div>
                </div>
                <div class="footer-right">
                    <p class="footer-company-about">
                        <span>Sobre</span>
                        Website desenvolvido a fins acadêmicos e produzido por Ryan de Oliveira Carlos Bomfim
                    </p>
                    <div class="footer-icons">
                        <a href="https://www.facebook.com/profile.php?id=61561062205006"><i
                                class="fa fa-facebook"></i></a>
                        <a href="#" id="whatsapp-button"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>
            </footer>

        </div>
    </section>



</body>

</html>