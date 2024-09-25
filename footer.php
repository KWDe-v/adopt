            <!-- start footer Area -->      
            <footer class="footer-area  text-white">
                <div class="container">
                    <div class="row pt-120 pb-80">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h6>Sobre Nós</h6>
                                <p>
                                    nossa missão é encontrar lares amorosos para gatos e cachorros que precisam de uma nova chance na vida. Somos uma equipe dedicada de amantes de animais, comprometidos em fazer a diferença na vida desses adoráveis companheiros
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h6>Links úteis</h6>
                                <div class="row">
                                    <ul class="col footer-nav">
                                        <li><a href="?to=inicio">Início</a></li>
                                        <li><a href="?to=gatos">Gatos</a></li>
                                        <li><a href="?to=cachorros">Cachorros</a></li>
                                        <li><a href="?to=sobre">Sobre</a></li>
                                    </ul>
                                  
                                </div>
                            </div>
                        </div>                      
                        <div class="col-lg-4  col-md-6">
                            <div class="single-footer-widget mail-chimp">
                                <h6 class="mb-20">Contate-nos</h6>
                                <ul class="list-contact">
                                    <li class="flex-row d-flex">
                                        <div class="icon">
                                            <span class="lnr lnr-home"></span>
                                        </div>
                                        <div class="detail">
                                            <h4>Brasília, Distrito Federal</h4>
                                            <p>
                                                Setor central - Gama
                                            </p>
                                        </div>  
                                    </li>
                                    <li class="flex-row d-flex">
                                        <div class="icon">
                                            <span class="lnr lnr-phone-handset"></span>
                                        </div>
                                        <div class="detail">
                                            <h4><a class="a-hover" href="https://wa.me/<?php echo $config['WhatsappNumber']?>"><?php echo formatarTelefone($config['WhatsappNumber'])?></a></h4>
                                            <p>
                                                Seg a Sex das 08 às 18
                                            </p>
                                        </div>  
                                    </li>
                                    <li class="flex-row d-flex">
                                        <div class="icon">
                                            <span class="lnr lnr-envelope"></span>
                                        </div>
                                        <div class="detail">
                                            <h4><a class="a-hover" href="mailto:<?php echo $config['EmailAdmin']?>"><?php echo $config['EmailAdmin']?></a></h4>
                                            <p>
                                                Contate-nos a qualquer momento!
                                            </p>
                                        </div>  
                                    </li>                                                                       
                                </ul>
                            </div>
                        </div>                      
                    </div>
                </div>
                <div class="copyright-text">
                    <div class="container">
                        <div class="row footer-bottom d-flex justify-content-between">
                            <p class="col-lg-8 col-sm-6 footer-text m-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados. | <a href="#" target="_blank">Adopt</a></p>
                            <div class="col-lg-4 col-sm-6 footer-social">
                                <a href="<?php echo$config['LinkFacebook']?>"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo$config['LinkInstagram']?>"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>                      
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->    

<script >
    $(document).ready(function() {
    function animateCounters() {
        $('.counter').each(function() {
            var $this = $(this),
            countTo = parseInt($this.text());

            $this.text('0'); 

            if (countTo > 0) {
                $({ countNum: 0 }).animate({
                    countNum: countTo
                },
                {
                    duration: 5000,
                    easing: 'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            }
        });
    }

    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.disconnect(); 
            }
        });
    }, {
        threshold: 0.5 
    });

    observer.observe(document.querySelector('#home'));
});

</script>
            <script src="js/vendor/jquery-2.2.4.min.js"></script>
            <script src="js/formularios.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="js/vendor/bootstrap.min.js"></script>          
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
            <script src="js/easing.min.js"></script>            
            <script src="js/hoverIntent.js"></script>
            <script src="js/superfish.min.js"></script> 
            <script src="js/jquery.ajaxchimp.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script> 
            <script src="js/owl.carousel.min.js"></script>                      
            <script src="js/jquery.nice-select.min.js"></script>                            
            <script src="js/mail-script.js"></script>   
            <script src="js/main.js"></script>  
        </body>
    </html>