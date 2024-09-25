            <!-- start banner Area -->
            <section class="banner-area relative" id="home" style="  background: url(img/banner-bg<?php echo  $_SESSION['image_bg'] ?>.png) center;background-size: cover;">
                <div class="container">
                    <div class="overlay overlay-bg"></div>
                    <div class="row fullscreen d-flex align-items-center justify-content-start">
                        <div class="banner-content col-lg-8 col-md-12">
                        <div>
                            <!--  ================== PÁGINA DE ERRO ================  -->

                            <?php if(isset($_GET['id']) && $_GET['id'] == '401'):?>
                            <div class="boxError">
                               <h1>Não Autorizado</h1>
                               <h1>ERROR 401</h1>
                               <a class="primary-btn" href="?to=inicio">Voltar a Página Inicial</a>
                            </div>
                            <?php else:?>
                            <div class="boxError">
                               <h1>Página não encontrada</h1>
                               <h1>ERROR 404</h1>
                               <a class="primary-btn" href="?to=inicio">Voltar a Página Inicial</a>
                            </div>
                            <?php endif?>
                        </div>                                  
                    </div>
                </div>
            </section>
            <!-- End banner Area -->