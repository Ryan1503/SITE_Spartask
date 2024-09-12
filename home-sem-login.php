<?php
session_start();
if (isset($_SESSION['id'])) {
  if ($_SESSION['id'] > 0) {
    header('Location: home.php');
    exit();
  } else {
  }
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!-- Bootstrap do Ryan -->
  <link rel="stylesheet" href="https://spartoi.vercel.app/assets/css/style.css">
  <script src="https://spartoi.vercel.app/assets/js/script.js" defer></script>

  <!-- Estilo do site -->
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/login_modal.js" defer></script>
  <script src="assets/js/session_check.js" defer></script>

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
  <header>
    <nav class="header header-home bg-red" id="header">
      <i class="uil uil-bars abrir-subheader"></i>
      <div class="bg-logo">
        <a class="logo-A" href="#">
          <img src="assets/img/spartask_logo_semfundo.png" class="logo-header" alt="logo">
        </a>
      </div>
      <ul class="header-links">
        <i class="uil uil-times fechar-subheader"></i>
        <li><a class="link-nav active-link" href="#">Home</a></li>
        <li><a class="link-nav" data-toggle="modal" data-target="#loginModal" href="#">Serviços</a></li>
        <li><a class="link-nav" data-toggle="modal" data-target="#loginModal" href="#">Contrate</a></li>

        <li><a class="link-nav" href="pages/about.html">Sobre</a></li>
        <li><a class="link-nav" href="pages/blog.html">Blog</a></li>
        <li><a href="pages/login.html"><button class="btn btn-outline-light">Entrar</button></a></li>
      </ul>
      <i class="uil uil-search search-icon" id="searchIcon" style="display: none;"></i>
      <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Pesquise aqui..." />
      </div>
    </nav>
  </header>

  <!-- Banner principal -->
  <section>
    <img src="assets/img/back.jpg" alt="banner" class="home__bg">
    <div class="home__container container grid">
      <div class="home__data">
        <br>
        <h1 class="home__title text-center">
          O melhor site para <br> Serviços domésticos
        </h1>
        <div class="div-do-hr">
          <hr class="hr-limpeza">
        </div>
        <br>
        <p class="home__description text-center">SPARTASK</p>
        <br>
        <p class="home__description text-center">
        </p>
        <div class="container mt-5">
          <div class="row space-2">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
              <div class="card card-home">
                <div class="card-limpeza-img">
                  <img src="assets/img/vassoura.png" class="img-limpeza" alt="Product Image 2">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Exemplo</h5>
                  <p class="card-text">Descrição breve do Exemplo.</p>
                  <p class="price">Lorem ipsum dolo</p>
                </div>
              </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
              <div class="card card-home">
                <div class="card-limpeza-img">
                  <img src="assets/img/vassoura.png" class="img-limpeza" alt="Product Image 2">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Exemplo</h5>
                  <p class="card-text">Descrição breve do Exemplo.</p>
                  <p class="price">Lorem ipsum dolo</p>
                </div>
              </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
              <div class="card card-home">
                <div class="card-limpeza-img">
                  <img src="assets/img/vassoura.png" class="img-limpeza" alt="Product Image 2">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Exemplo</h5>
                  <p class="card-text">Descrição breve do Exemplo.</p>
                  <p class="price">Lorem ipsum dolo</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- Video -->
  <div class="container d-flex align-items-center justify-content-center">
    <div class="video-pitch code-box">
      <iframe class="iframe-video d-none" src="https://www.youtube.com/embed/nRI5sniWty0?si=QVo7lPstr9a3L2P1"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      <img src="assets/img/cap.png" class="iframe-video" alt="" srcset="">
    </div>
  </div>
  <br><br><br><br>
  <!-- Destaques -->
  <div class="container-fluid-destaques bg-dark">
    <div class="container  ">
      <h1 class="display-4 text-center h1-destaques-mes">Destaques</h1>

      <div class="row ">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
          <div class="card book-card">
            <div class="book-caixa-img">
              <img class="card-img-top pessoa-card-img" src="assets/img/pessoa.jpg" alt="Exemplo">
            </div>
            <div class="card-body">
              <h5 class="card-title">Exemplo</h5>
              <p class="card-text">Descrição do Exemplo.</p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
          <div class="card book-card">
            <div class="book-caixa-img">
              <img class="card-img-top pessoa-card-img" src="assets/img/pessoa.jpg" alt="Exemplo">
            </div>
            <div class="card-body">
              <h5 class="card-title">Exemplo</h5>
              <p class="card-text">Descrição do Exemplo.</p>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
          <div class="card book-card">
            <div class="book-caixa-img">
              <img class="card-img-top pessoa-card-img" src="assets/img/pessoa.jpg" alt="Exemplo">
            </div>
            <div class="card-body">
              <h5 class="card-title">Exemplo</h5>
              <p class="card-text">Descrição do Exemplo.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Books -->
  <div class="container ep-1">
    <h1 class="display-4 text-center">Serviços perto de você</h1>
    <div class="row ">
      <div class="col-md-6">
        <div class="media border border-ligh">
          <div class="media-body">
            <h6 class="mt-0 mb-1">Objeto mídia</h6>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            <br>
            <button class="btn btn-primary">Ver</button>
          </div>
          <img class="ml-3 book-img" src="assets/img/back.jpg" alt="Imagem de exemplo genérica">
        </div>
      </div>
      <div class="col-md-6">
        <div class="media border border-ligh">
          <div class="media-body">
            <h6 class="mt-0 mb-1">Objeto mídia</h6>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            <br>
            <button class="btn btn-primary">Ver</button>
          </div>
          <img class="ml-3 book-img" src="assets/img/back.jpg" alt="Imagem de exemplo genérica">
        </div>
      </div>

      <div class="col-md-6">
        <div class="media border border-ligh">
          <div class="media-body">
            <h6 class="mt-0 mb-1">Objeto mídia</h6>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            <br>
            <button class="btn btn-primary">Ver</button>
          </div>
          <img class="ml-3 book-img" src="assets/img/back.jpg" alt="Imagem de exemplo genérica">
        </div>
      </div>
      <div class="col-md-6">
        <div class="media border border-ligh">
          <div class="media-body">
            <h6 class="mt-0 mb-1">Objeto mídia</h6>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            <br>
            <button class="btn btn-primary">Ver</button>
          </div>
          <img class="ml-3 book-img" src="assets/img/back.jpg" alt="Imagem de exemplo genérica">
        </div>
      </div>

      <div class="col-md-6">
        <div class="media border border-ligh">
          <div class="media-body">
            <h6 class="mt-0 mb-1">Objeto mídia</h6>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            <br>
            <button class="btn btn-primary">Ver</button>
          </div>
          <img class="ml-3 book-img" src="assets/img/back.jpg" alt="Imagem de exemplo genérica">
        </div>
      </div>
      <div class="col-md-6">
        <div class="media border border-ligh">
          <div class="media-body">
            <h6 class="mt-0 mb-1">Objeto mídia</h6>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            <br>
            <button class="btn btn-primary">Ver</button>
          </div>
          <img class="ml-3 book-img" src="assets/img/back.jpg" alt="Imagem de exemplo genérica">
        </div>
      </div>
    </div> <!-- Fim da row -->
  </div>


  <!-- Produtos -->
  <section class="caixa">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="assets/img/head.png" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex">
          <div class="align-self-center">
            <h1 class="h1-banner-2"><strong>NOSSOS DOMÉSTICOS</strong></h1>
            <p class="texto-banner">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam eius quibusdam vero cupiditate! Soluta
              necessitatibus neque obcaecati fuga, similique, enim voluptas excepturi nam delectus est harum? Esse
              dolorem tempore temporibus.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Serviços -->
  <section class="caixa">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-2 order-md-1 d-flex">
          <div class="align-self-center">
            <h1 class="h1-banner-2"><strong>SERVIÇOS PARA VOCÊ</strong></h1>
            <p class="texto-banner">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed ab distinctio aliquam dignissimos. Dolorum,
              eos eius! Praesentium explicabo velit laboriosam, nostrum aut impedit nesciunt pariatur mollitia
              repellendus, nemo saepe suscipit.
            </p>
            <a href="" class="btn btn-primary">Veja mais</a>
          </div>
        </div>
        <div class="col-md-6 order-1 order-md-2">
          <div class="img-banner">
            <img src="assets/img/back.jpg" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Produtos -->
  <section class="caixa">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="assets/img/back.jpg" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex">
          <div class="align-self-center">
            <h1 class="h1-banner-2"><strong>NOSSOS DOMÉSTICOS</strong></h1>
            <p class="texto-banner">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam eius quibusdam vero cupiditate! Soluta
              necessitatibus neque obcaecati fuga, similique, enim voluptas excepturi nam delectus est harum? Esse
              dolorem tempore temporibus.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

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
        <a href="https://www.facebook.com/profile.php?id=61561062205006"><i class="fa fa-facebook"></i></a>
        <a href="#" id="whatsapp-button"><i class="fa fa-whatsapp"></i></a>
      </div>
    </div>
  </footer>

  <!-- Modal de Login Necessário -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Acesso Necessário</h5>
        </div>
        <div class="modal-body">
          <p>Você precisa estar logado para acessar esta página. Clique no botão abaixo para fazer login.</p>
        </div>
        <div class="modal-footer">
          <a href="pages/login.html" class="btn btn-primary">Fazer Login</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>


</body>

</html>